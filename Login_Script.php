<?php
session_start();
include "Register.php";

$servername = "localhost";
$username = "root";
$password = "";
$database = "surya";

$_SESSION['cart'] = array();
$_SESSION['log'] = array();
$_SESSION['purchaseprogress'] = 0;

$loginemail = $_POST["email"];
$loginpass = $_POST["pass"];

$connect = mysqli_connect($servername, $username, $password, $database); 

if($connect->connect_error){
	die("Could not Connect to the database" . $connect->connect_error);
}

$sql = "SELECT * FROM users";
$a = 0;
if ($result = mysqli_query($connect,$sql)){;

while($row = mysqli_fetch_array($result)){
for($x=0;$x <= count($row["user_email"]);$x++)
	if ($row["email"] == $loginemail && $row["pass"] == $loginpass){
		$a = 1;
		$logname = $row['username'];
		$logfn = $row['first_name'];
		$logln = $row['last_name'];
		$logid = $row['id'];
		
		
		echo "matched!!";
	}	
}
}
if ($a == 1){
	$_SESSION['logemail']= $loginemail;
	$_SESSION['logname']= $logname;
	$_SESSION['logfn']= $logfn;
	$_SESSION['logln']= $logln;
	$_SESSION['logid']= $logid;
	header("Location:Profile.php");	
}else{
	array_push($_SESSION['log'], "Wrong Email or Password");
	header("Location:index.php");
}
$connect->close();
?>