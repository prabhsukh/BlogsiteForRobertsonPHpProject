
<html>
    <head>
        <title>      
        </title>
    </head>
    <body>
        <?php
	require_once 'layout2.php';
	echo start_page("Welcome!");
	echo start_body();
	echo use_navigation();
?>
        
 <?php
session_start();
unset($_SESSION['UserName']);
session_destroy();

header("Location: loginpage.php");
exit;
?>
    
   
<?php 
        echo after_content();
	echo use_footer();
	echo end_body();
	echo end_page();
?>
    </body>
</html>