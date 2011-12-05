<table class="content">

<?

$textlength = 191;
$articlenumber = 100;

$connector = new DbConnector(ACTIVITIES);

if(isset($_GET['eventid'])) {
    $eventid = $_GET['eventid'];
    $result = $connector->query('SELECT ID,title,class,text,location,meetingplace,contactinfo,posttime,modifytime,eventdate,eventtime,postuser,viewings,imagelink,gallerylink FROM events WHERE ID = '.$eventid);
}
else
{
    $result = $connector->query('SELECT ID,title,posttime,eventdate,text FROM events ORDER BY posttime DESC LIMIT 0,'.$articlenumber);
}

$iteration = 1;

while($row = $connector->fetchArray($result)){

    if($iteration != 1)
        echo '<img border="0" src="include/interface1/images/dashbar.gif" width="378" height="1">';

    $iteration++;

    echo '<table class="content"><tr><td><font class="content">';
    echo '<table class="hilight"><tr><td>';
    echo '<b><font class="contentheader">';

    if(!isset($_GET['eventid']))
        echo '<a href="index.php?id=1&eventid='.$row['ID'].'">';
    echo $row['title'].' </font></b>';

    if(!isset($_GET['eventid']))
        echo '</a>';

    echo '</td></tr></table>';

    if($row['tagline'] != NULL)
        echo '<p>'.$row['tagline'].'</p>';

    if($row['class'] != NULL)
        echo '<p><b>Category:</b> '.$row['class'].'</p>';

    if($row['eventdate'] != NULL)
        echo '<p><b>When:</b> '.converttimestamp($row['eventdate']);
    
    if($row['eventdate'] != NULL && $row['eventtime'] != NULL)
        echo ' at '.$row['eventtime'].'</p>';

    if($row['location'] != NULL)
        echo '<p><b>Where:</b> '.$row['location'].'</p>';

    if($row['meetingplace'] != NULL)
        echo '<p><b>Meeting Place:</b> '.$row['meetingplace'].'</p>';

    if($row['contactinfo'] != NULL)
        echo '<p><b>Contact:</b> '.$row['contactinfo'].'</p>';

    if($row['text'] != NULL)
        echo '<p>'.$row['text'].'</p>';

    if($row['postuser'] != NULL || $row['posttime'] != NULL || $row['viewings'] != NULL)
    {
        echo '<table class="contentsm"><tr><td>';

        if($row['viewings']== NULL)
            echo '<p align=right><font class="subhead">';
        else
            echo '<p><font class="subhead">';

        if($row['postuser'] != NULL)
            echo 'Posted by '.$row['postuser'].' ';

        if($row['posttime'] != NULL)
            echo converttimestamp($row['posttime']).'';

        echo '</font></p></td>';

        if($row['viewings'] != NULL){
            echo '<td><p align=right><font class="subhead">'.'Views: '.$row['viewings'].'</font></p></td>';
            $totalviewings = $row['viewings']+1;
            $connector->query('UPDATE events SET viewings = '.$totalviewings.' WHERE ID = '.$row['ID'].' LIMIT 1');
        }

        echo '</tr></table>';

    }

    if($row['modifytime'] > $row['posttime'] && $row['modifytime'] != NULL)
        echo '<font class = "subhead">Modified: '.converttimestamp($row['modifytime']).'<font>';


    echo '</font></td></tr></table>';

}

$connector->close();

?>
