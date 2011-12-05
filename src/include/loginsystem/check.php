<?
/*
# File: check.php
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
?>
<?
    // Check if the cookies are set
    // This removes some notices (undefined index)
    if (isset($_COOKIE['USERNAME']) && isset($_COOKIE['PASSWORD']))
    {
        // Get values from superglobal variables
        $USERNAME = $_COOKIE['USERNAME'];
        $PASSWORD = $_COOKIE['PASSWORD'];

        $CheckSecurity = new auth();
        $check = $CheckSecurity->page_check($USERNAME, $PASSWORD);
    }
    else if(isset($_GET['username']) && isset($_GET['password']))
    {
	$USERNAME = $_GET['username'];
	$PASSWORD = $_GET['password'];

	$CheckSecurity = new auth();
        $check = $CheckSecurity->page_check($USERNAME, $PASSWORD);
    }
    else
    {
        $check = false;
    }

	if ($check == false)
	{
		// Feel free to change the error message below. Just make sure you put a "\" before
		// any double quote.

                echo '<p><font class="content">Redirecting...</font></p>';
		   ?>
              <HEAD>
			           <SCRIPT language="JavaScript1.1">
			           <!--
				           location.replace("<? echo $login; ?>");
                       //-->
                       </SCRIPT>
              </HEAD>
            <?
		// END OF REDIRECTION BLOCK
		exit; // End program execution. This will disable continuation of processing the rest of the page.
	}	

?>
