<?

if(isset($_POST['emailusername']))
{
  $connector = new DbConnector(ELECTIONS);

  $useriddb = $connector->query('SELECT firstname,lastname,passwd FROM authuser WHERE (uname = "'.$_POST['emailusername'].'" OR uname2 = "'.$_POST['emailusername'].'" OR uname3 = "'.$_POST['emailusername'].'");');
  
  if($connector->getNumRows($useriddb)==1)
  {
  
    $userid = $connector->fetchArray($useriddb);
  
    $emailmessage = $userid['firstname']." ".$userid['lastname'].", \n\n"."Your vote-cms password is:\n\n".$userid['passwd']."\n\n"."If you experience any difficulty, please contact [contact info].";
  
    if(@mail($_POST['emailusername']."@domain.com","vote-cms Password",$emailmessage,"From: vote-cms Elections <[email]>"))
      echo '<p><font class="content">Password sent to '.$userid['firstname']." ".$userid['lastname'].".</font></p>";
    else
      echo '<p><font class="content">Unable to send Password to '.$userid['firstname']." ".$userid['lastname'].".</font></p>";
  }
  else
  {
    echo '<p><font class="content">Username not found.</font></p>';
  }
}


?>
