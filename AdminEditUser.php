<?php
       // session_start();
	require_once 'layout2.php';
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
              
		$query3=mysql_query( "UPDATE tbUser set FirstName= '$FirstName', LastName= '$LastName', Gender = '$Gender',
          Email= '$Email',City= '$City',PhoneNo= '$PhoneNo' where UserID = '$UserID'");
	if(query3)
	{
		header("location:AdminEdit.php");
	}
}
}
$query1=mysql_query("select * from tbUser where UserID='$UserID'");
$query2=mysql_fetch_array($query1);


?>
<form action="" method="post">
            <input type="text" name="FirstName" id="FirstName" placeholder="First Name" value="<?php echo $query2['FirstName'];?>" required="FirstName">
            <br><br>
            <input type="text" name="LastName" id="LastName" placeholder="Last Name" value="<?php echo $query2['LastName'];?>" required="LastName">
            <br><br>
            <input type="text" name="Gender" id="Gender" placeholder="Gender" value="<?php echo $query2['Gender'];?>" required="Gender">
            <br><br>
            <input type="email" name="Email" id="Email" placeholder="Email" value="<?php echo $query2['Email'];?>" required="Email">
            <br><br>
            <input type="text" name="City" id="City" placeholder="City" value="<?php echo $query2['City'];?>" required="City">
            <br><br>
            <input type="text" name="PhoneNo" id="PhoneNo" placeholder="Phone No" value="<?php echo $query2['PhoneNo'];?>" required="PhoneNo">
            <br><br>
            
<input type="submit" name="submit" value="Save and Continue"/>
</form>
</body>
</html>
<?php 

        echo after_content();
	echo use_footer();
	echo end_body();
	echo end_page();
?>