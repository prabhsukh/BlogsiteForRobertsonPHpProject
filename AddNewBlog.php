<?php

   include 'config.php';
    require_once 'layout2.php';
    echo start_page("Welcome!");
    echo start_body();
    echo use_navigation();
    session_start();
    
    
    if (!empty($_FILES)) {
        #Get the BlogID after you do an INSERT into tbBlog, using @@IDENTITY, or whatever that is for php
        $BlogID = 1;
        if (isset($BlogID)) {
            $server_file_folder = "C:\\xampp\\htdocs\\BlogsiteForRobertsonPHpProject\\Pic\\";
            $file_name = $_FILES['uploadedfile']['name'];

            $server_file_path = $server_file_folder.$file_name; 
            $file_from_client = $_FILES['uploadedfile']['tmp_name'];
            
            if(move_uploaded_file($file_from_client, $server_file_path)) {
                #DATABASE SAVE HERE
                $sql = "insert into tbBlogAttachment (BlogID, FileName, FilePath) values (".$BlogID.", '".$file_name."', 'Pic/".$file_name."')";
                
                mysql_query($sql);
                echo "\n\nThe file ".$file_name." has been uploaded";
            } else{
                echo "There was an error uploading the file, please try again!";
            }
        }
        else{
            echo "You can't be on this page without a BlogID first!";
        }
    }
    
?>

<form enctype="multipart/form-data" action="AddNewBlog.php" method="POST">
<!--    <input type="hidden" name="MAX_FILE_SIZE" value="100000" />-->
    Choose a file to upload: <input name="uploadedfile" id='uploadedfile' type="file" /><br />
    <input type="submit" value="Upload File" />
</form>

<?php
    echo after_content();
    echo use_footer();
    echo end_body();
    echo end_page();
    ?>