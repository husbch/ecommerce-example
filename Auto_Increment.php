<?php
session_start();
if ($_SESSION['logemail'] == null){
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
	width:auto;
	height: auto;
	margin:auto;
}
</style>
</head>
<body>
<div class='head'>
<table>
<tr>
<td><a href='Profile.php' class='header' >Profile</a></td>
<td><?php echo $_SESSION['logname'] ."<br>".  $_SESSION['logfn'] ." ".  $_SESSION['logln'];?><br><a href='Logout.php' style='text-decoration:none;'>Logout</a></td>
<td><a href='product.php' class='header' >Shop</a></td>
<td><a href='DataBase.php' class='header'>addresses</a></td>
<td><a href='cart.php' class='header' >Cart</a></td>
</tr>
</table></div>
<table align='center'>
<tr>
<td>
<form method='post'>
Set ID Number to <input type='text' name='id'>
<input type='submit' onclick='function numid()'>
</form>
</td>
</tr>
</table>
<?php
function numid(){
$id = $_POST['id'];
$conn = mysqli_connect("localhost", "root", "", "surya");
$sql = "ALTER TABLE addresses AUTO_INCREMENT='$id'";
if ($result = mysqli_query($conn, $sql)){
	header("Location:DataBase.php");
	echo "Id Setted Successfully!";
	
}
}
?>
</body>
</html>