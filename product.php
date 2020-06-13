<?php
session_start();
if ($_SESSION['logemail'] == null){
	header("Location:index.php");
}
?>
<html>
<head>
<style>
.product {
	padding:10;
	border-radius:10px;	
	width:auto;
}
img.heading {
	padding: 10;
	border-radius:20px;
	width:65px;
    background-color: #EEEEEE;
}
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
<body><div class='head'>
<table>
<tr>
<td><a href='profile.php' class='header' >Profile</a></td>
<td><?php echo $_SESSION['logname'] ."<br>".  $_SESSION['logfn'] ." ".  $_SESSION['logln'];?><br><a href='logout.php' style='text-decoration:none;'>Logout</a></td>
<td><a href='product.php' class='header' >Shop</a></td>
<!--<td><a href='http://localhost/Surya/Login_System/checkout.php' class='header'>Addresses</a></td>-->
<td><a href='cart.php'><img src='product/cart.png' class='heading'></a></td>
<td><?php echo count($_SESSION['cart']);?></td>
</tr>
</table></div>
<?php
$conn = mysqli_connect("localhost", "root", "admin", "local");
if($conn->connect_error){
	die("Unable connect to Database : ". $conn->connect_error);
}
$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);
echo "<table class='product' align='center'>" .
	"<tr class='product'  align='center'  style='background-color:#CCCCCC;'>".
	"<td class='product' >ID</td>".
	"<td class='product' >Image</td>".
	"<td class='product' >Name</td>".
	"<td class='product' >stock</td>".
	"<td class='product' >Price</td>".
	"</tr>";
$c = 1;
while ($row = mysqli_fetch_assoc($result)) {
	$img = $row['product_img'];
	if ($c % 2 == 0){
		echo "<tr class='product'  align='center' style='background:#EEEEEE;'>" ;}
	else {
		echo "<tr class='product'  align='center'>";}
	echo 
	"<td class='product' >". 				$pdid = $row['product_id']							."</td>".
	"<td class='product'  style='background-color:#FFFFFF;'>	<img src='$img' width='50' height='auto'>	  </td>".
	"<td class='product' >". 				$row["product_name"]						."</td>".
	"<td class='product' >". 				$row["product_stock"]						."</td>".
	"<td class='product' >". 				$row["product_price"]						."</td>";
	?>
	<td style='background-color:#FFFFFF;' align='left'> <a href="product_description.php?id=<?=$row["product_id"]?>"><button>View Description</button></a>
	<a href='cart_script.php?id=<?=$row['product_id']?>'><button>Add to Cart</button></a></td>
	<?php					
	echo "</tr>";
	$c++; 
}
echo "</table>";
mysqli_close($conn);
?>
</body>
</html>