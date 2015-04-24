<?php 
require_once 'layout2.php';
	echo start_page("edit here!");
	echo start_body();
	echo use_navigation();
        
include ('config.php');
if(isset($_GET['VideoID']))
{
	$VideoID=$_GET['VideoID'];
	$query1=mysql_query("delete from tbVideo where VideoID= $VideoID");
	if(query1)
	{
		header('location:VideoBlog.php');
	}
}


        echo after_content();
	echo use_footer();
	echo end_body();
	echo end_page();
?>