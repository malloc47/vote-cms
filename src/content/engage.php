<?
if(isset($_GET['accesskey']))
{ 
  if($_GET['accesskey'] != 'supersecredpasswordkey') {
    echo 'Incorrect access key';
  }
  else {
    $connector = new DbConnector(ELECTIONS);
    $connector->query('UPDATE `elections` SET `open` = 1;');
    $connector->close();
    echo 'The election has begun';
  }
}
else
{
  echo 'Supply access key';
}
?>
