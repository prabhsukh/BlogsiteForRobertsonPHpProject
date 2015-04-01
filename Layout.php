<?php
	function start_page($title)
	{
		return "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
                        <html xmlns='http://www.w3.org/1999/xhtml'>
                        <head>
                        <meta http-equiv='content-type' content='text/html; charset=utf-8' />
                        <title>".$title."</title>
                        <link href='default.css' rel='stylesheet' type='text/css' media='screen' />
                        </head>";
                                }

        function start_body()
        {
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
                                                <li class="active"><a href="#" accesskey="1" title="">Home</a></li>
                                                <li><a href="#" accesskey="2" title="">Blog</a></li>
                                                <li><a href="#" accesskey="3" title="">Photos</a></li>
                                                <li><a href="#" accesskey="4" title="">About</a></li>
                                                <li><a href="#" accesskey="5" title="">Contact</a></li>
                                        </ul>
                                </div>
                        </div>
                        <!-- end header -->
                        <div id="gallery">
                                <div id="top-photo">
                                        <p><a href="#"><img src="images/img08.jpg" alt="" width="830" height="300" /></a></p>
                                </div>
                        </div>

                        <!-- start page -->
                        <div id="page">
                                <!-- start content -->
                                <div id="content">
                                        <div class="post">
                                                <h1 class="title">Welcome to our Blog Site</h1>
EOT;
	}
	
	function after_content()
	{
		return <<<EOT
			</div>
                        </div>
                        <!-- end content -->
                        <!-- start sidebar -->
                        <div id="sidebar">
                                <ul>
                                        <li>
                                            <h2><a href="login.php">Login here >>></a></h2>
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
                        <!-- end sidebar -->
                </div>
                <div style="clear: both; height: 30px">&nbsp;</div>
                <!-- end page -->
EOT;
	}
	
	function use_navigation()
	{
		return "";
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