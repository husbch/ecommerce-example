<?php
session_start();
if ($_SESSION['logemail'] == null){
	header("Location:index.php");
}
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
textarea {
	background-color:#fbfbbfb;
	resize:none;
}
.modal {
    display: none;
    position: fixed; 
    z-index: 9;
    padding-top: 40px;
    left: 0;
    top: 0;
    width: 100%; 
    height: 100%; 
    overflow: auto; 
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0,0.2); 
}


.modal-content {
    background-color: #fafafa;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 50%;
    border-radius:20px;
}

.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: bold;
    cursor: pointer;
}

.listing {
	width:80%;
	padding:5;
	margin:auto;
	border-radius:20;
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
.button {
	background-color:#FF0011;
	font-size:30px;
	padding:20;
	border-radius:10px;
	width:100%;
	height:auto;
	align:center;
}
input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    margin: 0; 
}
</style>
</head>
<body>
<table align='center'>
<tr>
<td><a href='Profile.php' class='header' >Profile</a></td>
<td><?php echo $_SESSION['logname'] ."<br>".  $_SESSION['logfn'] ." ".  $_SESSION['logln'];?><br><a href='Logout.php' style='text-decoration:none;'>Logout</a></td>
<td><a href='product.php' class='header' >Shop</a></td>
<td><a href='DataBase.php' class='header'>Addresses</a></td>
<td><a href='cart.php'><img src='product/cart.png' class='heading'></a></td>
<td><?php echo count($_SESSION['cart']);?></td>
</tr>
</table>
<?php
$conn = mysqli_connect("localhost", "root", "", "surya");
if($conn->connect_error){
	die("Unable connect to Database". $conn->connect_error);
}
$counter = 1;
$_SESSION['totalprice'] = array();
$_SESSION['products'] = array();


//code executed
for ($x=0; $x < count($_SESSION['cart']); $x++){
$a = $_SESSION['cart'][$x];

$sql = "SELECT * FROM products WHERE product_id='$a'";
$result = mysqli_query($conn, $sql);


if(mysqli_num_rows($result)>0) {
echo "<div class='listing'>"."<table class='listing'>";
while ($row=mysqli_fetch_assoc($result)) {
if ($counter % 2 == 0) {
	echo "<tr align='center' style='background-color:#EEEEEE;'>";
} else {
	echo "<tr align='center'>";
}
array_push($_SESSION['products'], $row['product_name']);

array_push($_SESSION['totalprice'], $row['product_price']);

$img = $row['product_img'];
echo
	"<td width='40'>". $row['product_id'] ."</td>".
	"<td width='100'><img src='$img' width='50'/></td>".
	"<td width='300'>". $row['product_name'] ."</td>".
	"<td width='40'>". $row['product_stock'] ."</td>".
	"<td width='80'>". $row['product_price'] ."</td>";
	?><td width='auto'><a href="product_description.php?id=<?=$row['product_id']?>"><button>View Description</button></td>
	<td width='auto'><a href="remove_product.php?id=<?=$row['product_id']?>"><button>Remove</button></td><?php
echo "</tr>";
$_SESSION['totalprice'][$counter - 1];
$counter++;
	
}
}
}

if (count($_SESSION['cart']) != 0){
$totalprices=array_sum($_SESSION['totalprice']);

echo 
"<tr>".
"</table>"."</div>";	

echo "<table align='center'>".
"<tr >".
"<td >"."<div align='center'>Total Price : </td>".
"<td>"."<div align='left'>". $totalprices."</td>".
"</tr>".
"<tr>";
?>
<td><button id="myBtn">Purchase</button></div></td>
<?php 
echo "</tr>" . "</table>"."<br><br>";
}

?>
<Form action='purchase.php' method='post'>
<div id="myModal" class="modal">


  <div class="modal-content">
    <span class="close">&times;</span>
   <P>Buy</P>
		<hr color='#000'>
		<table width='100%'> 
			<tr>
 				<td width='40%'><?php foreach($_SESSION['products'] as $products) { echo $products."<br>"; }?><br>Total Price :</td>
				<td width='15%'><?php foreach($_SESSION['totalprice'] as $prices) { echo $prices ."<br>"; } echo "<br>";?> <?php echo $totalprices ;?></td>
				<td width='30%'>Note for Seller<br><textarea noresize name='note' style='width:290; height:100' >Note For Seller</textarea></td>
			</tr>
		</table>
		<hr color='#000'>
		<p>Full Address destination</p>
		<textarea noresize name='address' style='width:400; height:100'>Jl Kp duri semanan</textarea><br>
		<p>Phone Number</p>
		<input type='number' name='phnum' maxlength='15' style='width:120; height:20' />
		<hr color='#000'>
		<table width='50%'>
			<tr>
				<td>Courier Method<br>	
						<select name="couriers">
							<option>-</option>
							<option>JNE</option>
							<option>Grab</option>
							<option>Go-Jek</option>
							<option>Wahana</option>
						</select>
				</td>
				<td>Payment Method<br>
						<select name='payment'>
							<option>-</option>
							<option>BNI</option>
							<option>Mandiri</option>
							<option>BCA</option>
							<option>Alfamart</option>
							<option>Indomaret</option>
					</select>
				</form>
				</td>
			</tr>
		</table>
		<br>
		<input type='submit' class='button' value='Purchase' />
		</font>
  </div>
</div>

<script>
var modal = document.getElementById('myModal');
var btn = document.getElementById("myBtn");
var span = document.getElementsByClassName("close")[0];

btn.onclick = function() {
    modal.style.display = "block";
}
span.onclick = function() {
    modal.style.display = "none";
}
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
</body>
</html>