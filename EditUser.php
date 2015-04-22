<?php
        //
        //session_start();
	require_once 'Layout.php';
	echo start_page("edit here!");
	echo start_body();
	echo use_navigation();
       
include ('config.php');
if(isset($_GET['UserID']))
{
	$UserID=$_GET['UserID'];
	if(isset($_POST['submit']))
	{
		$FirstName=$_POST['FirstName'];
		$LastName=$_POST['LastName'];
                $Gender=$_POST['Gender'];
		$Email=$_POST['Email'];
                $City=$_POST['City'];
		$PhoneNo=$_POST['PhoneNo'];
                $UserName=$_POST['UserName'];
               $Password=$_POST['Password'];
		$query3=mysql_query( "UPDATE tbUser set FirstName= '$FirstName', LastName= '$LastName', Gender = '$Gender',
          Email= '$Email',City= '$City',PhoneNo= '$PhoneNo',UserName='$UserName',Password='$Password' where UserID = '$UserID'");
	if(query3)
	{
		header("location:list.php");
	}
    }
   }
$query1=mysql_query("select * from tbUser where UserID='$UserID'");
$query2=mysql_fetch_array($query1);



?>
<form action="" method="post">
<input type="text" name="FirstName" value="<?php echo $query2['FirstName'];?>"/><br>
<input type="text" name="LastName" value="<?php echo $query2['LastName'];?>"/><br>
<input type="text" name="Gender" value="<?php echo $query2['Gender'];?>"/><br>
 <input type="text" name="Email" value="<?php echo $query2['Email'];?>"/><br>
<input type="text" name="City" value="<?php echo $query2['City'];?>"/><br>
<input type="text" name="PhoneNo" value="<?php echo $query2['PhoneNo'];?>"/><br>
<input type="text" name="UserName" value="<?php echo $query2['UserName'];?>"/><br>
<input type="text" name="Password" value="<?php echo $query2['Password'];?>"/><br>
<input type="submit" name="submit" value="Save & continue"/>
</form>
</body>
</html>
<?php 

        echo after_content();
	echo use_footer();
	echo end_body();
	echo end_page();
?>