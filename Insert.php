<html>
	<head>
		<title>Register</title>
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
		.btn {
			width: 130px;
			height: 50px;
		}
		</style>
	</head>
	<body>
		<form action="Insert_Script.php" method="post">
			<table>
				<tr>
					<td><p>User ID</p><input type="text" name="userid" class="textbox"></td>
					<td><p>city</p><input type="text" name="city" class="textbox"></td>
				</tr>
				<tr>
					<td><p>Address Line 1</p><input type="text" name="addline1" class="textbox"></td>
					<td><p>Address Line 2</p><input type="text" name="addline2" class="textbox"></td>
				</tr>
				<tr>
					<td><p>Address Line 3</p><input type="text" name="addline3" class="textbox"></td>
				</tr>
				<tr>
					<td><p>State Province</p><input type="text" name="province" class="textbox"></td>
					<td><p>Zip</p><input type="text" name="zip" class="textbox"></td>
				</tr>
				<tr>
					<td><button type="submit" name="signin" class="btn">Insert</button><br>
					</td>
				</tr>
				<tr>
				</tr>
			</table>
		</form>
	</body>
</html>