<?php

	session_start();
	require_once "db.php";

	if($user->is_loggedIn())
	{
		$user->redirect('index.php');
	}

	if(isset($_POST['register']))
	{
		$fname = trim($_POST['firstname']);
		$lname = trim($_POST['lastname']);
		$uname = trim($_POST['username']);
		$upass = trim($_POST['password']);

		try 
		{
			$stmt = $db_con->prepare("
				SELECT username
				FROM users
				WHERE username = :uname
			");

			$stmt->execute(array(
				":uname" => $uname
			));

			$row = $stmt->fetch(PDO::FETCH_ASSOC);

			if($row['username'] == $uname)
			{
				error("The username is already taken!");
			}
			else
			{
				if ($user->register($fname, $lname, $uname, $upass)) 
				{
					$user->redirect('index.php');
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}



/*
	$result = $mysqli->query( "
			SELECT *
			FROM users
			WHERE username = '$username'
			");

	if ($result->num_rows > 0)
	{
		error("User with this username already exists!");
	}
	else
	{
		if (isset($_FILES['file']) && $_FILES['file']['size'] > 0) 
		{
			//upload profile photo
			$file = $_FILES['file'];

			$file_name = $file['name'];
			$file_tmpname = $file['tmp_name'];
			$file_size = $file['size'];
			$file_error = $file['error'];
			$file_type = $file['type'];

			$fileExtension = explode('.', $file_name);
			$fileActualExt = strtolower(end($fileExtension));


			$allowed = array('jpg', 'jpeg', 'png');

			if (in_array($fileActualExt, $allowed))
			{
				if ($file_error === 0)
				{
					if ($file_size < 1000000)
					{
						//insert new user to database
						$sql = "INSERT INTO users (firstname, lastname, username, password)
								VALUES ('$firstname', '$lastname', '$username', '$password')";
						$mysqli->query($sql);

						//take new user data from database
						$result = $mysqli->query( "
								SELECT *
								FROM users
								WHERE username = '$username'
								");
						$user = $result->fetch_assoc();

						$file_name_new = "profile" . $user['id'] . "." . $fileActualExt;
						$file_destination = "images\profilePhotos/" . $file_name_new;

						move_uploaded_file($file_tmpname, $file_destination);

						//set profile image status as '1' 
						$userid = $user['id'];
						$sql = "INSERT INTO profileimg (userid, status, filetype)
								VALUES ('$userid', 1, '$fileActualExt')";
						$mysqli->query($sql);
					}
					else
					{
						error("Your file is too big!");
					}
				}
				else
				{
					error("There was an error uploading your file!");
				}
			}
			else
			{
				error("You cannot upload file of this type!");
			}
		}
		else
		{
			//insert new user to database
			$sql = "INSERT INTO users (firstname, lastname, username, password)
					VALUES ('$firstname', '$lastname', '$username', '$password')";
			$mysqli->query($sql);

			//take new user data from database
			$result = $mysqli->query( "
					SELECT *
					FROM users
					WHERE username = '$username'
					");
			$user = $result->fetch_assoc();

			
			//set profile image status to '0' --> user will get default Profile photo
			$userid = $user['id'];
			$sql = "INSERT INTO profileimg (userid, status)
					VALUES ('$userid', 0)";
			$mysqli->query($sql);

			echo $_FILES['file']['error'];
		}


		//sends user ID to main page, which takes info from database
		$_SESSION['logged_in']		= true;
		$_SESSION['clicker_id'] 	= $user['id'];

		header("Location: index.php");
	}
*/
	function error($msg)
	{
		$_SESSION['message'] = $msg;
		header("Location: error.php");
		exit();
	}