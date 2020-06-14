<?php
$servername = "localhost";
$username = "husni";
$password = "admin";
$database = "husni_cenvius";

$connection = mysqli_connect($servername, $username, $password, $database);

include "database.php";

$id = $_GET['id'];


if ($connection->connect_error){
	die("Unable Connect to database :".$connection->connect_error);
}



$sql = "DELETE FROM addresses WHERE address_id='$id'";

if (mysqli_query($connection, $sql)){
	echo "data Deleted Successfully<br><br>";
	header("Location:database.php");	
	mysqli_close($connection);
} else {
	echo "unable to remove the Data :".$connection->error;
}
?>