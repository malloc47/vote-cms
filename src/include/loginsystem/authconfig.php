<?
/*
# File: authconfig.php
# Script Name: vAuthenticate 3.0.1
# Author: Vincent Ryan Ong
# Email: support@beanbug.net
#
# Description:
# vAuthenticate is a revolutionary authentication script which uses
# PHP and MySQL for lightning fast processing. vAuthenticate comes 
# with an admin interface where webmasters and administrators can
# create new user accounts, new user groups, activate/inactivate 
# groups or individual accounts, set user level, etc. This may be
# used to protect files for member-only areas. vAuthenticate 
# uses a custom class to handle the bulk of insertion, updates, and
# deletion of data. This class can also be used for other applications
# which needs user authentication.
#
# This script is a freeware but if you want to give donations,
# please send your checks (coz cash will probably be stolen in the
# post office) them to:
#
# Vincent Ryan Ong
# Rm. 440 Wellington Bldg.
# 655 Condesa St. Binondo, Manila
# Philippines, 1006
*/
?>

<?
// ALL PATHS BELOW ARE RELATIVE TO THE DIRECTORY WHERE YOU HAVE INSTALLED vAuthenticate
$resultpage = "include/loginsystem/vAuthenticate.php";	// THIS IS THE PAGE THAT WOULD CHECK FOR AUTHENTICITY
$admin = "../../index.php?id=1";	// THIS IS THE PATH TO THE ADMIN INTERFACE
$success = "../../index.php?id=6";	// THIS IS THE PAGE TO BE SHOWN IF USER IS AUTHENTICATED
$failure = "../../index.php?id=10";	// THIS IS THE PAGE TO BE SHOWN IF USERNAME-PASSWORD COMBINATION DOES NOT MATCH
	
// The $_SERVER['HTTP_HOST'] takes care of the root directory of the web server
// This makes it possible to implement the script even on IP-based systems.
// For name-based systems, just think of $_SERVER['HTTP_HOST'] as the domain name
// example: $_SERVER['HTTP_HOST'] will have to be www.yourdomain.com
// For IP-based systems, this will replace the IP address
// example: $_SERVER['HTTP_HOST'] will have to be 66.199.47.5
$changepassword = "http://" . $_SERVER['HTTP_HOST'] . "/Scripts/vAuthenticate/chgpwd.php"; // Path to change password file
$login = "http://" . $_SERVER['HTTP_HOST'] . "/index.php?id=11"; // Path to page with the login box
$logout = "http://" . $_SERVER['HTTP_HOST'] . "/index.php?id=10"; // Path to logout page

// DB SETTINGS
$dbhost = "localhost";	// Change this to the proper DB Host name
$dbusername = "web7"; 	// Change this to the proper DB User
$dbpass = "";	// Change this to the proper DB User password
$dbname	= "usr_web7_3"; 	// Change this to the proper DB Name

?>
