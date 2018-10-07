<?php
if (isset($_POST['login'], $_POST['passwd']) AND !empty($_POST['login']) AND !empty($_POST['passwd']))
{
	#convert $_POST into local variables
	$toDelete_login = $_POST['login'];
	$passwd = hash('whirlpool', $_POST['passwd']);
	$path = 'user_base/' . $toDelete_login . "." . "user";
	if (file_exists($path))
	{
		$data = file_get_contents($path);
		$info = unserialize($data);
		if ($info['account_passwd'] == $passwd)
		{
			echo "<div style=\"text-align: center;\"><span class=\"feedback\">Your Account has been deleted</span></div>\n";
			unlink($path);
		}
		else {
			echo "<div style=\"text-align: center;\"><span class=\"feedback\">Did you forget Your Password? You're fucked then</span></div>\n";
		}

	}
	else
	{
		echo "<div style=\"text-align: center;\"><span class=\"feedback\">User Account doesn't exsist, want to create an account?</span></div>\n";
	}
}
?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
 	<head>
 		<meta charset="utf-8">
 		<title>Delete account</title>
 	</head>
 	<body>
		<div class='delete_container'>
			<p>Login</p>
			<form method="post" action="delete_account.php">
				<lable>Username</lable>
				<br />
					<input type="text" name="login" value="" required placeholder="your name">
				<lable>Password</lable>
				<br />
					<input type="password" name="passwd" value="" required placeholder="your password">
				<button class="loginbtn" name="submit" type="submit" value="OK">Delete Your account</button>
			</form>
		</div>
 	</body>
 </html>
