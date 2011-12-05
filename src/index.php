<?
  if (isset($_GET['username']) && isset($_GET['password'])) {
    setcookie ("USERNAME", $_GET['username'],null,'/');
    setcookie ("PASSWORD", $_GET['password'],null,'/');
  }
  else if($_GET['id'] == 15 || $_GET['id']==12 || $_GET['id'] == 10) {
    setcookie ("USERNAME", "",null,'/');
    setcookie ("PASSWORD", "",null,'/');
  }
?>

<html>

<?

include("include/constants.php");
include("include/customfunctions.php");

// Add the database class
require_once('include/dbconnector.php');

// Create the database object
$connector = new DbConnector(SYSTEMDB);

if(!isset($_GET['id']))
   $id=11;
else
   $id=$_GET['id'];

$row = $connector->fetchArray($connector->query('SELECT pages.title, pages.pagekey, pages.masterpage, views.view FROM pages LEFT JOIN views ON pages.view = views.ID WHERE pages.ID = ' . $id));

$pageTitle = $row['title'];
$pageKey = $row['pagekey'];
$masterpage = $row['masterpage'];
$view = $row['view'];

if ($masterpage == NULL)
    $masterpage = $pageKey;

$connector->close();

$interface="interface1";

@include("include/$interface/head.php");
@include("include/$interface/maintable.php");

?>

</html>
