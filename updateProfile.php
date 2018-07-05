<?php

	session_start();

	include_once 'db.php';


	if (isset($_POST) && !empty($_POST)) 
	{
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$username = $_POST['username'];
		
		if (isset($_POST['password'])) 
		{
			$password = $_POST['password'];

			$user = $mysqli->query("
				UPDATE users
				SET firstname = '$firstname', lastname = '$lastname', username = '$username', password = '$password'
				WHERE id = " . $_SESSION['clicker_id'] . "
			");
		} 
		else 
		{
			$user = $mysqli->query("
					UPDATE users
					SET firstname = '$firstname', lastname = '$lastname', username = '$username'
					WHERE id = " . $_SESSION['clicker_id'] . "
				");
		}

		header('Location: loginPage.php');
	}
	else
	{
		error("Something went wrong!");
	}

	function error($msg)
	{
		$_SESSION['message'] = $msg;
		header("Location: error.php");
		exit();
	}
