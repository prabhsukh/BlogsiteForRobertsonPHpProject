<?php
 
$username = "root"; //mysql username
$password = ""; //mysql password
$hostname = "localhost"; //hostname
$databasename = 'test'; //databasename

//get pic id from ajax request
if(isset($_POST["pic"]) && is_numeric($_POST["pic"]))
{
	$current_picture = filter_var($_POST["pic"], FILTER_SANITIZE_NUMBER_INT);
}else{
	$current_picture=1;
}

//Connect to Database
$mysqli = new mysqli($hostname, $username, $password, $databasename);

if ($mysqli->connect_error){   
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}

//get next picture id
$result = $mysqli->query("SELECT id FROM pictures WHERE id > $current_picture ORDER BY id ASC LIMIT 1")->fetch_object();
if($result){
	$next_id = $result->id;
}

//get previous picture id
$result = $mysqli->query("SELECT id FROM pictures WHERE id < $current_picture ORDER BY id DESC LIMIT 1")->fetch_object();
if($result){
	$prev_id = $result->id;
}

//get details of current from database
$result = $mysqli->query("SELECT PictureTitle, PictureName FROM pictures WHERE id = $current_picture LIMIT 1")->fetch_object();

if($result){
	
	//construct next/previous button
	$prev_button = (isset($prev_id) && $prev_id>0)?'<a href="#" data-id="'.$prev_id.'" class="get_pic"><img src="prev.png" border="0" /></a>':'';
	$next_button = (isset($next_id) && $next_id>0)?'<a href="#" data-id="'.$next_id.'" class="get_pic"><img src="next.png" border="0" /></a>':'';
	
	//output html
	echo '<table width="500" border="0" cellpadding="5" cellspacing="0">';
	echo '<tr>';
	echo '<td><table width="100%" border="0" cellpadding="5" cellspacing="0">';
	echo '<tr>';
	echo '<td width="10%">'.$prev_button.'</td>';
	echo '<td width="80%" align="center"><h3>'.$result->PictureTitle.'</h3></td>';
	echo '<td width="10%">'.$next_button.'</td>';
	echo '</tr>';
	echo '</table></td>';
	echo '</tr>';
	echo '<tr>';
	echo '<td align="center"><img src="pictures/'.$result->PictureName.'" /></td>';
	echo '</tr>';
	echo '</table>';
}  
