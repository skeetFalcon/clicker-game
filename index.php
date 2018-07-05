<?php

	session_start();
	include_once 'db.php';

	if(!$user->is_loggedin())
	{
		$user->redirect('loginPage.php');
	}

	$user_id = $_SESSION['user_session'];
	
	$stmt = $db_con->prepare("SELECT * FROM users WHERE id = :user_id");
	
	$stmt->execute(array(
		":user_id" => $user_id
	));
	
	$u = $stmt->fetch(PDO::FETCH_ASSOC);

	/*while ($u = $stmt->fetch(PDO::FETCH_ASSOC))
	{
		echo "<pre>", print_r($u), "</pre>";
		//echo "<pre>", $u->entry, "</pre>";
	}*/

	$userID 		= $u['id'];
	$firstname		= $u['firstname'];
	$lastname		= $u['lastname'];
	$username		= $u['username'];
	$money			= $u['umoney'];
	$score			= $u['uscore'];
	$level			= $u['ulevel'];
	$upgradesBought = "[" . $u['upgradesBought'] . "]";

/*
	
		
	$user = $mysql->query("
			SELECT *
			FROM users
			WHERE id = " . $_SESSION['clicker_id'] . "
		");
	$u = mysqli_fetch_assoc($user);


	$profileimg = $mysqli->query("
		SELECT *
		FROM profileimg
		WHERE userid = '$userID' 
		");
	$pi = mysqli_fetch_assoc($profileimg);

	$fileType = $pi['filetype'];


	$fileName = '"' . $userID . "." . $fileType . '"';
	$fileStatus = $pi['status'];
*/
?>


