<?php
 require_once 'layout2.php';
    echo start_page("Welcome!");
    echo start_body();
    echo use_navigation();
 //session_start();
    include('config.php');
 //  printf ("The last record : %d\n",mysql_insert_id());
    $query1=mysql_query("select * from tbUser");

    $table = "<table border='2' style='width:90%'><tr><td>FirstName</td><td>LastName</td><td>Gender</td><td>Email</td><td>PhoneNo</td><td>City</td><td></td><td></td>";
    while($query2=mysql_fetch_array($query1))
    {
        $table .="<tr><td>".$query2['FirstName']."</td>";
        $table .= "<td>".$query2['LastName']."</td>";
        $table .= "<td>".$query2['Gender']."</td>";
        $table .= "<td>".$query2['Email']."</td>";
        $table .= "<td>".$query2['PhoneNo']."</td>";
        $table .= "<td>".$query2['City']."</td>";
       
      $table .= "<td><a href='AdminEditUser.php?UserID=".$query2['UserID']."'><img src='pic/EditImg.jpg' height=40px width=40px /></a></td>";
      $table .= "<td><a href='AdminDeleteUser.php?UserID=".$query2['UserID']."'><img src='pic/DeleteImg.jpg' width=40px /></a></td></tr>";
    }
    $table .= "</table>";

     
   
    echo($table);
    
    echo after_content();
    echo use_footer(); 
    echo end_body();
    echo end_page();
?>