<?php
	session_start();

	if (isset($_SESSION['message']) AND !empty($_SESSION['message'])) {
		$message = $_SESSION['message'];
	} else {
		header("location: index.php");
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Error!</title>
	<link rel="stylesheet" type="text/css" href="css/loginStyle.css">
</head>
<body>

<div class="form">
	<h1><img src="images/icons/explanation_mark.png" style="height: 30px">
	<?=  $message ?></h1>
	<a href="loginPage.php"><button class="button button-block"/>Home</button></a>
</div>

</body>
</html>