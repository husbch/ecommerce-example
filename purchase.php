<?php
session_start();
if($_SESSION['logemail'] == null){ 
	header['Location:index.php'];
}
?>
<html>
<head>
<style>
table.tabdiv1{
background-color
padding:10;
border:2px solid #00FF00;	
background-color:#00FFFF;	
border-radius:2;
width:700;
margin:auto;
}
td.tabdiv2{
padding:5;
border:2px solid black;	
background-color:#ffffff;	
border-radius:10;
margin:auto;
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
</style>
</head>
<body>
	<div class='head'>
	<table align='center'>
		<tr>
			<td><a href='profile.php' class='header' >Profile</a></td>
			<td><?php echo $_SESSION['logname'] ."<br>".  $_SESSION['logfn'] ." ".  $_SESSION['logln'];?><br><a href='logout.php' style='text-decoration:none;'>Logout</a></td>
			<td><a href='product.php' class='header' >Shop</a></td>
			<!--<td><a href='http://localhost/Surya/Login_System/DataBase.php' class='header'>Addresses</a></td>-->
			<td><a href='cart.php'><img src='product/cart.png' class='heading'></a></td>
			<td><?php echo count($_SESSION['cart']);?></td>
		</tr>
	</table></div>
	<h1 align='center'>Thank you for Shoping</h1>
	<?php
	$_SESSION['purchaseprogress'] = 1;
	
	$_SESSION['purnote'] = $_POST["note"];
	$_SESSION['puraddress'] = $_POST["address"];
	$_SESSION['purcouriers'] = $_POST["couriers"];
	$_SESSION['purpayment'] = $_POST["payment"];
	$_SESSION['purphnum'] = $_POST["phnum"];

	$_SESSION['cart'];

	$conn = mysqli_connect("localhost", "husni", "admin", "husni_wordpress");
	echo 
	"<table align='center' class='tabdiv1'>".
	"<tr align='center'>". 
	"<td class='tabdiv2'>ID</td>".
	"<td class='tabdiv2'>Image</td>".
	"<td class='tabdiv2'>Product Name</td>".
	"<td class='tabdiv2'>Price</td>".
	"</tr>";

	for ($o = 0; $o < count($_SESSION['cart']); $o++){
	$z = $_SESSION['cart'][$o];
	$sql = "SELECT * FROM products WHERE product_id='$z'";
	$result = mysqli_query($conn, $sql);
	while ($row=mysqli_fetch_assoc($result)){
	$img = $row['product_img'];
	echo 
	"<tr align='center'>"."<div class='tabdiv2'>".
	"<td class='tabdiv2' width='50'>".$row['product_id'] ."</td>".
	"<td class='tabdiv2' width='80'>"."<img src='$img' width='50'>"."</td>".
	"<td class='tabdiv2'>".$row['product_name'] ."</td>".
	"<td class='tabdiv2' width='150'>".$row['product_price']."</td>".
	"</tr>";
	}	
	}
	echo 
	"<tr>".
	"<td class='tabdiv2' colspan='3' align='center'>Your product will arrive in 5 days</td>".
	"<td class='tabdiv2' rowspan='3' align='center'>". array_sum($_SESSION['totalprice']). "</td>".
	"</tr>".
	"<tr>".
	"<td colspan='2' class='tabdiv2'>".$_SESSION['purnote']."</td>".
	"<td class='tabdiv2'  rowspan='2'>". 
	$_SESSION['purcouriers']."<br>". 
	$_SESSION['logfn']." ". $_SESSION['logln']."<br>".
	$_SESSION['puraddress']."<br>". 
	"Payment Method : ". $_SESSION['purpayment']. "<br>".
	$_SESSION['purphnum']."<br>". 
	"Status : waiting";
	"</td>".
	"</tr>".
	"</table>"."</div>";


	?>
</body>
</html>
<?php
mysqli_close($conn);
?>