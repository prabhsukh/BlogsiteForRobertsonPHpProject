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
?>
 
    <form>
<br>
<input type="text" name="firstname" placeholder="First name">
<br>
<input type="text" name="lastname" placeholder="Last name"><br>
<input type="submit" value="Login">
</form>
   
<?php 
        echo after_content();
	echo use_footer();
	echo end_body();
	echo end_page();
?>
    </body>
</html>