<?php

	class User
	{
		private $db;

		function __construct($db_con)
		{
			$this->db = $db_con;
		}

		public function register($fname, $lname, $uname, $upass)
		{
			try
			{
				$new_password = password_hash($upass, PASSWORD_DEFAULT);

				$stmt = $this->db->prepare("
					INSERT INTO users(firstname, lastname, username, password)
					VALUES (:fname, :lname, :uname, :upass)
				");
				
				$stmt->execute(array(
					":fname" => $fname,
					":lname" => $lname,
					":uname" => $uname,
					":upass" => $new_password
				));

				return $stmt;
			}
			catch (PDOException $e)
			{
				echo  $e->getMessage();
			}
		}

		public function login($uname, $upass)
		{
			try
			{
				$stmt = $this->db->prepare("
					SELECT * 
					FROM users
					WHERE username = :uname
					LIMIT 1
				");

				$stmt->execute(array(
					":uname" => $uname
				));
				
				$userRow = $stmt->fetch(PDO::FETCH_ASSOC);
				if($stmt->rowCount() > 0)
				{
					if(password_verify($upass, $userRow['password']))
					{
						$_SESSION['user_session'] = $userRow['id'];
						return true;
					}
					else
					{
						return false;
					}
				}

			}
			catch (PDOException $e)
			{
				echo $e->getMessage();
			}
		}

		public function updateProfile($uid ,$fname, $lname, $upass)
		{
			try
			{
				$stmt = $this->db->prepare("
					UPDATE users
					SET firstname = :fname, lastname = :lname, password = :upass
					WHERE id = :uid
					");

				$stmt->execute(array(
					":uid"   => $uid,
					":fname" => $fname,
					":lname" => $lname,
					":upass" => $upass
				));

				return true;
			}
			catch (PDOException $e)
			{
				echo $e->getMessage();
			}
		}

		public function updateStats($uid ,$score, $level, $umoney, $adate, $ubought)
		{
			try
			{
				$stmt = $this->db->prepare("
					UPDATE users
					SET uscore = :score, ulevel = :level, umoney = :umoney, activityDate = :adate, upgradesBought = :ubought
					WHERE id = :uid
					");

				$stmt->execute(array(
					":uid"   => $uid,
					":score" => $score,
					":level" => $level,
					":umoney" => $umoney,
					":adate" => $adate,
					":ubought" => $ubought
				));

				return true;
			}
			catch (PDOException $e)
			{
				echo $e->getMessage();
			}
		}

		public function is_loggedin()
		{
			if(isset($_SESSION['user_session']))
			{
				return true;
			}
		}

		public function redirect($url)
		{
			header("Location: $url");
		}

		public function logout()
		{
			session_destroy();
			unset($_SESSION['user_session']);
			return true;
		}


	}