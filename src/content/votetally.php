<table class="content"> <tr><td>
<?
  if($_GET['accesskey'] == '47rulestheuniverse')
  {
  

  $connector = new DbConnector(ELECTIONS);

  $electionDB = $connector->query('SELECT * FROM dummyballot');
  $j = 1;
  while($elections = $connector->fetchArray($electionDB)){
    echo '<p><font class="content"><u>Ballot #'.$j.':</u><br> ';

    for($i=1;$i<=7;$i++){
      $positions = $connector->fetchArray($connector->query('SELECT positionname FROM positions WHERE ID = '.$i));
      echo $positions['positionname'].': <b>';
      
      if($elections["$i"] == null){
        echo 'None';
      }
      else {
        $nameQuery = $connector->fetchArray($connector->query('SELECT name FROM candidates WHERE ID = '.abs($elections["$i"])));
        echo $nameQuery['name'];
        if($elections["$i"] < 0)
          echo ': No';
      }
      echo '</b><br />';
    }
    echo '</font></p>';
    $j++;
  }
}
?>
</td></tr></table>
