<?php
mysql_connect("localhost","root","")or die("could not connect");
mysql_select_db("dbGroupProject")or die("could not find db");
//$output='';

if(isset($_POST['searchVal']))  {
    $searchq1 =$_POST['searchVal'];
    $searchq1= preg_replace("#[^0-9a-z]#i","",$searchq1);
    $output = "";
    
    $query= mysql_query("select * from tbUser where ProfileImageUrl LIKE '%$searchq1%' OR FirstName LIKE '%$searchq1%' OR LastName LIKE '%$searchq1%'")or die("Could not search");
    $count=  mysql_num_rows($query);
    if($count==0){
        $output='<h2>Search Results is not Found</h2>';
    }else {
       while($row =  mysql_fetch_array($query)){
           $Userid=$row['UserID'];
           $fname=$row['FirstName'];
           $lname=$row['LastName'];
           $profileimageurl = $row['ProfileImageUrl'];
          // $id=$row['UserID'];
           $output .='<a href="Profile.php?userid='.$Userid.'"><div><img width=100px height=100px src="'.$profileimageurl.'" /><br>'.$fname.' '.$lname.''.'<br><br></div></a>';
       }
    }
}
echo ($output);
?>