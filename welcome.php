
 
 
 
 <html>
    <head>
        <title>      
        </title>
    </head>
    <body>
        <?php
	require_once 'Layout.php';
	echo start_page("Welcome!");
	echo start_body();
	echo use_navigation();
 
session_start();
if(!isset($_SESSION["UserName"])){
    header("location:loginpage.php");
    
}
?>
        <h1> successfully Log in !</h1>
    
   
<?php 
        echo after_content();
	echo use_footer();
	echo end_body();
	echo end_page();
?>
    </body>
</html>