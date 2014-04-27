<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<script type="text/javascript" language="Javascript">								
		function OnButton1()
			{
				 document.form1.action = "registration.php"
				 document.form1.target = "_self";    
				 document.form1.submit();             
			     return true;
			}		    							 				   										
		function OnButton2()
			{
				  document.form1.action = "checklogin.php"
				  document.form1.target = "_self";    
				  document.form1.submit();            				  
				  return true;
			}					    			 					  										
	</script>
	<noscript>You need Javascript enabled for this to work</noscript>		
	<div style="color:red; font-size:large">
		<?php 
			if (isset($_GET["loginFailed"])){
				$reasons = array("password" => "Wrong Username or Password!", "blank" => "You have left one or more fields blank!"); 
				if ($_GET["loginFailed"]) echo $reasons[$_GET["reason"]]; 
			}
		?>
	</div>
	<table class="center" cellpadding="0" cellspacing="2">
		<tr>
			<form name="form1" method="post">
				<td>
					<table width="100%" border="1" cellpadding="0" cellspacing="3" bgcolor="#FFFFFF">
						<tr>
							<td colspan="3" class="header"><strong>Member Login</strong></td>
						</tr>
						<tr>
							<td><input class="stylelish" name="myusername" type="text" id="myusername" placeholder="Username"></td>
						</tr>
						<tr>
							<td><input class="stylelish" name="mypassword" type="password" id="mypassword" placeholder="Password"></td>
						</tr>
						<tr>
							<td colspan="3">
								<div class="footer">
									<input class="register" type="button" name="Register" value="Register" onclick="return OnButton1();"><input class="button" style="float:right" type="button" name="Login" value="Login" onclick="return OnButton2();">
								</div>
							</td>
						</tr>
					</table>
				</td>
			</form>
		</tr>
	</table>
</body>
</html> 