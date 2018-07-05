<?php
	session_start();
	include_once 'db.php';

/*

	$db_con->query("
			UPDATE users
			SET score = '" . $_GET["score"] . "',
				level = '" . $_GET["level"] . "',
				money = '" . $_GET["money"] . "',
				upgradesBought = '" . $_GET["upgradesBought"] . "',
				activityDate = now()
			WHERE id = " . $_SESSION['clicker_id'] . "
			");
*/

	$stmt = $db_con->prepare("UPDATE users SET uscore = :score, umoney = :umoney, ulevel = :level, upgradesBought = :upgr, activityDate = :act WHERE id = " . $_SESSION['user_session']);
	
	$stmt->execute(array(
		":score" => $_GET["score"],
		":umoney" => $_GET["money"],
		":level" => $_GET["level"],
		":upgr" => $_GET["upgradesBought"],
		":act" => date("Y-m-d H:i:s")
	));