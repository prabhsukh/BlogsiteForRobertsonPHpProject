        <?php
        include 'config.php';
	require_once 'Layout.php';
	echo start_page("Welcome!");
	echo start_body();
	echo use_navigation();
 
    session_start();
 
        if(!isset($_SESSION["UserName"])){
        header("location:loginpage.php");
            }
     
       echo ($_SESSION['UserName']);
    // $sql="SELECT * FROM $tbl_name ";
    // $result=mysql_query($sql);
    //$count=mysql_num_rows($result);
        ?>

 <html>
    <head>
        
        <title>      
        </title>
    </head>
    <body>
     <a href>
         <form name="" action="welcome.php" method="get">
         
            <table>
                <tr>
                    <td>
                        <img src="Pic/img.jpg" alt="" width="180" height="160" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for>First Name</label>
                
                        <label for>Last Name</label>
                    </td>
                </tr>
                <tr>
                    <td>
                         <label for>Email</label>
                    </td>
                </tr>
                <tr>
                    <td>
                         <label for>City</label>
                    </td>
                </tr>
                <tr>
                    <td>
                         <label for>Phone No</label>
                    </td>
                </tr>
                    
            </table>
     </a>
       
    </form>
    </body>
</html>
<?php 
        echo after_content();
	echo use_footer();
	echo end_body();
	echo end_page();
?>