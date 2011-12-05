                                        <table class="emenu">
<?
$textlength = 191;
$eventnumber = 100;

$connector = new DbConnector(ACTIVITIES);

$result = $connector->query('SELECT ID,title,eventdate FROM events WHERE eventdate IS NOT NULL && eventdate >= (CURDATE()-5) ORDER BY eventdate LIMIT 0,'.$eventnumber);

while($row = $connector->fetchArray($result)){

    echo '<tr><td>';

    echo '<b><font class="content"><a href="index.php?id=1&eventid=' . $row['ID'] . '">' . $row['title'] . '</a></font></b><br>';

    echo '<font class="subhead">'.converttimestamp($row['eventdate']).'</font>';

    echo '</tr></td>';

}

$connector->close();

?>

                                        </table>