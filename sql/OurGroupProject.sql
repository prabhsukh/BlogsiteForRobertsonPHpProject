    drop database dbGroupProject;
    create database dbGroupProject;
	use dbGroupProject;

CREATE TABLE tbAccessLevel (
    AccessLevelID int NOT NULL auto_increment,
	Name varchar(20) NOT NULL,
	Primary key (AccessLevelID)
);
ALTER TABLE tbAccessLevel  auto_increment=1;
INSERT INTO tbAccessLevel (Name) VALUES
	('Admin'),
	('User');

Create TABLE tbUser (
	UserID int NOT NULL auto_increment,
	FirstName varchar(20) NOT NULL,
	LastName varchar(20) NOT NULL,
    Gender varchar(20) NOT NULL,
	Email varchar(30) DEFAULT NULL,
	City varchar(20) DEFAULT NULL,
	PhoneNo varchar(20) DEFAULT NULL,
	UserName varchar(20) DEFAULT NULL,
	Password varchar(20) DEFAULT NULL,
    ProfileImageUrl VARCHAR(1000) DEFAULT 'Pic/No_pic2.jpg',
    AccessLevelID int default '2',
    FOREIGN KEY (AccessLevelID) REFERENCES tbAccessLevel(AccessLevelID),
	primary key (UserID));
ALTER TABLE tbUser auto_increment=1;
INSERT INTO tbUser (FirstName, LastName, Gender, Email, City, PhoneNo, UserName, Password,ProfileImageUrl,AccessLevelID) VALUES
	('Scott', 'Wachal', 'Male', 'scott34@gmail.com', 'Winnipeg', '204-345-7890', 'scott1', '12345','Pic/img.jpg',1),
	('Prabhjot', 'Kaur', 'Female', 'jot14@yahoo.com', 'Winnipeg', '209-342-7667', 'prabh1', '12345','Pic/img1.jpg',1),
	('Sam', 'Smith', 'Male', 'sam45@yahoo.com', 'Calgary', '432-658-8796','sam1', '12345','Pic/img2.jpg',2),
	('Gurneal', 'Singh', 'Male','G@ymail.com', 'Surrey', '604-657-0987', 'Gurneal1','12345','Pic/img3.jpg',2),
	('Cathy', 'shaw', 'Female', 'Cathy@hotmail.com', 'Vancouver', '604-982-4862','cathy1', '12345','Pic/img4.jpg',2),
	('Surinder ','kaur', 'Female', 'sur@facebook.com', 'Winnipeg', '209-890-3423', 'suri1', '12345','Pic/img5.jpg',2),
	('Ruhi', 'Rao', 'Female','Ruhi@yahoomail.com', 'Winnipeg', '204-342-2323','ruhi1', '12345','Pic/img6.jpg',2),
	('Mahi', 'Sharama', 'Female','mahi@facebook.net', 'Brandon', '342-980-0909','mahi1', '12345','Pic/img7.jpg',2),
	('Jayren','Bernasol', 'Female', 'jayren@ymail.com', 'Winnipeg','432-980-0909','jayren1','12345','Pic/img8.jpg',1),
	('Alex', 'Smith', 'Male','alex@yahoo.com', 'Brandon', '657-657-8111','alex1','12345','Pic/img9.jpg',2);


    Create TABLE tbBlogAccess(
    BlogAccessID int not null auto_increment,
    BlogAccessName varchar(20),
    primary key (BlogAccessID));
ALTER TABLE tbBlogAccess auto_increment=1;
INSERT INTO tbBlogAccess (BlogAccessName) VALUES 
	('Public'),
	('Private');
  
CREATE TABLE tbBlog (
	BlogID int NOT NULL auto_increment,
	UserID int,
    FOREIGN KEY (UserID) REFERENCES tbUser(UserID),
	BlogAccessID int,
    FOREIGN KEY (BlogAccessID) REFERENCES tbBlogAccess(BlogAccessID),
	BlogMessage text(1000) NOT NULL,
	primary key (BlogID)) ;
