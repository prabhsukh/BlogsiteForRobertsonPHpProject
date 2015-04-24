<html>
<head><title>delete here
</title>
</head>
<body>
<?php 
include ('config.php');
if(isset($_GET['UserID']))
{
	$UserID=$_GET['UserID'];
	$query1=mysql_query("delete from tbUser where UserID=$UserID");
	if(query1)
	{
		header('location:AdminEdit.php');
	}
}
?>
</body>
</html