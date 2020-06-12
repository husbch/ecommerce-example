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
<!--<td><a href='http://localhost/Surya/Login_System/DataBase.php' class='header'>Addresses</a></td-->
<td><a href='cart.php'><img src='product/cart.png' class='heading'></a></td>
<td><?php echo count($_SESSION['cart']);?></td>
</tr>
</table></div>
<?php
$id = $_GET['id'];

$conn = mysqli_connect("localhost","root","admin","root");
if ($conn->connect_error){
	die("unable Connect To database : ". $conn->connect_error);
}
$sql = "SELECT * FROM products WHERE product_id='$id'";
$result = mysqli_query($conn, $sql);
echo "<table>";
while ($row=mysqli_fetch_assoc($result)) {
$img = $row['product_img'];
echo 
"<tr>".
"<td rowspan='6'><img src='$img' width='300'></td>".
"</tr>".
"<tr>".
"<td>"."Product Name : ". $row["product_name"] ."</td>".
"</tr>".
"<tr>".
"<td>". $row["product_description"] ."</td>".
"</tr>".
"<tr>".
"<td>"."Stock : ". $row["product_stock"] ."</td>".
"</tr>".
"<tr>".
"<td>". "Price : ". $row["product_price"] ."</td>".
"</tr>".
"<tr>"; ?>
<td><a href='product.php'><button width='5'>Continue Shoping</button></a>
<a href='cart_script.php?id=<?=$row['product_id']?>'><button width='5'>Add to Cart</button></a></td>
</tr>
<?php
}
echo "</table>"
?>
</body>
</html>