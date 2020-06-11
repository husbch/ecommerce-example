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
		<form action="Register_Script.php" method="post">
			<table>
				<tr>
					<td><p>First Name</p><input type="text" name="first_name" class="textbox"></td>
					<td><p>Last Name</p><input type="text" name="last_name" class="textbox"></td>
				</tr>
				<tr>
					<td><p>User Name</p><input type="text" name="username" class="textbox"></td>
					<td><p>E-Mail :</p><input type="text" name="email" class="textbox"></td>
				</tr>
				<tr>
					<td><p>Password:</p><input type="password" name="pass" class="textbox"></td>
					<td><p>Confirm Password:</p><input type="password" name="cofmpass" class="textbox"></td>
				</tr>
				<tr>
					<td><button type="submit" name="signin" class="btn">Sign In</button><br>
					</td>
				</tr>
				<tr>
				</tr>
			</table>
		</form>
	</body>
</html>