
<?php
        include 'config.php';
        require_once 'UploadLayOut.php';
        echo start_page("Welcome!");
        echo start_body();
        echo use_navigation();
  if(isset($_POST['Name'])&& isset($_POST['Code'])){
      $name=  mysql_real_escape_string($_POST['Name']);
      $code=  mysql_real_escape_string($_POST['Code']);
      $newlink=  substr($code,16);
      
      mysql_query("insert into tbVideo(Name,Code)values('$name','$code')");
      header('location:VideoBlog.php');
  }
      ?>  
<form action="UploadVideo.php" method="POST">
    <input type="text" name="Name" placeholder="Video Name..."  required="Name">
    <input type="text" name="Code" placeholder="Share link" required="Code">
    <input type="submit" value="share!">
    
</form> 

       <?php 
        echo after_content();
	echo use_footer();
	echo end_body();
	echo end_page();
?>

