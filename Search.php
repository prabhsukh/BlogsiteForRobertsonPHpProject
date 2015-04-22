<?php
mysql_connect("localhost","root","")or die("could not connect");
mysql_select_db("dbGroupProject")or die("could not find db");
//$output='';
if(isset($_POST['searchVal']))  {
    $searchq1 =$_POST['searchVal'];
    $searchq1= preg_replace("#[^0-9a-z]#i","",$searchq1);
    $output = "";
    
    $query= mysql_query("select * from tbUser where FirstName LIKE '%$searchq1%' OR LastName LIKE '%$searchq1%'")or die("Could not search");
    $count=  mysql_num_rows($query);
    if($count==0){
        $output='There was no Search results';
    }else {
       while($row =  mysql_fetch_array($query)){
           $fname=$row['FirstName'];
           $lname=$row['LastName'];
          // $id=$row['UserID'];
           $output .='<div>'.$fname.''.$lname.''.'</div>';
       }
    }
}
echo ($output);
?>