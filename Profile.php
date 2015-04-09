<html>
    <head>
        <title>
            
        </title>
    </head>
    <body>
<?php
        include 'config.php';
	require_once 'layout2.php';
	echo start_page("Welcome!");
	echo start_body();
	echo use_navigation();
  session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbGroupProject";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 
$sql = "SELECT ProfileImageUrl,FirstName,LastName,Gender,Email,City,PhoneNo FROM tbUser WHERE UserName = '".$_SESSION["UserName"]."'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    $output = "<div class='NiceFont'>";
    
    while($row = mysqli_fetch_assoc($result)) {
     $output .=
        "<img src='".$row["ProfileImageUrl"]."' width=190>". "<br>".
       
         "<br>". "Full Name :<b>". $row["FirstName"]." ".$row["LastName"]. "</b><br>".
       
         "<br>". "Gender :".  $row["Gender"]. "<br>".
       
             "<br>". "E-Mail :".  $row["Email"].  "<br>".
                     
                "<br> ". "City :".$row["City"].  "<br>".
              "<br> "."Contact :". $row["PhoneNo"]. "<br>".
         
              "<br>";
    }
    $output .= "</div>";
    echo $output;
} else {
    echo "0 results";
}

mysqli_close($conn);
?>
<?php 

        echo after_content();
	echo use_footer();
	echo end_body();
	echo end_page();
?>
    </body>
</html>