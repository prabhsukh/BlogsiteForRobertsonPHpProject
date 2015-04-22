<?php
    include 'config.php';
    require_once 'layout2.php';
    echo start_page("Welcome!");
    echo start_body();
    echo use_navigation();
    
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
    
   // #http://stackoverflow.com/questions/11480763/how-to-get-parameters-from-this-url-string
    $parts = parse_url($_SERVER['QUERY_STRING']);
    parse_str($parts['path'], $query);
    
    if (isset($query["userid"]) && $query["userid"] != "") {
        $ProfileUserID = $query["userid"];
    }
    else
    {
        $ProfileUserID = $_SESSION["UserID"];
    }

    $sql = "SELECT ProfileImageUrl,FirstName,LastName,Gender,Email,City,PhoneNo FROM tbUser WHERE UserID = '".$ProfileUserID."'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        $output = "<div class='Fontclass'>";
?>
<?php

        while($row = mysqli_fetch_assoc($result)) {
            $output .=
            "<table><tr><td><div class='Divitem'><img src='".$row["ProfileImageUrl"]."' width=200></div>"."</td><td>"."</td><td>"."</td>"."<td>".
                    
            "Full Name :"."<i>". $row["FirstName"]." ".$row["LastName"]."</i>". "<br>".
                    
           "<br>". "Gender :"."<i>".  $row["Gender"]."</i>". "<br>".
          "<br>". "E-Mail :"."<i>".  $row["Email"]."</i>"."<br>".
            "<br>". "City :"."<i>".$row["City"]."</i>"."<br>".
           "<br>"."Contact :"."<i>". $row["PhoneNo"]."</i>". "</td>";
        }
        
        $output .="</td></tr></table></div>";
        echo $output;
    } 
    else {
        echo "0 results";
    }
mysqli_close($conn);


         if(isset($_SESSION['UserID']) && $_SESSION['UserID'] == "$ProfileUserID")
            {
                 echo "<i><a href='list.php'>Edit Profile Information</a></i> ";
                 echo "<br><br><i><a href='AddNewBlog.php'>Create Blog</a></i>";
                  
            }
            else
            {
                echo "<a href='EditBlog.php'>Visit To Blog Page >>></a> ";
                  
            }
       
        echo after_content();
	echo use_footer();
	echo end_body();
	echo end_page();
?>