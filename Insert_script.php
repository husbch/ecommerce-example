<?php
$servername = "localhost";
$username = "root";
$password = "admin";
$database = "local";

$userid = $_POST['userid']; 
$city = $_POST['city']; 
$addline1 = $_POST['addline1']; 
$addline2 = $_POST['addline2']; 
$addline3 = $_POST['addline3']; 
$province = $_POST['province'];
$zip = $_POST['zip'];


$connection = mysqli_connect($servername, $username, $password, $database);

if($connection->connect_error){
	die("Unable connect to Database : ". $connect->error);
} else {
	echo "connected successfully!<br><br>";
}

$sql = "INSERT INTO addresses (users_id, address_line_1, address_line_2, address_line_3, city, state_province, zip) 
VALUES ('$userid', '$addline1', '$addline2', '$addline3', '$city', '$province', '$zip')";

if (mysqli_query($connection, $sql)){
	echo "data Inserted Successfully!";
	header("Location:database.php");	
	mysqli_close($connection);
} else {
	echo "error : ". $sql . "<br>" . mysqli_error($connection);
}
?> 