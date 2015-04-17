 <?php
	require_once 'LoginRegisterLayout.php';
	echo start_page("Welcome!");
	echo start_body();
	echo use_navigation();
        ?>
 <html>
    <head>
        <title>      
        </title>
    </head>
    <body>
        <h2><a href="">Sign Up here </a></h2>
        <?php       
                include ('config.php');
    if(isset($_POST['FirstName'])&& isset($_POST['LastName']) && isset($_POST['Gender']) && isset($_POST['Email'])&&
                    isset($_POST['City'])&& isset($_POST['PhoneNo'])&&
                            isset($_POST['UserName'])&& isset($_POST['Password'])
          
            ){    
              $firstname=$_POST['FirstName'];
              $lastname=$_POST['LastName'];
              $gender=$_POST['Gender'];
              $email=$_POST['Email'];
               $city=$_POST['City'];
               $phoneno=$_POST['PhoneNo'];
              $username=$_POST['UserName'];
              $password=$_POST['Password'];
          
              
              $sql="Insert into tbUser(FirstName,LastName,Gender,Email,City,PhoneNo,UserName,Password)         
    values ('$firstname','$lastname','$gender','$email','$city','$phoneno','$username','$password')";
              
              $result= mysql_query($sql);
              if($result)
              {
                  $msg="user created successfully";
              }
                      
            }
                 ?>   
   
        <form action="registerpage.php" method="post">
            <input type="text" name="FirstName" id="FirstName" placeholder="First Name" required="FirstName">
            <br><br>
            <input type="text" name="LastName" id="LastName" placeholder="Last Name" required="LastName">
            <br><br>
            <input type="text" name="Gender" id="Gender" placeholder="Gender" required="Gender">
            <br><br>
            <input type="email" name="Email" id="Email" placeholder="Email" required="Email">
            <br><br>
            <input type="text" name="City" id="City" placeholder="City" required="City">
            <br><br>
            <input type="text" name="PhoneNo" id="PhoneNo" placeholder="Phone No" required="PhoneNo">
            <br><br>
            <input type="text" name="UserName" id="UserName" placeholder="User Name" required="UserName">
            <br><br>
            <input type="password" name="Password" id="Password" placeholder="Password" required="Password">
              <br><br>
             
            <input type="submit" name="submit" value="Register">
 
         </form>  
           </body>
       </html>
    <?php
           echo after_content();
	echo use_footer();
	echo end_body();
	echo end_page();
        ?>
     
 
 