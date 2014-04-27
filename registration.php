<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div style="color:red; font-size:large">
		<?php 
			if (isset($_GET["status"])){
				$reasons = array("succeded" => "User successfully registered!","short" => "Password must be at least 8 characters long!","format" => "Invalid email format!", "problem" => "There is some problem in inserting record!", "password" => "Password mismatch!", "blank" => "You have left one or more fields blank!"); 
				if ($_GET["status"]) echo $reasons[$_GET["reason"]]; 
			}
		?>
	</div>
	<table class="center" cellpadding="0" cellspacing="2">
		<tr>
			<form name="registration" method="post" action="register.php">
				<td>
					<table width="300px" border="1" cellpadding="0" cellspacing="3" bgcolor="#FFFFFF">
						<tr>
							<td colspan="3" class="header"><strong>Registration</strong></td>
						</tr>
						<tr>
							<td><input type="text" class="stylelish" name="username" value="" placeholder="Username"></td>
						</tr>
						<tr>
							<td><input type="text" class="stylelish" name="email" value="" placeholder="E-mail"></td>
						</tr>
						<tr>
							<td><input type="password" class="stylelish" name="password" value="" placeholder="Password"></td>
						</tr>
						<tr>
							<td><input type="password" class="stylelish" name="repassword" value="" placeholder="Repeat password"></td>
						</tr>
						<tr>
							<td style="text-align:center">
								<div class="footer"><input class="button" style="width:220px" type="submit" name="submit" value="Submit"></div>
							</td>
						</tr>
					</table>
				</td>
			</form>
		</tr>
	</table>
</body>
</html> 