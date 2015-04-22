<?php
    session_start();
    $UserString = "";
    $UserID = "";
    
    if (isset($_SESSION["UserID"])) {
        $UserID = $_SESSION["UserID"];
        $UserString = "?UserID=".$UserID;
    }
    
    
	function start_page($title)
	{
		return "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
                        <html xmlns='http://www.w3.org/1999/xhtml'>
                        <head>
                            <meta http-equiv='content-type' content='text/html; charset=utf-8' />
                            <title>$title</title>
                            <link href='default.css' rel='stylesheet' type='text/css' media='screen' />
                            <script src='js/jquery-2.1.3.js' type='text/javascript'></script>

                        </head>";
        }

        function start_body()
        {
            global $UserString;
            
                return <<<EOT
                        <body>
                        <!-- start header -->
                        <div id="header">
                                <div id="logo">
                                        <h1><a href="#">SD BlogSite</a></h1>
                                        <h2><a href="http://www.robertsoncollege.com/">Software Developer</a></h2>
                                </div>
                                <div id="menu">
                                        <ul>
                                                <li class="active"><a href="BlogList.php$UserString" accesskey="1" title="">Home</a></li>
                                                <li><a href="profile.php" accesskey="2" title="">Profile</a></li>
                                                <li><a href="BlogList.php" accesskey="3" title="">Blog</a></li>
                                                <li><a href="AddNewBlog.php" accesskey="4" title="">Add Blog</a></li>
                                                <li><a href="#" accesskey="5" title="">About</a></li>
                                        </ul>
                                </div>
                      
                        <!-- end header 
                        <div id="gallery">
                                <div id="top-photo">
                                        <p><a href="#"><img src="images/img08.jpg" alt="" width="830" height="300" /></a></p>
                                </div>
                        </div>-->

                        <!-- start page -->
                        <div id="page">
                                <!-- start content-->
                                <div id="content">
                                        <div class="post">
                                               
EOT;
	}
	
	function after_content()
	{
            $result = <<<EOT
			</div>
                        </div>
                        <!-- end content -->
                        <!-- start sidebar --> 
                        <div id="sidebar">
                                <ul>
                                        <li>
                                            <h2>
EOT;
            
            if(isset($_SESSION['UserName']) && $_SESSION['UserName'] != "")
            {
                  $result .= "<a href='logoutpage.php'>Logout</a> ". $_SESSION['UserName'];
            }
            else
            {
                  $result .= "<a href='loginpage.php'>Login</a> ";
            }
            
            $result .= <<<EOT
                    </h2>
                        <!-- <ul>
                         <li><a href="#">Aliquam libero</a></li>
                              <li><a href="#">Consectetuer adipiscing elit</a></li>
                                <li><a href="#">metus aliquam pellentesque</a></li>
                                <li><a href="#">Suspendisse iaculis mauris</a></li>
                                <li><a href="#">Urnanet non molestie semper</a></li>
                                <li><a href="#">Proin gravida orci porttitor</a></li>
                        </ul>-->
                        </li>
                        <li>
                                <h2>Archives</h2>
                                <ul>
                                        <li><a href="#">September</a> (23)</li>
                                        <li><a href="#">August</a> (31)</li>
                                        <li><a href="#">July</a> (31)</li>
                                        <li><a href="#">June</a> (30)</li>
                                        <li><a href="#">May</a> (31)</li>
                                        <li><a href="#">April</a> (30)</li>
                                        <li><a href="#">March</a> (31)</li>
                                        <li><a href="#">February</a> (28)</li>
                                        <li><a href="#">January</a> (31)</li>
                                </ul>
                        </li>
                </ul>
        </div>
                      </div>
        <!-- end sidebar -->
    </div>
    <div style="clear: both; height: 30px">&nbsp;</div>
    <!-- end page -->
EOT;
            return $result;
	}
	
	function use_navigation() { return ""; }
        
        function use_GetPicture()
	{
            #HARD CODED A 1 in BLOGID, have to fix later!!s
		return <<<EOT
                        <script type="text/javascript">
$(document).ready(function() {

	$.post("getpicture.php", { pic: "1"}, function( data ) {
	  $("#picture").html( data );
	});
	
	$("#picture").on("click",".get_pic", function(e){
		var picture_id = $(this).attr('data-id');
		$("#picture").html("<div style'margin:50px auto;width:50px;'><img src='images/loader.gif' /></div>");
		$.post( "getpicture.php", { pic: picture_id}, function( data ) {
			$("#picture").html( data );
		});
		return false;
	});
	
});
</script>

<div id="picture" align="center"> 
   <!-- pictures will appear here --> 
</div>
EOT;
	}
	
	function use_admin_navigation()
	{
		return "";
	}
	
	function use_footer()
	{
		return <<<EOT
                        <div id="footer">
                                <p>All Rights Reserved. &nbsp;&bull;&nbsp; Designed by <a href="http://www.robertsoncollege.net/">software developer</a> | Courtesy <a href="http://www.google.com" target="_blank">Search Engine</a>, Thanks to <a href="http://www.robertsoncollege.net" target="_blank">SEO</a></p>
                        </div>
EOT;
	}
        
        function end_body()
	{
		return "</body>";
	}
	function end_page()
	{
		return "</html>";	
	}
?>