/*drop database dbGroupProject;*/
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
    

CREATE TABLE tbUser (
	UserID int NOT NULL auto_increment,
	FirstName varchar(20) NOT NULL,
	LastName varchar(20) NOT NULL,
	Email varchar(30) DEFAULT NULL,
	City varchar(20) DEFAULT NULL,
	PhoneNo varchar(20) DEFAULT NULL,
	ProfilePic varchar(30) DEFAULT NULL,
	CoverPic varchar(30) DEFAULT NULL,
	UserName varchar(20) DEFAULT NULL,
	Password varchar(20) DEFAULT NULL,
	primary key (UserID));
ALTER TABLE tbUser auto_increment=1;
INSERT INTO tbUser (FirstName, LastName, Email, City, PhoneNo, ProfilePic, CoverPic, UserName, Password) VALUES
	('scott', 'wachal', 'scott34@gmail.com', 'winnipeg', '204-345-7890', 'img1', 'cover1', 'scott1', '12345'),
	('prabh', 'jot', 'jot14@rocketmail.com', 'winnipeg', '209-342-7667', 'img2', 'cover2', 'prabh1', '12345'),
	('Sam', 'Smith', 'sam45@yahoo.com', 'Calgary', '432-658-8796', 'img5', 'cover5', 'sam1', '12345'),
	('john', 'sara', 'j@ymail.com', 'Surrey', '604-657-0987', 'img6', 'cover6', 'john1', '12345'),
	('Cathy', 'shaw', 'Cathy@hotmail.com', 'vancouver', '604-982-4862', 'img5', 'cover6', 'cathy1', '12345'),
	('surinder ', 'kaur', 'sur@facebook.com', 'winnipeg', '209-890-3423', 'img6', 'cover6', 'suri1', '12345'),
	('Ruhi', 'Rao', 'Ruhi@yahoomail.com', 'winnipeg', '204-342-2323', 'img7', 'cover7', 'ruhi1', '12345'),
	('mahi', 'sharama', 'mahi@robertsoncollege.net', 'Brandon', '342-980-0909', 'img8', 'cover8', 'mahi1', '12345'),
	('rajwinder', 'sharama', 'mahi@robertsoncollege.net', 'calgary', '432-980-0909', 'img9', 'cover9', 'raj@ymail.com', '12345'),
	('alex', 'smith', 'alex@yahoo.com', 'Brandon', '657-657-8111', 'img10', 'cover10', 'alex1', '12345');

create TABLE tbBlogAccess(
    BlogAccessID int not null auto_increment,
    BlogAccessName varchar(20),
    primary key (BlogAccessID)
    );
ALTER TABLE tbBlogAccess auto_increment=1;
INSERT INTO tbBlogAccess (BlogAccessName) VALUES 
	('Public'),
	('Private'),
    ('Friends Only');
  

CREATE TABLE tbBlog (
	BlogID int NOT NULL auto_increment,
	UserID int,
    FOREIGN KEY (UserID) REFERENCES tbUser(UserID),
	BlogAccessID int,
    FOREIGN KEY (BlogAccessID) REFERENCES tbBlogAccess(BlogAccessID),
	BlogMessage text NOT NULL,
	primary key (BlogID)
) ;
ALTER TABLE tbBlog auto_increment=1;
INSERT INTO tbBlog (UserID, BlogAccessID, BlogMessage) VALUES
	(2,1, 'Good Morning !!!!'),
	(3,2, 'How are you ?\r\nHope you feel good !!');

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
	(1, 'AwesomeOne', 'Img11'),
	(2, 'AwesomeTwo', 'img12.jpg');

create TABLE tbResponse1
(
ResponseID int not null auto_increment,
ResponseName varchar(20),
primary key (ResponseID)
);
   ALTER TABLE tbResponse1 auto_increment=1;
   insert into tbResponse1 (ResponseName)
   values  
   ('Accept'),
   ('Ignore'),
   ('Request');

create TABLE tbMemberRequest
 (
	MemberRequestID int NOT NULL auto_increment,
	FromUserID int,
    FOREIGN KEY (FromUserID) REFERENCES tbUser(UserID),
	ToUserID int,
    FOREIGN KEY (ToUserID) REFERENCES tbUser(UserID),
	ResponseID int,
    Foreign key (ResponseID) references tbResponse1(ResponseID),
	primary key (MemberRequestID)
);
   ALTER TABLE tbMemberRequest auto_increment=1;
   INSERT INTO tbMemberRequest (FromUserID,ToUserID,ResponseID)
     VALUES
	(2,3,1),
	(3,1,2),
    (1,2,3);

	select * from tbUser;
	select * from tbBlog;
	select * from tbAccessLevel;
	select * from tbMemberRequest;
	select * from tbBlogAttachment;
    select * from tbBlogAccess;
    select * from tbResponse1;
    
     /* First Store Procedure */
