<?php include_once ("include/loginsystem/authconfig.php"); ?>
<form name="electionlogin" method="post" action="<?php print $resultpage ?>">
    <table class="content">
      <tr>
        <td><table class="hilight"><tr><td><b><font class="contentheader">Welcome to vote-cms!</font></b></td></tr></table></td>
      </tr>
    </table>
    <table class="loginsm">
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><font class="content">Use your vote-cms username and unique password to log-in and vote:</font></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
    </table>
      <center>
        <table class="login">
          <tr>
            <td><img src="include/interface1/images/evote.jpg" /></td>
            <td>
              <table class="loginin">
                <tr>
                  <td><p align="right"><font class="content">User Name:</font></p></td>
                  <td><p align="left"><input type = "text" name="username" id="username" size="15" maxlength="15"></p></td>
                </tr>
                <tr>
                  <td><p align="right"><font class="content">Password:</font></p></td>
                  <td><p align="left"><input type = "password" name="password" id="password" size="15" maxlength="15"></p></td>
                </tr>
                <tr>
                  <td><p align="center"><input type="reset" name="Clear" value="Clear"></p></td>
                  <td><p align="center"><input type="submit" name="Login" value="Login >>"></p></td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </center>
</form>

<form name="electionpassword" method="post" action="index.php?id=17">
  <table class="content">
    <tr>
      <td><font class="content">If you have forgotten your password, enter your vote-cms username to have your password resent to your e-mail account:</font></td>
    </tr>
    <tr>
      <td><input type = "text" name="emailusername" id="emailusername" size="15" maxlength="15"></td>
    </tr>
    <tr>
      <td><input type="submit" name="Submit" value="Submit"></td>
    </tr>
  </table>
</form>
