<?
include_once ("include/loginsystem/auth.php");
include_once ("include/loginsystem/authconfig.php");
include_once ("include/loginsystem/check.php");

$connector = new DbConnector(ELECTIONS);

$userid = $connector->fetchArray($connector->query('SELECT voted FROM authuser WHERE (uname = "'.$USERNAME.'" OR uname2 = "'.$USERNAME.'" OR uname3 = "'.$USERNAME.'");'));

if($userid['voted']!=0) {
  echo '<table class="content"><tr><td><p><font class="content">You have already voted!</font></p>';
}
else
{

echo '<form name="ballotsubmit" method="post" action="index.php?id=13"><table class="content"><tr><td>';

$electionDB = $connector->query('SELECT ID,name,instructions,positiontable,ballottable,open FROM elections');

$i=0;

while($elections = $connector->fetchArray($electionDB)){
    if($elections['open'] || $USERNAME == "admin")
    {
    echo '<p><table class="hilight"><tr><td><b><font class="contentheader">'.$elections['name'].'</font></b></td></tr></table></p>';
    if($elections['instructions']!=NULL)
        echo $elections['instructions'];

    $positionDB = $connector->query('SELECT ID,position FROM '.$elections['positiontable']);
    while($positions = $connector->fetchArray($positionDB)){
        $positionName = $connector->fetchArray($connector->query('SELECT ID,positionname FROM positions WHERE ID = '.$positions['position']));
        echo '<font class="ballotsize"><b>'.$positionName['positionname'].'</b></font>';

        $candidatesDB = $connector->query('SELECT ID,name,position FROM candidates WHERE position = '.$positionName['ID']);

        echo '<table class="ballot"><tr><td>';


        $identifier=$elections['ballottable'].','.$positionName['ID'];

        if($connector->getNumRows($candidatesDB)==1){
            $candidates = $connector->fetchArray($candidatesDB);
            echo '<font class="ballotsize">'.$candidates['name'].'<br>';
            echo '<input type="radio" name="'.$identifier.' "id="'.$identifier.'"value="'.$identifier.','.$candidates['ID'].'">Yes<br>';
            echo '<input type="radio" name="'.$identifier.' "id="'.$identifier.'"value="'.$identifier.','.$candidates['ID']*-1 .'">No</font><br>';
        }
        else {
            while($candidates = $connector->fetchArray($candidatesDB)){
                echo '<font class="ballotsize">';
                echo '<input type="radio" name="'.$identifier.' "id="'.$identifier.'"value="'.$identifier.','.$candidates['ID'].'">'.$candidates['name'].'</font><br>';
            }
        }

        echo '</td></tr></table>';
        $i++;
    }
  }
      else{
        echo '<table class="ballotsize"><tr><td><p><font class="content">Polls for the '.$elections['name'].' are currently closed.</font></p></td></tr></table>';
    }
}
if($i>0)
{

//Comments form code.
  echo '<textarea name="comments" id="comments" rows="18" cols="42" ></textarea>';

//End comments form code.

  echo '<center><table><tr><td>';
  echo '<p align=center><input type="reset" name="Clear" value="Clear"></p></td>';
  echo '<td><p align=center><input type="submit" name="Submit" value="Submit >>"></p></td>';
  echo '</tr></table></center>';
}
}
$connector->close();
echo '</td></tr></table></form>';
?>
