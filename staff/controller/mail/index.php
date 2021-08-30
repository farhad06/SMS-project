<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript">
		function recaptcha_callback(){
			alert("Callback Working.");
			$('.btn').prop("disabled", false);
		}
	</script>
</head>
<body>
<form method="POST" action="mail.php"></form>
<table>
	<tr><td>Name</td>
		<td><input type="text" name="nm"></td></tr>
		<tr><td>Email</td>
		<td><input type="email" name="em"></td></tr>
		<td><div class="g-recaptcha" data-sitekey="6Lf13pAUAAAAAJb5Fr72ZGTCG6_g463f8WvJfKTL" data-callback="recaptcha_callback"></div></td>
		<td><input type="submit" disabled name="singup" class="btn"></td>	
</table>
</body>
</html>