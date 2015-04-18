
<?php
 include 'config.php';
   session_start();
    require_once 'layout2.php';
    echo start_page("Welcome!");
    echo start_body();
    echo use_navigation();

     if (isset($_GET["BlogID"])&& isset($_Get["userid"])) {
         $BlogID = $_GET["BlogID"];
         $UserID=$_Get["userid"];
         
         
         
         
         // TODO: Check if the BLOGID is attached to the UserID in the session, you'll have to do another DB call for that!
         // if they are the same, they can stay on this page, otherwise, you need to redirect them away!
         
         // populate txtBlogMessage by assing the Blog Message to $BlogMessage here
         
         if (isset($_POST["submit"])) 
        {
            $BlogMessage=$_POST['txtBlogMessage'];
            $BlogAccessID='1';
            $UserID=$_Post['UserID'];
              
            $sql= " insert into tbBlog (UserID, BlogAccessID,BlogMessage)
					  values('$BlogMessage','$BlogAccessID','$UserID')";
        
             // Take the text that's editable for the title/body of the blog and UPDATE the Blog using the BLOGID above.
             // get the txtBlogMessage out of the POST and save to db.
        }
         
        
        // the rest of this code is mostly done and is for the file upload!
        ?>
      <form enctype="multipart/form-data" action="EditBlog.php" method="POST">
                
                <img width="100px" height="100px" src="'.$row['ProfileImageUrl'].'" /><br>
                    
                <!-- <input type="hidden" name="MAX_FILE_SIZE" value="100000" />-->
             
                <textarea name="txtBlogMessage" rows="4" cols="70" maxlength="170">
                    <?php echo $BlogMessage; ?> </textarea>
                <input name="uploadedfile" id='uploadedfile' type="file" />
                <input type="submit" value="Post" />
            </form>
        <?php
         
        if (!empty($_FILES)) 
        {
        // printf ("The last record : %d\n",mysql_insert_id());
        // 
        #Get the BlogID after you do an INSERT into tbBlog, using @@IDENTITY, or whatever that is for php
    
        
            $server_file_folder = "C:\\xampp\\htdocs\\BlogsiteForRobertsonPHpProject\\Pic\\";
            $file_name = $_FILES['uploadedfile']['name'];
            $server_file_path = $server_file_folder.$file_name; 
            $file_from_client = $_FILES['uploadedfile']['tmp_name'];
            
            if(move_uploaded_file($file_from_client, $server_file_path)) 
            {
                #DATABASE SAVE HERE
          $sql = "insert into tbBlogAttachment (BlogID, FileName, FilePath) values (".$BlogID.", '".$file_name."', 'Pic/".$file_name."')";
               
                mysql_query($sql);
                echo "\n\nThe file ".$file_name." has been uploaded";
            } 
            else{
                echo "There was an error uploading the file, please try again!";
            }
        }
        
        // This part can be used when just looking at an individual blog post (view only)
        $sql=("select 'BlogAttachmentID' from tbBlogAttachment WHERE BlogID = ".$BlogID);
        $res= mysql_query($sql);
        echo "<table>";
        while($row = mysql_fetch_array($res))
        {
            echo "<tr>";
            echo "<td"; echo $row['BlogID'];"</td>";
            echo "<td>"; ?> <img src="<?php echo $row['FilePath'];?>" height="170" width="180"><?php echo "</td>";
            echo "<td";echo $row['FileName'];"</td>";
            echo "</tr>";
        }
        echo "</table>";
       } 
    
//    else {
//            echo "You can't be on this page without a BlogID first!";
//    
//        }

        echo after_content();
	echo use_footer();
	echo end_body();
	echo end_page();
?>