ALTER TABLE tbBlog auto_increment=1;
INSERT INTO tbBlog (UserID, BlogAccessID, BlogMessage) VALUES
	(2,1, 'Good Morning Hello PHP wORLd!!Pr
    ogramming IS FUN FUN FUN !!!!!'),
	(3,2, 'How are you ?\r\n Hope you feel good !!'),
 (5,1, '<br><img src="Pic//imgblog1.jpg"/><h2>If you can read this</h2><p>you need to go check out the newest updates for Microsoft Certification.\n\http://www.microsoft.com/learning/en-us/exam-98-361.aspx
	The link above is for a specific tech certificate and it is likely the most important one you all need to concentrate on.  Ideally you want to be able to do all the material covered in this exam by the time you finish this course.
	Note: We dont cover everything in it, so you do need to study external material to pass the exam, however, if you do good in the course, you wont have a problem filling in the missing pieces!
	Check out this study guide for the exam, how far can you get in answering all the questions?ftp://ftp.certiport.com/Marketing/MTA/docs/MTA_SSG_SoftDev_individual_without_crop.pdf</p>'),
	(6,1,'<h2>PHP Tutorial – Language Introduction</h2><p>Before we can start coding you first need to know some basics. 
    In this PHP language introduction tutorial you’ll find some descriptions of words you should know before you can start coding. Of course we will also look at where you can download PHP, MySQL and Apache.\n\
    The PHP programming language is a server-side HTML embedded scripting language.\n\
    Let‘s depict the sentence. The PHP language runs on the server-side. This means that the execution (read starting) of the scripts are done on the server where the web-site is hosted. HTML embedded means that you can use PHP statements (read a piece of PHP code) from within an HTML code. PHP files are returned to the browser as plain HTML.\n\
    <h3>What do you need?</>\n\Access to a web server (like Apache).\n\PHP and MySQL should be installed on the web server.
    <p>The easiest way is to install WAMP if you have a Windows machine and LAMP if you have a Linux machine. (WAMP = Windows Apache MySQL PHP and LAMP = Linux Apache MySQL PHP.) \n\
    These packages install everything you need. Read the install manual of these packages for instructions. After installation you should have access to http://localhost in your browser.'),
    (6,1,'<h2>PHP Basic Scripting Language Syntax</h2><p>The PHP statements or scripting blocks always start with <?php and end with ?>. You can start a PHP block anywhere in a .php file.\n\
     <p>A PHP file doesn’t have to include HTML tags, but in most cases it does. Of course you need a starting point so in most cases you’ll have a normal html file and from this file you’ll call some PHP statement or include another PHP file.
	Let’s start with a simple example (copy the following code, open your favorite text-editor (we like to use Notepad++), paste the code and save it as index.php):</p>\n\
    <img src="Pic//phpsyntax2.jpg"/>\n\<p>The file that you just have created should be placed in the document root of your web-server (the directory that is called WWW.) \n\
    After you’ve placed the file in the document root you can start a browser and type http://localhost (or whatever domain you use.) The text ‘Hello World, this is my first PHP program!’ should appear (without the ‘ ’ of course.) \n\
    You have just created your first PHP program.</p>\n\<h3>Using Comments in PHP</h3>\n\
    <p>Before we end this PHP scripting language syntax tutorial we want to explain comments in PHP, because you should always use comments in your programs. Even if you don’t give the programs you create to someone else, making use of comments is very important!\n\
    OK, that’s enough on the importance of comment-lines, let’s see with an example how to use comment-line in PHP:</p>
	<img src="Pic//php_syntax_img3.jpg"/>'),
    (7,1,'<h2>GitHub - Code Check in - Check Out system</h2>Useful Command lines for DOS:-<p>Want to use a project with multiple people contributing to the same code base?  Why not use an awesome open-source technology called: GitHub. Goto the site and set yourself up with a registered username and password!\n\
	Download the latest version of the product here: http://git-scm.c/om/downloads\n\
	When you install, be sure to pick the option with the warnings that says to install unix/linux commands onto your windows command prompt.\n\
	I suggest reading the setup information that GitHub provides at: https://help.github.com/articles/set-up-git\n\,<p/>
	<p>Once installed here are a few useful commands:</p><ul><li>git clone "insert address here" (getting the project)</li><li>git status (checking any changes between working directory and staging area)</li>
	<li>git add -A (adds all files to a staging area)</li><li>git add -u (Adds all modified files to the staging area)</li><li>git commit (commits the work from the staging area to the local repository)</li><li>git commit -m "add comment here" (Commits the changes to the local repository with a comment)</li>
	<li>git commit -am "add comments here" (Adds and commits to from the local repsoitory)</li><li>git push (local repsoitory pushes to the web)</li><li>git log (Shows all the list of commits)</li><li>git pull (gets the newest changes from the remote repository)</li></ul>'),
	(8,2,'<br><p>Just a random funny picture of php coding!haha</p><img src="Pic//phpfunnyimg.jpg"/>'),
    (9,1,'<p>I thought this would be useful to post this!</p><img src="Pic//list_of_all_phptags.jpg"/>'),
    (10,1, '<h2>PHP Switch Statement</h2><p>Just as the PHP language “if…else” statement, you can use the “switch” statement to alter the flow of a program. In other words; conditional statements are used to perform actions on different conditions.\n\ 
    The switch statement is used to select one of many blocks of code to be executed.\n\Let’s look at a switch example:</p><img src="Pic//switchcasephp.jpg"/><p>We say the variable $X is 3. In the switch statement the blocks of code start with case or default. The case statements end with break.\n\
    If the value of the case is equal with $X then execute the line between case and break.\n\ The break marks the end of one case statement and is used to prevent the code from running into the next case. If non-of the case statement matches with $X then the default code block is executed.</p>');
    
CREATE TABLE tbBlogAttachment (
	BlogAttachmentID int NOT NULL auto_increment,
	BlogID int,
    FOREIGN KEY (BlogID) REFERENCES tbBlog(BlogID),
	FileName varchar(40) NOT NULL,
	FilePath varchar(40) NOT NULL,
	primary key(BlogAttachmentID)
);
ALTER TABLE tbBlogAttachment auto_increment=1;
INSERT INTO tbBlogAttachment (BlogID, FileName, FilePath) VALUES
	(1, 'img1.jpg', 'Pic/img1.jpg'),
	(2, 'img2.jpg', 'Pic/img2.jpg');




    
    SELECT * FROM tbAccessLevel;
	SELECT * FROM tbUser;
	select * from tbBlog;
	select * from tbBlogAttachment;
    select * from tbBlogAccess;
   
    
     /* First Store Procedure */
DELIMITER $$
    CREATE PROCEDURE spGetUserById
	(IN user_Id INT)
	begin
	SELECT * FROM tbUser WHERE UserID = user_Id;
	end$$
DELIMITER ;

CALL spGetUserById(2);

      /* second* tbBlog */
       
 DELIMITER $$
	CREATE PROCEDURE spGetBlogById
    (IN blog_id INT)
	begin
	SELECT *
	FROM tbBlog
	WHERE BlogID = blog_id;
	end$$
DELIMITER ;

CALL spGetBlogById(2);

    /* Third* tbAccessLevel */
       
 DELIMITER $$
	CREATE PROCEDURE spGetAccessLevelById
    (IN accesslevel_ID INT)
	begin
	SELECT *
	FROM tbAccessLevel
	WHERE AccessLevelID = accesslevel_ID;
	end$$
DELIMITER ;

CALL spGetAccessLevelById(2);


    /*forth tbBlogAttachment */
       
 DELIMITER $$
	CREATE PROCEDURE spGetBlogAttachmentByID
    (IN blogattachment_id INT)
	begin
	SELECT *
	FROM tbBlogAttachment
	WHERE BlogAttachmentID = blogattachment_id;
	end$$
DELIMITER ;

CALL spGetBlogAttachmentByID(2);

       /* fivth  tbBlogAccess */
       
 DELIMITER $$
     CREATE PROCEDURE spGetBlogAccessByID
     (in blogaccess_id int)
     begin
       select * from tbBlogAccess
        where BlogAccessID= blogaccess_id;
	 end $$
  DELIMITER ;
  CALL spGetBlogAccessByID(2);
  
  /* insert StoreProcedures*/
           DELIMITER $$
	create procedure spAddUser
    (in firstname varchar(20),
	in lastname varchar(20),
     in gender varchar(20),
	in email varchar(30),
	in city varchar(20),
	in phoneno varchar(20),
	in username varchar(20),
	in password varchar(20),
     in profileimageUrl VARCHAR(1000),
     in accesslevelid int(2))
       BEGIN
	Insert into tbUser(FirstName,LastName,Gender,Email,City,PhoneNo,UserName,Password,ProfileImageUrl,AccessLevelID) 
    values (firstname,lastname,gender,email,city,phoneno,username,password,profileimageUrl,accesslevelid);
     end $$
     DELIMITER ;
	call spAddUser("Sonni","Monny","Male","Sonny@yahoo.com","calgary","309-345-4512","sonni1","12345",'Pic//img10.jpg',2);
       
       /* tbBlog insert procdure*/
       delimiter $$
       create procedure spAddBlog 
       (in  user_id int,
		in blog_access_id int,
        in blogmessage text(1000))
       begin   
            insert into tbBlog (UserID, BlogAccessID,BlogMessage)
					  values(user_id, blog_access_id,blogmessage);
                       end $$
                       delimiter ;
       call spAddBlog(4,3,"Nice to see you here");
       
       /* tbAttachement insert procedure*/
    
    DELIMITER $$
       create procedure spAddBlogAttachment
       (in blog_id int,
		in filename varchar(40),
		in filepath varchar(40))
        begin 
           insert into tbBlogAttachment (BlogID,FileName,FilePath)
                            values(blog_id,filename,filepath);
				end $$
                DELIMITER ;
		call spAddBlogAttachment(2,"img5.jpg","Pic//img5.jpg");
        
               /* Update Store procedures  */
		DELIMITER $$
	create procedure spUpdateUser
  ( in user_id int,
	in firstname varchar(20),
	in lastname varchar(20),
    in gender varchar(20),
	in email varchar(30),
	in city varchar(20),
	in phoneno varchar(20),
	in username varchar(20),
	in password varchar(20),
	in profileimageUrl VARCHAR(1000),
   in accesslevelid int(2))
    begin
          UPDATE tbUser set 
          UserID= user_id,
          FirstName= firstname,
          LastName= lastname,
          Gender = gender,
          Email= email,
          City= city,
          PhoneNo= phoneno,
          UserName= username,
		 ProfileImageUrl=profileimageUrl,
          AccessLevelID=accesslevelid,
          Password= password where UserID = user_id;
          end $$
          DELIMITER ;
    call spUpdateUser(10,"Joe","Smith","Male","joe@yahoo.com","Absford","209-342-8989","joe1","12345",'Pic//img10.jpg',2);
           
              /* tbBlog Update procdure*/
       delimiter $$
       create procedure spUpdateBlogByID 
       (in  user_id int,
        in blog_access_id int,
       in blogmessage text(1000))
       begin   
            update  tbBlog set UserID= user_id,
								BlogAccessID = blog_access_id,
                               BlogMessage=blogmessage
					     where UserID=user_id;
                       end $$
                       delimiter ;
       call spUpdateBlogByID(3,4,"Nice to see you here");
       
       /* tbAttachement update procedure*/
       DELIMITER $$
       create procedure spUpdateBlogAttachmentByID
       (in blogattachment_id int,
       in blog_id int,
		in filename varchar(40),
		in filepath varchar(40))
        begin 
              update tbBlogAttachment set  BlogAttachmentID=blogattachment_id,
											BlogID=blog_id,
                                            FileName=filename,
                                            FilePath=filepath
                                         where  BlogAttachmentID= blogattachment_id;
				end $$
                DELIMITER ;
		#call spUpdateBlogAttachmentByID(2,1,"nice one","img5.jpg");
        
         
                        /* Delete Store procedures  */
		DELIMITER $$
        create procedure spDeleteUserById
        ( in user_id int)
        begin
          Delete from tbUser  
          where UserID = user_id;
          end $$
          DELIMITER ;
   /* call spDeleteUserById(11);*/
   
                   /* tbAttachement delete store procedure*/
       DELIMITER $$
       create procedure spDeleteBlogAttachmentByID
       (in blogattachment_id int)
        begin 
            delete from tbBlogAttachment 
						where BlogAttachmentID= blog_id;
				end $$
                DELIMITER ;
	/*	call spDeleteBlogAttachmentByID(3); */
       
	     /* delete tbBlog procedure */
       
 DELIMITER $$
     CREATE PROCEDURE spDeleteBlogByID(in blog_id int)
     begin
       delete from tbBlog
        where BlogID= blog_id;
	 end $$
  DELIMITER ;
   # CALL spDeleteBlogByID(3);
	
    
 SELECT tbBlog.BlogMessage,tbBlogAttachment.BlogAttachmentID  from tbBlog JOIN tbBlogAttachment where tbBlog.BlogID = tbBlogAttachment.BlogID;   
    






