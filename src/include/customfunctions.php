<?
// Format the ugly MySQL date string into a more logical and nice-looking form
function converttimestamp($tstp) {
    return(substr($tstp,5,2).'/'.substr($tstp,8,2).'/'.substr($tstp,0,4).' '.substr($tstp,11,8));

}

function createRandomPassword($length) {
  $chars = "abcdefghijkmnopqrstuvwxyz023456789";
  srand((double)microtime()*1000000);
  $i = 0;
  $pass = '' ;
  while ($i <= $length) {
    $num = rand() % 33;
    $tmp = substr($chars, $num, 1);
    $pass = $pass . $tmp;
    $i++;    
  }    
  return $pass;
}

?>
