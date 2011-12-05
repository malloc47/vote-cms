<?
include_once ("include/loginsystem/auth.php");
include_once ("include/loginsystem/authconfig.php");
include_once ("include/loginsystem/check.php");

$connector = new DbConnector(ELECTIONS);

$userid = $connector->fetchArray($connector->query('SELECT voted FROM authuser WHERE (uname = "'.$USERNAME.'" OR uname2 = "'.$USERNAME.'" OR uname3 = "'.$USERNAME.'");'));

if($userid['voted']!=0) {
  echo '<table class="content"><tr><td><p><font class="content">You have already voted!</font></p></td></tr></table>';
}
else
{

echo '<form name="ballotverify" method="post" action="index.php?id=12">';

echo '<table class="content"><tr><td>';

echo '<p><font class="content">You voted for:</font></p>';


while(list($key, $value) = each($_POST)) { 

  if($value != "Submit >>" && $key != "comments") {
    echo '<input type="hidden" NAME="'.$key.'" VALUE="'.$value.'">';

    list($ballot,$position,$vote) = split(",",$value,3);

    $positionName = $connector->fetchArray($connector->query('SELECT ID,positionname FROM positions WHERE ID = '.$position));    

    $voteName = $connector->fetchArray($connector->query('SELECT ID,name FROM candidates WHERE ID = '.abs($vote)));

    echo '<p><font class="subhead">'.$positionName['positionname'].': </font><font class="content">'.$voteName['name'];
    if($vote < 0)
      echo ': NO';
    echo '</font></p>';
  }
  else if($key == "comments")
  {
    echo '<input type="hidden" NAME="comments" VALUE="'.$value.'">';
    echo '<p><font class="subhead">Comments: </font><font class="content">'.$value.'</font></p>';
  }
}

echo '</td></tr></table>';
echo '<table class="content"><tr><td><p align="center"><input type="button" name="No" value="<< Back" onClick="history.go(-1)"></p></td><td><p align="center"><input type="submit" name="Submit" value="Confirm >>"></p></td></tr></table>';
echo '</form>';
}
$connector->close();
?>