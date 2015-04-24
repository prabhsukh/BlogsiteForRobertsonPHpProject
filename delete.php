<?php 
require_once 'layout2.php';
	echo start_page("edit here!");
	echo start_body();
	echo use_navigation();
        
include ('config.php');
if(isset($_GET['UserID']))
{
	$UserID=$_GET['UserID'];
	$query1=mysql_query("delete from tbUser where UserID= $UserID");
	if(query1)
	{
		header('location:list.php');
	}
}
        echo after_content();
	echo use_footer();
	echo end_body();
	echo end_page();
?>