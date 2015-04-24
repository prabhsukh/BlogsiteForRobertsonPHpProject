<?php
    include 'config.php';
    require_once 'AdminLayoutPage.php';
    echo start_page("Welcome!");
    echo start_body();
    echo use_navigation();
 ?>   

<html>
    <head>
        <title></title>
        <script src="js/jquery.min.js" type="text/javascript"></script>
      
    </head>
    <body>
        <form>
            <marquee>New Updates are Avialiable</marquee>
            <br>
            <br>
            <img src="Pic/Admin2.jpg" height="70" width="80">
            <input type="text" name="search" onkeyup="searchq();" placeholder="Search User...." style="border-color:yellow" />
            <img src="Pic/search.jpg" height="40" width="50">
        </form>
        <div id="output"></div>
    </body>        
    
        <script>
            function searchq() {
                var searchTxt=$("input[name='search']").val();
                $.post("Search.php",{searchVal:searchTxt},function(output){
                    $("#output").html(output);
                });
           } 
        </script>
</html>
 <?php
 echo after_content();
   //echo use_footer();
   echo end_body();
   echo end_page();
  ?>