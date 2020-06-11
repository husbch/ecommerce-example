<?php
session_start();
if ($_SESSION['logemail']== null){
	header("Location:index.php");
}
?>
<html>
<head>
<style>
a:link.header {
	border-radius:20px;
	padding:10;
	font-size:60;
    background-color: #EEEEEE;
    text-decoration: none;
}
img.heading {
	padding: 10;
	border-radius:20px;
	width:65px;
    background-color: #EEEEEE;
}
a:visited.header {
	font-size:60;
    background-color: #EEEEEE;
    text-decoration: none;
}
a:hover.header {
	font-size:60;
    background-color: #BBBBBB;
    text-decoration: none;
}
a:active.header {
	font-size:60;
    color: $00FF00;
    background-color: #AAAAAA;
    text-decoration: none;
}
table, tr, td.head {
	padding : 10;
	align-text: left;
	height: 100;
	margin:auto;
}
table, tr, td.database {
	padding : 10;
	align-text: left;
	height: auto;
	margin:auto;
}

</style>
</head>
<body><div class='head'>
<table class='head' >
<tr>
<td><a href='Profile.php' class='header' >Profile</a></td>
<td><?php echo $_SESSION['logname'] ."<br>".  $_SESSION['logfn'] ." ".  $_SESSION['logln'];?><br><a href='Logout.php' style='text-decoration:none;'>Logout</a></td>
<td><a href='product.php' class='header' >Shop</a></td>
<td><a href='DataBase.php' class='header'>Addresses</a></td>
<td><a href='cart.php'><img src='product/cart.png' class='heading'></a></td>
<td><?php echo count($_SESSION['cart']);?></td>
</tr>
</table></div>
<?php
$servername	= "localhost";
$username	= "root";
$password	= "";
$database	= "surya";

$conn = mysqli_connect($servername, $username, $password, $database);

if ($conn->connect_error){
	die("error conected to database :". $conn->connect_error);
}

$sql = "SELECT * FROM addresses";
$result = mysqli_query($conn, $sql);
echo 	"<div class='database'>"."<table width='1300'>".
		"<tr style='background-color:#BBBBBB;' align='center' >".
		"<td style='padding:15;'>ID</td>". 
		"<td>User ID</td>". 
		"<td>Address Line 1</td>". 
		"<td>Address Line 2</td>". 
		"<td>Address Line 3</td>". 
		"<td>City</td>". 
		"<td>State Province</td>". 
		"<td>Zip</td>".
		"<td  style='background-color:#FFFFFF;'><a href='Insert.php'><button style='color:#00DD00;'>Insert</button></a></td>".
		"<td  style='background-color:#FFFFFF;'><a href='Auto_Increment.php'><button style='color:#00FFFF;'>Set ID Number</button></a></td>".
		"</tr>";

$counter = 1;

while($row= mysqli_fetch_assoc($result)) {
	if ($counter % 2 == 0) {
echo	"<tr align='center' style='background-color:#EEEEEE;' >";
} else {
echo	"<tr align='center'>";
}	
echo 	
		"<td >". $row["address_id"]		. "</td>" . 
		"<td >". $row["users_id"]			. "</td>" . 
		"<td >". $row["address_line_1"]	. "</td>" .
		"<td >". $row["address_line_2"]	. "</td>" .
		"<td >". $row["address_line_3"]	. "</td>" .
		"<td >". $row["city"]				. "</td>" .
		"<td >". $row["state_province"]	. "</td>" .
		"<td >". $row["zip"]				. "</td>"
		?>
		<th style='background-color:#FFFFFF;' style='padding:15px;'> <a href="Update.php?id=<?=$row["address_id"]?>"  ><button style="color:#00AAFF;"> Update </button></a></th>
		<th style='background-color:#FFFFFF;' style='padding:15px;'> <a href="Delete_script.php?id=<?=$row["address_id"]?>"  ><button style="color:#FF0000;"> Delete </button></a></th>
		<?php
		"</tr>";
		$counter++;
}
echo "</table>" . "</div>";
mysqli_close($conn);
?>
<br>
<br>
<br>
<br>
</body>
</html>