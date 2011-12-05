<?
    if($id == 9)
        echo "<body background=\"include/interface1/images/background.gif\" onload=\"dynAnimation(); showCalendar('now')\"> ";
    else
        echo '<body background="include/interface1/images/background.gif" onload="dynAnimation()"> ';

?>
    <center>
        <table border="0"
               cellpadding="0"
               cellspacing="0"
               style="border-collapse: collapse"
               bordercolor="#111111"
               width="700">
            <tr>
                <?
                    include("include/interface1/leftbar.php");
                    include("include/interface1/$view/centerbar.php");
                    include("include/interface1/rightbar.php");
                ?>
            </tr>
        </table>
    </center>
</body>
