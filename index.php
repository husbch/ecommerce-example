<?php
session_start();
?>
<html>
	<head>
		<title>Login System</title>
		<style>
		table, tr, td {
			background-color: #00FFFF;";
		}
		
		.textbox {
			width: 300px;
			padding: 15px;
			height: 10px;
			border: 2px solid #00FF00;
		}
		.btn {
			width: 150px;
			height: 40px;
			background:#11FF11;
			border-color:#00FF00;
		}
		</style>
	</head>
	<body>
	
		<form action="Login_Script.php" method="post">
			<table align="right" >
				<tr >
					<td width="100%" rowspan="2"><img src="product/sql.png" width="350px" height="140"/></td>
					<td style= width="100%" rowspan="2"><img src="product/php.png" width="350px" height="140"/></td>
					<td ><font size="5px">Email :</font><br><input type="text" name="email"maxlength="30" class="textbox"></td>	
					<td><font size="5px">Password:</font><br><input type="password" name="pass" maxlength="30" class="textbox"></td>
				</tr>
				<tr>
					<td width='1'><button type="submit" name="register" class="btn">Login</button>
					<p><?php?></p></td>
					<td><a href="Register.php">Not a member yet ?</a></td>
				</tr>
			</table>
		</form>
	</body>
</html>