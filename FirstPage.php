
<?php
        include 'config.php';
        require_once 'UploadLayOut.php';
        echo start_page("Welcome!");
        echo start_body();
        echo use_navigation();
        ?><br>
    
<ul>
       
         </li><p style="float: left; width:150px;"><img src="images/sdpic.jpg" height="90" width="100"></p>
  
        <i>
            <p style="float: justify; width:450px;">
    Welcome to the sd BlogSite Home Page.
This page is where you can come to get Blogs,You can update new Blogs too. First Register and
Check the information on upcoming Blogs and Videos, 
articles of interest and links to sites that may be of use to you as a software developer.
Login and Register listed in the navigation page on the right hand side of the screen under the banner picture.</p></i>
          <li><a href="">Welcome to the SD BlogSite </a></li>
          <li><a href=""> View My Available Blog</a></li>
         <li><a href="LoginPage.php">Sd Blog Login</a></ul> 
<?php      
        echo after_content();
	echo use_footer();
	echo end_body();
	echo end_page();
?>

