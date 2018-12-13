<?php
	session_start();
	if(!isset($_SESSION['valid']))
	{
		header('Location: index.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Captcha validé</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="page valid">
		<header>
			<div class="logo">
				<h1>Bravo</h1>
				<h3>Vous êtes humain !</h3>
			</div>
			<div class="menu">
				<a href="destroy_session.php">Deconnexion</a>
			</div>
		</header>
	</div>
</body>
</html>
