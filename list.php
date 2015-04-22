<?php
 //session_start();

 require_once 'layout2.php';
    echo start_page("Welcome!");
    echo start_body();
    echo use_navigation();
    
    include('config.php');
    $query1=mysql_query("select * from tbUser where UserName='".$_SESSION["UserName"]."'");

    $table = "<table border='2' style='width:90%'><tr><td>FirstName</td><td>LastName</td><td>Gender</td><td>Email</td><td>PhoneNo</td><td>City</td><td>UserName</td><td></td>";
    while($query2=mysql_fetch_array($query1))
    {
        $table .="<tr><td>".$query2['FirstName']."</td>";
        $table .= "<td>".$query2['LastName']."</td>";
        $table .= "<td>".$query2['Gender']."</td>";
        $table .= "<td>".$query2['Email']."</td>";
        $table .= "<td>".$query2['PhoneNo']."</td>";
        $table .= "<td>".$query2['City']."</td>";
        $table .= "<td>".$query2['UserName']."</td>";
        
        
      $table .= "<td><a href='EditUser.php?UserID=".$query2['UserID']."',><img src='pic/EditImg.jpg' height=40px width=40px /></a></td>";
      $table .= "<td><a href='delete.php?UserID=".$query2['UserID']."',><img src='pic/DeleteImg.jpg' width=40px /></a></td></tr>";
    }
    $table .= "</table>";

     
   
    
    echo($table);
    
    echo after_content();
    echo use_footer(); 
    echo end_body();
    echo end_page();
?>