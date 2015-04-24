<?php
   include 'config.php';
    require_once 'UploadLayOut.php';
    echo start_page("Welcome!");
    echo start_body();
    echo use_navigation();
    
    if (!empty($_FILES) && isset($_POST["submit"])) {
        
        $BlogMessage = $_POST['txtBlogMessage'];
        $BlogAccessID='1';
        $sql = "insert into tbBlog (UserID, BlogMessage, BlogAccessID) values (".$UserID.", '".$BlogMessage."',".$BlogAccessID.")";
        mysql_query($sql);
        
        $sql = "SELECT LAST_INSERT_ID()";
        $result = mysql_query($sql);
        while($row = mysql_fetch_array($result)){
            $BlogID = $row["LAST_INSERT_ID()"];
        }
        
        if (isset($BlogID)) {
            
            $server_file_folder = "C:\\xampp\\htdocs\\BlogsiteForRobertsonPHpProject\\Pic\\";
            $file_name = $_FILES['uploadedfile']['name'];
            $server_file_path = $server_file_folder.$file_name; 
            $file_from_client = $_FILES['uploadedfile']['tmp_name'];
                      
            
            if(move_uploaded_file($file_from_client, $server_file_path)) 
            {
               
          $sql = "insert into tbBlogAttachment (BlogID, FileName, FilePath) values (".$BlogID.", '".$file_name."', 'Pic/".$file_name."')";
               
                mysql_query($sql);
                echo "\n\nThe file ".$file_name." has been uploaded";
              
               header("Location:BlogList.php ");
               
            } 
//            else{
//                echo "There was an error uploading the file, please try again!";
//            }
        }
//       else{
//            echo "You can't be on this page without a BlogID first!";
//        }
    }   
?>

<form  enctype="multipart/form-data" action="AddNewBlog.php" method="POST">
<!--    <input type="hidden" name="MAX_FILE_SIZE" value="100000" />-->
    <textarea name="txtBlogMessage" rows="4" cols="70" maxlength="170" style="border:solid 7px #FFEA6F;" placeholder="Type Here ..."></textarea>
    Choose a file to upload: <input name="uploadedfile" id="uploadedfile" type="file" /><br />
    <input type="submit" name="submit" value="Post" />
</form>

<?php
    echo after_content();
    echo use_footer();
    echo end_body();
    echo end_page();
    ?>