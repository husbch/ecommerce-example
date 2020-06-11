<?PHP
session_start();
if($_SESSION['logemail'] ==  null){
	header("Location:Login.php");
}
?>

<?php
array_push($_SESSION['cart'], $_GET['id']);
header("Location:cart.php");
/*
$conn = mysqli_connect("localhost", "root", "", "surya");
if ($conn->connect_error){
	die("unable connect to Database : ". $conn->connect_error); 
}
$sql = "";
$result=mysqli_query($conn, $sql)*/
?>