<!DOCTYPE html>
<html>
	<head>
		<title>Clicker Game</title>
		<link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/adminStyle.css">
		<link rel="stylesheet" type="text/css" href="css/playerEdit.css">
		<link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
	</head>
	
	<body>
		<div id="fadeScreen" class="fadeMe" style="display: none" onclick="popupWindow(false)"></div>
		<div id="popupWindow" class="adminWindow" style="display: none">

			<?php include 'playerEdit.php'; ?>
			<?php include 'playerTable.php'; ?>
		</div>
		
		<div class="box">


			<div class="loginWindow"></div>

			<div class="leftColumn">
				
				<div class="profile">

					<div class="profileEdit" onclick="popupWindow(true)">
						<img id="profileEditImg" class="profileEditImg" src="./images/icons/pencil-edit-button.png">
						<img id="profilePhoto" class="profileImg" src="./images/profilePhotos/defaultPP.jpg">
					</div>

					
					<div class="profileTable">
						<div id="" class="profileStats"><?= $username ?></div>
						<div id="score" class="profileStats">Your score: 0</div>
						<div id="level" class="profileStats">Your level: 0</div>
						<div id="money" class="profileStats">Your money: 0</div>
					</div>

				</div>
					
					<a href="logout.php">
						<div class="logout">LOG OUT</div>
					</a>

				<div class="leaderboard">
					
					<h2>LEADERBOARD:</h2>
						
					<table id="leaderboard">
						<tr>
							<th>Rank:</th>
							<th>Username:</th>	
							<th>Score:</th>
						</tr>
						<tr>
							<td>1#</td>
							<td>useeeeeeeeeeeeeeer</td>	
							<td>1000000000000000000</td>
						</tr>
					</table>

				</div>
				
				<div class="activityboard">
					
					<h2>ACTIVITY:</h2>
					<table id="activity">
						<tr>
							<th>Rank:</th>
							<th>Username:</th>	
							<th>Date:</th>
						</tr>
						<tr>
							<td>2#</td>
							<td>useeeeeeeeeeeeeeer</td>	
							<td>1.1.2000 11:11:11</td>
						</tr>
					</table>

				</div>

			</div>

			<div class="middleColumn" onclick="update()"> 
			</div>

			<div class="rightColumn">

				<div class="item">
					<div class="itemImg" onclick="buyUpgrade(1)">
						<div class="itemAdd"></div>
						<div class="itemAddMore"></div>
						<img src="./images/icons/manager.png">	
					</div>

					<div class="itemTextBox">	
						<div id="upgradeAmount1" class="itemText itemHeader">HEADER</div>
						<div id="upgradePrice1" class="itemText itemValue">VALUE</div>
						<div id="upgradeProfit1" class="itemText itemAmount">AMOUNT</div>
					</div>
				</div>

				<div class="item">
					<div class="itemImg" onclick="buyUpgrade(2)">
						<div class="itemAdd"></div>
						<div class="itemAddMore"></div>
						<img src="./images/icons/group-of-people-in-a-formation.png">	
					</div>

					<div class="itemTextBox">	
						<div id="upgradeAmount2" class="itemText itemHeader">HEADER</div>
						<div id="upgradePrice2" class="itemText itemValue">VALUE</div>
						<div id="upgradeProfit2" class="itemText itemAmount">AMOUNT</div>
					</div>
				</div>

				<div class="item">
					<div class="itemImg" onclick="buyUpgrade(3)">
						<div class="itemAdd"></div>
						<div class="itemAddMore"></div>
						<img src="./images/icons/application-ad.png">	
					</div>

					<div class="itemTextBox">	
						<div id="upgradeAmount3" class="itemText itemHeader">HEADER</div>
						<div id="upgradePrice3" class="itemText itemValue">VALUE</div>
						<div id="upgradeProfit3" class="itemText itemAmount">AMOUNT</div>
					</div>
				</div>

				<div class="item">
					<div class="itemImg" onclick="buyUpgrade(4)">
						<div class="itemAdd"></div>
						<div class="itemAddMore"></div>
						<img src="./images/icons/dollar-symbol.png">	
					</div>

					<div class="itemTextBox">	
						<div id="upgradeAmount4" class="itemText itemHeader">HEADER</div>
						<div id="upgradePrice4" class="itemText itemValue">VALUE</div>
						<div id="upgradeProfit4" class="itemText itemAmount">AMOUNT</div>
					</div>
				</div>

				<div class="item">
					<div class="itemImg" onclick="buyUpgrade(5)">
						<div class="itemAdd"></div>
						<div class="itemAddMore"></div>
						<img src="./images/icons/case.png">	
					</div>

					<div class="itemTextBox">	
						<div id="upgradeAmount5" class="itemText itemHeader">HEADER</div>
						<div id="upgradePrice5" class="itemText itemValue">VALUE</div>
						<div id="upgradeProfit5" class="itemText itemAmount">AMOUNT</div>
					</div>
				</div>

				<div class="item">
					<div class="itemImg" onclick="buyUpgrade(6)">
						<div class="itemAdd"></div>
						<div class="itemAddMore"></div>
						<img src="./images/icons/outer-space-alien.png">	
					</div>

					<div class="itemTextBox">	
						<div id="upgradeAmount6" class="itemText itemHeader">HEADER</div>
						<div id="upgradePrice6" class="itemText itemValue">VALUE</div>
						<div id="upgradeProfit6" class="itemText itemAmount">AMOUNT</div>
					</div>
				</div>

			</div>
		
		</div>
	</body>

		<script type="text/javascript">

			let money, score, level, lastScore, clickCount;

			let userID 				= <?= $userID ?>;
			let upgradesBought 		= <?= $upgradesBought ?>;
			let upgradesScoreValue  = [10, 50, 250, 1250, 6250, 31250];
			let upgradesPrice  		= upgradesScoreValue;
			let upgrades 	   		= [0, 0, 0, 0, 0, 0];

			//console.log(upgradesBought);

			let leaderboard = document.getElementById('leaderboard');
			let activity 	= document.getElementById('activity');
			//let coverWrap 	= document.getElementById('coverWrap');
			//let innerWrap 	= document.getElementsByClassName('showCoin');
			let showMoney 	= document.getElementById('money');
			let showScore 	= document.getElementById('score');
			let showLevel 	= document.getElementById('level');
			
			if (userID == 1)
			{
				money = 100000;
				score = 1000000;
				level = 1000000;
				upgradesBought = [10, 10, 10, 10, 10, 10];
			}
			else
			{
				money = <?= $money ?>;
				score = <?= $score ?>;
				level = <?= $level ?>;
			}



			function popupWindow(state)
			{
				if (userID != null) 
				{
					let fade = document.getElementById('fadeScreen');
					let log  = document.getElementById('popupWindow');	
					let img  = document.getElementById('profileEditImg');
					let img2  = document.getElementById('profilePhoto');
				
					if (state) 
					{


						fade.style.display = "initial";
						log.style.display = "initial";
						img.style.opacity = "1";
						img2.style.opacity = "0.7";

						if (userID == 1) 
						{
							let edit = document.getElementById('playerEdit');
							let admin = document.getElementById('playerTable');
							
							edit.style.display = "none"
							admin.style.display = "initial"
						}
						else
						{
							let edit = document.getElementById('playerEdit');
							let admin = document.getElementById('playerTable');
							
							edit.style.display = "initial"	
							admin.style.display = "none"
						}
					}
					else
					{
						fade.style.display = "none";
						log.style.display = "none";
						img.style.opacity = "0";
						img2.style.opacity = "1";
					}
				}
				
			}

			function update()
			{	
				addScore();
				addMoney();
				levelUp();
			}

			loadLeaderboard();
			setInterval(loadLeaderboard, 1000);
			function loadLeaderboard()
			{
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() 
				{
					if (this.readyState == 4 && this.status == 200) 
					{
						leaderboard.innerHTML = this.responseText;
					}
				};
				xhttp.open("GET", "leaderboard.php", true);
				xhttp.send();
			}

			loadActivity();
			setInterval(loadActivity, 10000);
			function loadActivity()
			{

				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() 
				{
					if (this.readyState == 4 && this.status == 200) 
					{
						activity.innerHTML = this.responseText;
					}
				};
				xhttp.open("GET", "activity.php", true);
				xhttp.send();
			}

			updateStats();
			setInterval(updateStats, 1000);
			function updateStats()
			{
				
				var xhttp = new XMLHttpRequest();

				let url = "updatestats.php";

				url += "?score=" + score;
				url += "&money=" + money;
				url += "&level=" + level;
				url += "&upgradesBought=" + upgradesBought;

				xhttp.open("GET", url, true);
				xhttp.send();
			}


			refreshStats();
			function refreshStats()
			{
				showMoney.innerHTML = "Your money: " + money + " " + "<i class='fab fa-bitcoin'></i>";
				showScore.innerHTML = "Your score: " + score;
				showLevel.innerHTML = "Your level: " + level;
			}

			function addScore()
			{
				if (level < 5)
				{
					switch (level)
					{
						case 1:
						score += 10;
						break;

						case 2:
						score += 20;
						break;

						case 3:
						score += 30;
						break;

						case 4:
						score += 40;
						break;
					}
				} else if (level >= 5 && level <= 50)
				{
					score += 500;
				} else if (level > 50)
				{
					score += 10000;
				}

				refreshStats();
			}

			function addMoney()
			{
				if (level < 5)
				{
					switch (level)
					{
						case 1:
						money += 2;
						break;

						case 2:
						money += 5;
						break;

						case 3:
						money += 8;
						break;

						case 4:
						money += 20;
						break;
					}
				} else if (level >= 5 && level <= 10)
				{
					money += 25;
				} else if (level >= 11 && level <= 25)
				{
					money += 150;
				} else if (level > 50)
				{
					money += 1200;
				}

				refreshStats();
			}

			function levelUp()
			{
				if (score == 100) {
					level++;

					lastScore = score;
					lastScore = 2.1*lastScore;
				} else if (score >= lastScore) {
					level++;

					lastScore = score;
					lastScore = 1.8*lastScore;
				}

				refreshStats();
			}

			countUpgrades();
			function countUpgrades()
			{
				for (let i = 0; i < upgradesBought.length; i++)
				{
					for (let j = 0; j < upgradesBought[i]; j++)
					{
						if (upgradesBought[i] > 0)
						{
							upgrades[i] = upgradesPrice[i];
							upgrades[i]   	 *= 1.5;
							upgradesPrice[i] *= 1.5;
						}
						else
						{
							upgrades[i] = 0;
							upgradesPrice[i] *= 1.5;
						}
						
						showValues();
					}	
				}
			}

			showValues();
			function showValues()
			{
				for (let i = 0; i < upgrades.length; i++)
				{
					let x = i+1;
					x = x.toString();

					let upAmount = document.getElementById('upgradeAmount' + x);
					let upProfit = document.getElementById('upgradeProfit' + x);
					let upPrice  = document.getElementById('upgradePrice'  + x);

					let showText;
					upgrades[i] > 999 ? showText = "<sup>sc/s</sup>" : showText = "<sup> score/s</sup>";
					
					upgrades[i]		 = Math.round(upgrades[i]);
					upgradesPrice[i] = Math.round(upgradesPrice[i]);

					upAmount.innerHTML = "/" + upgradesBought[i];
					upProfit.innerHTML = upgrades[i] + showText;
					upPrice.innerHTML  = upgradesPrice[i] + " ";

					refreshStats();
				}
			} 

			function buyUpgrade(boughtItem)
			{
				for (let i = 0; i < upgrades.length; i++)
				{
					if (i+1 == boughtItem && money >= upgradesPrice[i])
					{
						upgrades[i] == 0 ? upgrades[i] = upgradesScoreValue[i] : upgrades[i] *= 1.5;

						money -= upgradesPrice[i];
						upgradesPrice[i] *= 1.5;
						upgradesBought[i]++;
						
						showValues();

						break;
					}
				}
			}

			function getSum(total, num)
			{
				return total + num;
			}

			scoreFromUpgrades();
			setInterval(scoreFromUpgrades, 1000);
			function scoreFromUpgrades()
			{
				//console.log(upgrades);
				let sum = upgrades.reduce(getSum, 0);

				score += sum;

				levelUp();
			}

			showProfileImage();
			function showProfileImage()
			{	
				let status = <?= $fileStatus; ?>;

				console.log(status);

				if (status === 1)
				{
					let fileName = <?= $fileName ?>;
					let x = document.getElementById('profilePhoto');

					x.src =  "images/profilePhotos/profile" + fileName;
				}
			}

		</script>
</html>