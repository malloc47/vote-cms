<table class="content"> <tr><td>
<?
  if($_GET['accesskey'] == '47rulestheuniverse')
  {
    $connector = new DbConnector(ELECTIONS);
    $electionDB = $connector->query('SELECT name,positiontable,ballottable,open FROM elections');
    while($elections = $connector->fetchArray($electionDB)){
      echo '<p><font class="ballotsize">'.$elections['name'].'</font><br>';
      echo '<font class="ballotsize">Status: <b>';
      if($elections['open'])
        echo 'Open';
      else
        echo 'Closed';
      echo '</b></font></p>';
      
      $positionDB = $connector->query('SELECT ID,position FROM '.$elections['positiontable']);
      while($positions = $connector->fetchArray($positionDB)){
        $positionName = $connector->fetchArray($connector->query('SELECT ID,positionname FROM positions WHERE ID = '.$positions['position']));
        echo '<font class="ballotsize"><b>'.$positionName['positionname'].'</b></font><br>';
        echo '<table class="ballot"><tr><td>';
        
        $candidatesDB = $connector->query('SELECT ID,name,position FROM candidates WHERE position = '.$positionName['ID']);
        
        if($connector->getNumRows($candidatesDB)==1){
          $candidates = $connector->fetchArray($candidatesDB);
          $votesDB = $connector->query('SELECT `ID`,`'.$positionName['ID'].'` FROM '.$elections['ballottable'].' WHERE `'.$positionName['ID'].'` = '.$candidates['ID']);
          $yes = $connector->getNumRows($votesDB);
          $votesDB = $connector->query('SELECT `ID`,`'.$positionName['ID'].'` FROM '.$elections['ballottable'].' WHERE `'.$positionName['ID'].'` = '.$candidates['ID']*-1);
          $no = $connector->getNumRows($votesDB);
          $votesDB = $connector->query('SELECT `ID`,`'.$positionName['ID'].'` FROM '.$elections['ballottable'].' WHERE `'.$positionName['ID'].'` != "NULL"');
          $totalVotes = $connector->getNumRows($votesDB);
          echo '<font class="ballotsize">'.$candidates['name'].'</font>';
          echo '<table class="ballot"><tr><td>';
          echo '<font class="ballotsize">Yes: '.$yes.' ( '.substr(($yes/$totalVotes)*100 ,0,5) .'% )</font><br>';
          echo '<font class="ballotsize">No : '.$no.' ( '.substr(($no/$totalVotes)*100 ,0,5) .'% )</font><br>';
          echo '</td></tr></table>';
        }
        else {
          while($candidates = $connector->fetchArray($candidatesDB)){
            $votesDB = $connector->query('SELECT `ID`,`'.$positionName['ID'].'` FROM '.$elections['ballottable'].' WHERE `'.$positionName['ID'].'` = '.$candidates['ID']);
            $candidateVotes = $connector->getNumRows($votesDB);
            $votesDB = $connector->query('SELECT `ID`,`'.$positionName['ID'].'` FROM '.$elections['ballottable'].' WHERE `'.$positionName['ID'].'` != "NULL"');
            $totalVotes = $connector->getNumRows($votesDB);
            echo '<font class="ballotsize">'.$candidates['name'].': '.$candidateVotes.' ( '.substr(($candidateVotes/$totalVotes)*100 ,0,5) .'% )</font><br>';
          }
        }
        echo '</td></tr></table>';
      }
      echo '<table class="ballotsize"><tr><td>';
      $statisticsDB = $connector->query('SELECT ID FROM authuser WHERE (level != 5 AND level != 1)');
      $voterBase = $connector->getNumRows($statisticsDB);
      $statisticsDB = $connector->query('SELECT ID FROM '.$elections['ballottable']);
      $voteTotal = $connector->getNumRows($statisticsDB);
      echo 'Statists based on '.$voteTotal.' votes with a '.substr(($voteTotal/$voterBase)*100 ,0,5) .'% turnout';
      echo '</td></tr></table>';
    }
    $connector->close();
  }
?>
</td></tr></table>
