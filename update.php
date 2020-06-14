
<?php
session_start();

$servername = "localhost";	
$username = "husni";
$password = "admin";
$database = "husni_cenvius";

$conn = mysqli_connect($servername, $username, $password, $database);

if($conn->connect_error){
	die("unable connect to database : ". $connect->connect_error);
}

$addid = $_GET['id'];
$_SESSION["addid"] = "$addid";
$sql = "SELECT * FROM addresses WHERE address_id='$addid'";
$result = mysqli_query($conn, $sql);


while($row=mysqli_fetch_assoc($result)){

$userid		= $row["users_id"];
$addline1	= $row["address_line_1"];
$addline2 	= $row["address_line_2"];	
$addline3 	= $row["address_line_3"];
$city 		= $row["city"];
$province 	= $row["state_province"];
$zip 		= $row["zip"];	

}

?>

<html>
	<head>
		<title>Update</title>
		<style>
		table,tr,th {
			position: relative;
			background-color: #00FFFF;
			border-style: solid ;
			border-color: #000000;	
			margin: auto;
		}
		
		.textbox {
			width: 300px;
			padding: 15px;
			height: 30px;
			border: 2px solid #00FF00;
		}
		.ID {
			width: 100px;
			padding: 15px;
			height: 30px;
			border: 2px solid #00FF00;
		}
		.btn {
			width: 130px;
			height: 50px;
		}
		
		</style>
	</head>
	<body>
		<form action="update_script.php" method="post">
			<table>
				<tr>
					<td><p>ID</p><input type="text" name="addid" class="ID" maxlength="9" placeholder="<?php echo $addid; ?>" readonly style='background-color:#EEEEEE;'></td>
					<td><p>User ID</p><input type="text" name="userid" class="textbox"  placeholder="<?php echo $userid; ?>"></td>
				</tr>
					<td><p>City</p><input type="text" name="city" class="textbox"  placeholder="<?php echo $city; ?>" ></td>
					<td><p>Address Line 1</p><input type="text" name="addline1" class="textbox"  placeholder="<?php echo $addline1; ?>"></td>
				<tr>
				
					<td><p>Address Line 2</p><input type="text" name="addline2" class="textbox"  placeholder="<?php echo $addline2; ?>"></td>
					<td><p>Address Line 3</p><input type="text" name="addline3" class="textbox"  placeholder="<?php echo $addline3; ?>"></td>
				</tr>
				<tr>
					<td><p>State Province</p><input type="text" name="province" class="textbox"  placeholder="<?php echo $province; ?>"></td>
					<td><p>Zip</p><input type="text" name="zip" class="textbox"  placeholder="<?php echo $zip; ?>"></td>
				</tr>
				<tr>
					<td><button type="submit" class="btn">Update</button><br>
					</form>
					<td><a href="database.php">Cancel</a><br>
					</td>
				</tr>
				<tr>
				</tr>
			</table>
	</body>
</html>