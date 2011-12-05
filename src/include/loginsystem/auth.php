<?
/*
# File: auth.php
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
<?php
class auth{
	// CHANGE THESE VALUES TO REFLECT YOUR SERVER'S SETTINGS
	var $HOST = "localhost";	// Change this to the proper DB HOST
	var $USERNAME = "web7";	// Change this to the proper DB USERNAME
	var $PASSWORD = "";	// Change this to the proper DB USER PASSWORD
	var $DBNAME = "usr_web7_3";	// Change this to the proper DB NAME

	// AUTHENTICATE
	function authenticate($username, $password) {
		$query = "SELECT * FROM authuser WHERE (uname='$username' OR uname2='$username' OR uname3='$username') AND passwd='$password' AND status <> 'inactive'";

		$connection = mysql_connect($this->HOST, $this->USERNAME, $this->PASSWORD);

		$SelectedDB = mysql_select_db($this->DBNAME);
		$result = mysql_query($query); 
		
		$numrows = mysql_num_rows($result);
		$row = mysql_fetch_array($result);
                $id=$row['id'];
                $UpdateRecords = "UPDATE authuser SET lastlogin = NOW(), logincount = logincount + 1 WHERE ID='$id'";		
		// CHECK IF THERE ARE RESULTS
		// Logic: If the number of rows of the resulting recordset is 0, that means that no
		// match was found. Meaning, wrong username-password combination.
		if ($numrows == 0 || trim($username) == "") {
			return 0;
		}
        /*
        elseif ($row["level"]==1) {  // ADMIN LOGIN
			$Update = mysql_query($UpdateRecords);
			return 1;
		}
        */
		else {
			$Update = mysql_query($UpdateRecords);
			return $row;
		}
	} // End: function authenticate

	// PAGE CHECK
	// This function is the one used for every page that is to be secured. This is not the same one
	// used in the initial login screen
	function page_check($username, $password) {
		$query = "SELECT * FROM authuser WHERE (uname='$username' OR uname2='$username' OR uname3='$username') AND passwd='$password' AND status <> 'inactive'";

        $connection = mysql_connect($this->HOST, $this->USERNAME, $this->PASSWORD);
		
		$SelectedDB = mysql_select_db($this->DBNAME);
		$result = mysql_query($query); 
		
		$numrows = mysql_num_rows($result);
		$row = mysql_fetch_array($result);

		// CHECK IF THERE ARE RESULTS
		// Logic: If the number of rows of the resulting recordset is 0, that means that no
		// match was found. Meaning, wrong username-password combination.
		if ($numrows == 0) {
			return false;
		}
		else {
			return $row;
		}
	} // End: function page_check
	
	// MODIFY USERS
	function modify_user($username, $password, $team, $level, $status) {

        // If $password is blank, make no changes to the current password
        if (trim($password == ''))
        {
            $qUpdate = "UPDATE authuser SET team='$team', level='$level', status='$status' WHERE uname='$username'";
        }
        else
        {
            $qUpdate = "UPDATE authuser SET passwd='$password', team='$team', level='$level', status='$status'
					    WHERE uname='$username'";
        }

		if (trim($level)=="") {
			return "blank level";
		}
		elseif (($username=="sa" AND $status=="inactive")) {
			return "sa cannot be inactivated";
		}
		elseif (($username=="admin" AND $status=="inactive")) {
			return "admin cannot be inactivated";
		}
		else {
			$connection = mysql_connect($this->HOST, $this->USERNAME, $this->PASSWORD);
			$SelectedDB = mysql_select_db($this->DBNAME);
			$result = mysql_query($qUpdate); 
			return 1;
		}
		
	} // End: function modify_user
	
	// DELETE USERS
	function delete_user($username) {
		$qDelete = "DELETE FROM  authuser WHERE uname='$username'";	

		if ($username == "sa") {
			return "User sa cannot be deleted.";
		}
		elseif ($username == "admin") {
			return "User admin cannot be deleted.";
		}
		elseif ($username == "test") {
			return "User test cannot be deleted.";
		}

		$connection = mysql_connect($this->HOST, $this->USERNAME, $this->PASSWORD);
		
		$SelectedDB = mysql_select_db($this->DBNAME);
		$result = mysql_query($qDelete); 
	
		return mysql_error();
		
	} // End: function delete_user
	
	// ADD USERS
	function add_user($username, $password, $team, $level, $status) {
		$qUserExists = "SELECT * FROM authuser WHERE uname='$username'";
		$qInsertUser = "INSERT INTO authuser(uname, passwd, team, level, status, lastlogin, logincount)
				  			   VALUES ('$username', '$password', '$team', '$level', '$status', '', 0)";

		$connection = mysql_connect($this->HOST, $this->USERNAME, $this->PASSWORD);
		
		// Check if all fields are filled up
		if (trim($username) == "") { 
			return "blank username";
		}
		// password check added 09-19-2003
		elseif (trim($password) == "") {
			return "blank password";
		}
		elseif (trim($level) == "") {
			return "blank level";
		}
		
		// Check if user exists
		$SelectedDB = mysql_select_db($this->DBNAME);
		$user_exists = mysql_query($qUserExists); 

		if (mysql_num_rows($user_exists) > 0) {
			return "username exists";
		}
		else {
			// Add user to DB			
			// OLD CODE - DO NOT REMOVE
			// $result = mysql_db_query($this->DBNAME, $qInsertUser);
	
			// REVISED CODE
			$SelectedDB = mysql_select_db($this->DBNAME);
			$result = mysql_query($qInsertUser); 

			return mysql_affected_rows();
		}
	} // End: function add_user


	// *****************************************************************************************
	// ************************************** G R O U P S ************************************** 
	// *****************************************************************************************

	// ADD TEAM
	function add_team($teamname, $teamlead, $status="active") {
		$qGroupExists = "SELECT * FROM authteam WHERE teamname='$teamname'";
		$qInsertGroup = "INSERT INTO authteam(teamname, teamlead, status) 
				  			   VALUES ('$teamname', '$teamlead', '$status')";
		
		$connection = mysql_connect($this->HOST, $this->USERNAME, $this->PASSWORD);
		
		// Check if all fields are filled up
		if (trim($teamname) == "") { 
			return "blank team name";
		}
		
		// Check if group exists
		// OLD CODE - DO NOT REMOVE
		// $group_exists = mysql_db_query($this->DBNAME, $qGroupExists);
		
		// REVISED CODE
		$SelectedDB = mysql_select_db($this->DBNAME);
		$group_exists = mysql_query($qGroupExists); 

		if (mysql_num_rows($group_exists) > 0) {
			return "group exists";
		}
		else {
			// Add user to DB
			// OLD CODE - DO NOT REMOVE
			// $result = mysql_db_query($this->DBNAME, $qInsertGroup);

			// REVISED CODE
			$SelectedDB = mysql_select_db($this->DBNAME);
			$result = mysql_query($qInsertGroup); 

			return mysql_affected_rows();
		}
	} // End: function add_group
	
	// MODIFY TEAM
	function modify_team($teamname, $teamlead, $status) {
		$qUpdate = "UPDATE authteam SET teamlead='$teamlead', status='$status'
					WHERE teamname='$teamname'";
		$qUserStatus = "UPDATE authuser SET status='$status' WHERE team='$teamname'";

		if ($teamname == "Admin" AND $status=="inactive") {
			return "Admin team cannot be inactivated.";
		}
		elseif ($teamname == "Ungrouped" AND $status=="inactive") {
			return "Ungrouped team cannot be inactivated.";
		}
		else {		
			$connection = mysql_connect($this->HOST, $this->USERNAME, $this->PASSWORD);
			
			// UPDATE STATUS IF STATUS OF TEAM IS INACTIVATED
			// OLD CODE - DO NOT REMOVE
			//$userresult = mysql_db_query($this->DBNAME, $qUserStatus);

			// REVISED CODE
			$SelectedDB = mysql_select_db($this->DBNAME);
			$userresult = mysql_query($qUserStatus); 
	
			// OLD CODE - DO NOT REMOVE
			// $result = mysql_db_query($this->DBNAME, $qUpdate);

			// REVISED CODE
			$result = mysql_query($qUpdate); 
	
			return 1;
		}
		
	} // End: function modify_team

	// DELETE TEAM
	function delete_team($teamname) {
		$qDelete = "DELETE FROM authteam WHERE teamname='$teamname'";
		$qUpdateUser = "UPDATE authuser SET team='Ungrouped' WHERE team='$teamname'";	
		
		if ($teamname == "Admin") {
			return "Admin team cannot be deleted.";
		}
		elseif ($teamname == "Ungrouped") {
			return "Ungrouped team cannot be deleted.";
		}
		elseif ($teamname == "Temporary") {
			return "Temporary team cannot be deleted.";
		}

		$connection = mysql_connect($this->HOST, $this->USERNAME, $this->PASSWORD);
		// OLD CODE - DO NOTE REMOVE
		// $result = mysql_db_query($this->DBNAME, $qUpdateUser);

		// REVISED CODE
		$SelectedDB = mysql_select_db($this->DBNAME);
		$result = mysql_query($qUpdateUser); 

		// OLD CODE - DO NOT REMOVE
		// $result = mysql_db_query($this->DBNAME, $qDelete);
		
		// REVISED CODE
		$result = mysql_query($qDelete); 

		return mysql_error();
		
	} // End: function delete_team


} // End: class auth
?>
