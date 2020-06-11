<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "surya";

$FN = $_POST["first_name"];
$LN = $_POST["last_name"];
$UN = $_POST["username"];
$email = $_POST["email"];
$pass = $_POST["pass"];
$cofmpass = $_POST["cofmpass"];

$connect = mysqli_connect($servername, $username, $password, $database);

if($connect->connect_error){
	die("Problem with the Database : ". $connect->connect_error);
}else{
	echo "connected successfully!!";
}
if ($pass != $cofmpass ){
$connect->close();
header("Location:Register.php");

} else {
	
$validpass = $pass;
$sql = "INSERT INTO users (first_name, last_name, username, email, pass) 
VALUES ('$FN', '$LN', '$UN', '$email', '$validpass')";
mysqli_query($connect, $sql);
$connect->close();
header("Location:index.php");
}

?>