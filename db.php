<?php
	/*Database connection settings*/
	$db_host = "localhost";
	$db_dbname = "clickergame";
	$db_user = "root";
	$db_pass = "";

	try
	{
		$db_con = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_dbname, $db_user, $db_pass);
		$db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch (PDOException $e)
	{
		die('Connection failed: ' . $e->getMessage());
	}

	include_once 'class.user.php';
	$user = new User($db_con);




/*	$db_host 	= 'localhost';
	$user 	= 'root';
	$pass 	= '';
	$db 	= 'clickergame';
	$mysqli = new mysqli($host, $user, $pass, $db) or die($mysqli->error);

	class Dbh 
	{
		private $servername;
		private $username;
		private $password;
		private $db_dbname;
		private $charset;

		public function connect()
		{
			$this->servername = "localhost";
			$this->username   = "root";
			$this->password   = "";
			$this->dbname 	  = "clickergame";
			$this->charset    = "utf8mb4";

			try 
			{
				$dsn = "mysql:host=" . $this->servername . ";dbname=" . $this->dbname . ";charset=" . $this->charset;
				$pdo = new PDO($dsn, $this->username, $this->password);

				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				return $pdo;
				
			} catch (PDOException $e) 
			{
				die('Connection failed: ' . $e->getMessage());
			}

		}
	}
*/
