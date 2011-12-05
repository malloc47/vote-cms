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

$userid = $connector->fetchArray($connector->query('SELECT id FROM authuser WHERE (uname = "'.$USERNAME.'" OR uname2 = "'.$USERNAME.'" OR uname3 = "'.$USERNAME.'");'));



$electionDB = $connector->query('SELECT ID,ballottable FROM elections');

while($elections = $connector->fetchArray($electionDB)){
//  if($elections['open'])
    $connector->query('INSERT INTO '.$elections['ballottable'].'(ID) VALUES('.$userid['id'].');');
}


while(list($key, $value) = each($_POST)) { 

  if($value != "Submit >>" && $value != "Yes >>" && $key != "comments") {
    list($ballot,$position,$vote) = split(",",$value,3);
    $connector->query('UPDATE '.$ballot.' SET `'.$position.'` = '.$vote.' WHERE ID = '.$userid['id'].' LIMIT 1');
  }
  else if($key == "comments")
  {
    $connector->query('UPDATE '.$ballot.' SET `Comments` = "'.$value.'" WHERE ID = '.$userid['id'].' LIMIT 1');
  }

} 

$connector->query('UPDATE authuser SET `voted` = 1 WHERE ID = '.$userid['id'].' LIMIT 1');

echo '<p><font class="subhead">Vote Accepted</font></p><p><a href="index.php?id=11">Login</a></p>';
}
$connector->close();
?>