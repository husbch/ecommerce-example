<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "surya";

$connection = mysqli_connect($servername, $username, $password, $database);

include "DB.php";

$id = $_GET['id'];


if ($connection->connect_error){
	die("Unable Connect to database :".$connection->connect_error);
}



$sql = "DELETE FROM addresses WHERE address_id='$id'";

if (mysqli_query($connection, $sql)){
	echo "data Deleted Successfully<br><br>";
	header("Location:DataBase.php");	
	mysqli_close($connection);
} else {
	echo "unable to remove the Data :".$connection->error;
}
?>