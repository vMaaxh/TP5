<?php

	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Captcha</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="page">
		<?php echo "<img src='script_captchas.php' alt='captchas'/>"; ?>
		<form method="post">
			<div class="verification">
				<input type="text" name="captcha" id="captcha">
				<label for="captcha">Vérification</label>
			</div>
			<span class="submit-effect"><input type="submit" name="submit" class="submit"></span>
		</form>
		<?php
				if (isset($_POST['submit'])) 
				{
					if (!empty($_POST['captcha'])) {
						if (strtoupper(trim($_POST['captcha'])) != $_SESSION['code']) 
						{
							echo '<br><p class="red-error">Mauvais captcha, veuillez réessayer !</p>';
						}
						else
						{
							$_SESSION['valid'] = true;
							header('Location: captcha_valid.php');
						}
					}
					else
					{
						echo "<p class=\"red-error\">Code de sécurité doit contenir une valeur !</p>";
					}
				}
			?>
	</div>
</body>
</html>

