<?php
include("config.php");

    if (isset($_FILES['FilePath']) && $_FILES['FilePath']['size'] > 0) { 
        
  $tmpName  = $_FILES['FilePath']['FileName'];  
  $fp = fopen($tmpName, 'r');
  $data = fread($fp, filesize($tmpName));
  $data = addslashes($data);
  fclose($fp);
  $query =  "insert into tbBlogAttachment (BlogID,FileName,FilePath)
                            values('$data')";
 // $query .= "(emp_img) VALUES ('$data')";
  $results = mysql_query($query, $link) or die(mysql_error());
  print "Success";
  }
  else {
  print "Error";
  }
  ?>