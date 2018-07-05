<?php
	
	session_start();
	include_once "db.php";

	if($user->is_loggedin())
	{
		echo "bb";
		echo $user->is_loggedin();
		var_dump($_SESSION);
		//$user->redirect('index.php');
	}

	if(isset($_POST['login']))
	{
		$uname = $_POST['username'];
		$upass = $_POST['password'];

		if($user->login($uname, $upass))
		{
			$user->redirect('index.php');
		}
		else
		{
			error("Špatné jméno nebo heslo!");
		}
	}
	
	function error($msg)
	{
		$_SESSION['message'] = $msg;
		header("Location: error.php");
		exit();

	}