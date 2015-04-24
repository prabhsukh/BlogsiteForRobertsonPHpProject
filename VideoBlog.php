<?php    
        include 'config.php';
        require_once 'layout2.php';
        echo start_page("Welcome!");
        echo start_body();
        echo use_navigation();
   
//mysql_connect("localhost", "root", "") or die(mysql_error());
//mysql_select_db("dbGroupProject") or die(mysql_error());
//$result = mysql_query("SELECT * FROM tbvideo");
while($row= mysql_fetch_assoc($result))
{
    $id=$row['VideoID'];
    $name=$row['Name'];
    $code=$row['Code'];
    echo "$name<br>";
    echo "<a href='VideoBlog.php?VideoID=$id'>$code</a>";
    echo "<br><br>";  
    if ($_SESSION["AccessLevelID"] == '1') {
        echo"<a href='DeleteVideo.php?VideoID=".$row['VideoID']."'><img src='pic/DeleteImg.jpg' width=40px /></a><br>";
    }
} 
        echo after_content();
	echo use_footer();
	echo end_body();
	echo end_page();
?>

