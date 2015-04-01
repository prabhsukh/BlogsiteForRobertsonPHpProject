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
        <center><h2> Register Here
<br>
<input type="text" name="firstname" placeholder="First name">
<br>
<input type="text" name="lastname" placeholder="Last name">
<br>
<input type="text" name="email" placeholder="Email">
<br>
<input type="text" name="phoneno" placeholder="Phone">
<br>
<input type="text" name="city" placeholder="City">
<br>
<input type="text" name="username" placeholder="User name">
<br>
<input type="text" name="password" placeholder="Password">
<br>
<input type="submit" value="Register"></h2></center>
</form>
   
<?php 
        echo after_content();
	echo use_footer();
	echo end_body();
	echo end_page();
?>
    </body>
</html>