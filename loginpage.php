
        <?php
        session_start();
	require_once 'LoginRegisterLayout.php';
	echo start_page("Welcome!");
	echo start_body();
	echo use_navigation();
       
  
     
?> 
<table width="300" border="0" align="center" cellpadding="0" cellspacing="1">
<tr>
<form name="form1" method="post" action="loginpage.php">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1">
<tr>
    <td colspan="3"><strong> <h2><a href="#">User Login</a></h2> </strong></td>
</tr>
<tr>

<td width="6"></td>
<td width="294"><input name="UserName" type="text" id="UserName" placeholder="User Name" required="required"></td>
</tr>
<tr>

<td></td>
<td><input type="password" name="Password" id="Password" placeholder="password" required="required"></td>

</tr>
<tr>

<td>&nbsp;</td>
<td><input type="submit" name="Submit" value="Login"></td>
</tr>
<tr>
    <td></td>
    <td>
        <a href="registerpage.php">Create a New Account</a>
    </td>
    <td></td>
</tr>
</table>
</td>
</form>
</tr>
</table>  
<?php 

include 'config.php';
   
   if (isset($_POST['UserName']) && isset($_POST['Password'])) {
    $myusername = $_POST['UserName']; 
    $mypassword = $_POST['Password']; 

    $myusername = stripslashes($myusername);
    $mypassword = stripslashes($mypassword);
    $myusername = mysql_real_escape_string($myusername);
    $mypassword = mysql_real_escape_string($mypassword);
    $sql="SELECT * FROM $tbl_name WHERE UserName='$myusername' and Password='$mypassword'";

    $result=mysql_query($sql);
    $count=mysql_num_rows($result);
    
    while ($row = mysql_fetch_assoc($result)) {
        $_SESSION["UserID"] = $row['UserID'];
        $_SESSION["UserName"] = $myusername;
        $_SESSION["AccessLevelID"] = $row['AccessLevelID'];
        
        if ($row['AccessLevelID'] == '1') {
            header("location:AdminHomePage.php");
        }
        else
        {
            header("location:FirstPage.php");
        }
    }
    
    header ("loginpage.php");
    echo '<h2><span style="color:red; text-align:center;">Wrong Username or Password provided!</span></h2>';
   } 
        echo after_content();
	echo use_footer();
	echo end_body();
	echo end_page();
?>
  
