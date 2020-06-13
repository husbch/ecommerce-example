<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "admin";
$database = "local";

$userid			= $_POST['userid']; 
$city 			= $_POST['city']; 
$addline1		= $_POST['addline1']; 
$addline2 		= $_POST['addline2']; 
$addline3 		= $_POST['addline3']; 
$province 		= $_POST['province'];
$zip 			= $_POST['zip'];


$addid = $_SESSION['addid'];

$connection = mysqli_connect($servername, $username, $password, $database);

if ($connection->connect_error){
	die("Unable Connect to mysql :".$connection->connect_error);
}else{
	echo"connected successfully<br><br>";
}
/*
$sqlselect = "SELECT * FROM addresses WHERE address_id='$addid'";

$result = mysqli_query($connection, $sqlselect);
while ($row = mysqli_fetch_assoc($result)){
if($userid = "") {
	$userid = $row["users_id"];
}	
if($addline1 = "") {
	$addline1 = $row["address_line_1"];
}	
if($addline2 = "") {
	$addline2 = $row["address_line_2"];
}	
if($addline3 = "") {
	$addline3 = $row["address_line_3"];
}	
if($city = "") {
	$city = $row["city"];
}	
if($province = "") {
	$province = $row["state_province"];
}	
if($zip = "") {
	$zip = $row["zip"];
}	
}
*/
session_unset();
session_destroy();

$sqlup = "UPDATE addresses SET 
users_id='$userid', 
address_line_1='$addline1', 
address_line_2='$addline2', 
address_line_3='$addline3', 
city='$city', 
state_province='$province', 
zip='$zip'
WHERE address_id='$addid'";

if (mysqli_query($connection, $sqlup)){
	echo "data updated Successfully<br><br>";
	mysqli_close($connection);
	header("Location:database.php");	
} else {
echo "Failed to update data :" .$connection->error;
mysqli_close($connection);
}

?>