DELIMITER $$
CREATE PROCEDURE spGetUserById(IN user_Id INT)
begin
SELECT *
FROM tbUser
WHERE UserID = user_Id;
end$$
DELIMITER ;

CALL spGetUserById(2);

      /* second* tbBlog */
       
 DELIMITER $$
	CREATE PROCEDURE spGetBlogById(IN blog_id INT)
	begin
	SELECT *
	FROM tbBlog
	WHERE BlogID = blog_id;
	end$$
DELIMITER ;

CALL spGetBlogById(2);

    /* Third* tbAccessLevel */
       
 DELIMITER $$
	CREATE PROCEDURE spGetAccessLevelById(IN accesslevel_ID INT)
	begin
	SELECT *
	FROM tbAccessLevel
	WHERE AccessLevelID = accesslevel_ID;
	end$$
DELIMITER ;

CALL spGetAccessLevelById(2);

  /* forth* tbMemberRequest */
       
 DELIMITER $$
	CREATE PROCEDURE spGetMemberRequestById(IN memberrequest_id INT)
	begin
	SELECT *
	FROM tbMemberRequest
	WHERE MemberRequestID = memberrequest_id;
	end$$
DELIMITER ;

CALL spGetMemberRequestById(2);

    /*fifth tbBlogAttachment */
       
 DELIMITER $$
	CREATE PROCEDURE spGetBlogAttachmentByID(IN blogattachment_id INT)
	begin
	SELECT *
	FROM tbBlogAttachment
	WHERE BlogAttachmentID = blogattachment_id;
	end$$
DELIMITER ;

CALL spGetBlogAttachmentByID(2);

       /* sixth  tbBlogAccess */
       
 DELIMITER $$
     CREATE PROCEDURE spGetBlogAccessByID(in blogaccess_id int)
     begin
       select * from tbBlogAccess
        where BlogAccessID= blogaccess_id;
	  end $$
  DELIMITER ;
    CALL spGetBlogAccessByID(2);
  
  /* seventh tbResponse1 */
  
   DELIMITER $$
     CREATE PROCEDURE spGetResponse1ByID(in response_id int)
     begin
       select * from tbResponse1
        where ResponseID= response_id;
 end $$
  DELIMITER ;
  CALL spGetResponse1ByID(2);
  
           /* insert StoreProcedures*/
           DELIMITER $$
	create procedure spAddUser(in firstname varchar(20),
	 in lastname varchar(20),
	in email varchar(30),
	in city varchar(20),
	in phoneno varchar(20),
	in profilepic varchar(30),
	in coverpic varchar(30),
	in username varchar(20),
	in password varchar(20))
       BEGIN
	Insert into tbUser(FirstName,LastName,Email,City,PhoneNo,ProfilePic,CoverPic,UserName,Password) 
    values (firstname,lastname,email,city,phoneno,profilepic,coverpic,username,password);
     end $$
     DELIMITER ;
	call spAddUser("sonni","monny","sonny@yahoo.com","calgary","309-345-4512","img3.jpg","cover4.jpg","sonni1","12345");
       
       /* tbBlog insert procdure*/
       delimiter $$
       create procedure spAddBlog (in  user_id int,
       in blogmessage text)
       begin   
            insert into tbBlog (UserID,BlogMessage)
					   values(user_id,blogmessage);
                       end $$
                       delimiter ;
       call spAddBlog(4,"Nice to see you here");
       
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
		call spAddBlogAttachment(2,"Unique programming","img5.jpg");
        
               /* Update Store procedures  */
		DELIMITER $$
        create procedure spUpdateUser
        ( in user_id int,
	in firstname varchar(20),
	in lastname varchar(20),
	in email varchar(30),
	in city varchar(20),
	in phoneno varchar(20),
	in profilepic varchar(30),
	in coverpic varchar(30),
	in username varchar(20),
	in password varchar(20))
    begin
          UPDATE tbUser set 
          UserID= user_id,
          FirstName= firstname,
          LastName= lastname,
          Email= email,
          City= city,
          PhoneNo= phoneno,
          ProfilePic= profilepic,
          CoverPic= coverpic,
          UserName= username,
          Password= password where UserID = user_id;
          end $$
          DELIMITER ;
    call spUpdateUser(10,"joe","smith","joe#yahoo.com","Absford","209-342-8989","csd","dsd","joe1","12345");
           
              /* tbBlog Update procdure*/
       delimiter $$
       create procedure spUpdateBlogByID (in  user_id int,
       in blogmessage text)
       begin   
            update  tbBlog set UserID= user_id,
                               BlogMessage=blagmessage
					      where UserID=user_id;
                       end $$
                       delimiter ;
       call spUpdateBlogByID(3,"Nice to see you here");
       
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
		call spUpdateBlogAttachmentByID(2,1,"nice one","img5.jpg");
        
         
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
    CALL spDeleteBlogByID(3);
       