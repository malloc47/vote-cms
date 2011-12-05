<?
/*
# File: vAuthenticate.php
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
# post office) to:
#
# Vincent Ryan Ong
# Rm. 440 Wellington Bldg.
# 655 Condesa St. Binondo, Manila
# Philippines, 1006
*/

// Start Code

	// Use Sessions
	// NOTE: This will store the username and password entered by the user to the cookie
	// variables USERNAME and PASSWORD respectively even if the combination is correct or
	// not. Be sure to authenticate every page that you want to be secured and pass as 
	// parameters the variables USERNAME and PASSWORD.

	setcookie ("USERNAME", $_POST['username'],null,'/');

	setcookie ("PASSWORD", $_POST['password'],null,'/');
 
    // Change the path to auth.php and authconfig.php if you moved
    // vAuthenticate.php from its original directory.
  	include_once ("auth.php");
	include_once ("authconfig.php");

        $username =  $_POST['username'];

        $password =  $_POST['password'];

	$Auth = new auth();
	$detail = $Auth->authenticate($username, $password);

	if ($detail==0)
	{
	?><HEAD>
		<SCRIPT language="JavaScript1.1">
		<!--
			location.replace("<? echo $failure; ?>");
		//-->
		</SCRIPT>
	  </HEAD>
	<?
	}
	elseif ($detail['level'] == 1) {
	?><HEAD>
		<SCRIPT language="JavaScript1.1">
		<!--
			location.replace("<? echo $admin; ?>");
		//-->
		</SCRIPT>
	  </HEAD>
	<?
	}
	else 
	{
	?><HEAD>
		<SCRIPT language="JavaScript1.1">
		<!--
			location.replace("<? echo $success; ?>");
		//-->
		</SCRIPT>
	  </HEAD>
	<?
	  }
?>

