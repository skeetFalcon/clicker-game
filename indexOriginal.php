<?php

	session_start();
	include "db.php";

	if ($_SESSION['logged_in'])
	{	
		$user = $mysqli->query("
				SELECT *
				FROM users
				WHERE id = " . $_SESSION['clicker_id'] . "
			");
		$u = mysqli_fetch_assoc($user);

		$firstname		= $u['firstname'];
		$lastname		= $u['lastname'];
		$username		= $u['username'];
		$money			= $u['money'];
		$score			= $u['score'];
		$level			= $u['level'];
		$upgrades		= "[" . $u['upgrades'] . "]";
		$upgradesPrice	= "[" . $u['upgradesPrice'] . "]";
		$upgradesBought = "[" . $u['upgradesBought'] . "]";
	}
	else
	{
		error("You have to be logged in!");
	}

	function error($msg)
	{
		$_SESSION['message'] = $msg;
		header("Location: error.php");
		exit();
	}

	if(isset($_GET["logout"]))
	{
		session_destroy();
		header("location: loginPage.php");
		exit();
	}
?>


<!DOCTYPE html>
<html>
	<head>
		<title>Clicker Game</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
	</head>
	<body>
		<div class="game">

			<div class="container">
				<!-- Left side panel -->
				<div class="side-panel side-panel--left">

					<div class="side-panel__user">

							<img class="side-panel__profile-photo" src="images/man-silhouette.jpg"></img>
							<div id="username" class="side-panel__item"><?= $username ?></div>
							<div id="money" class="side-panel__item"><?= $money ?></div>
							<div id="score" class="side-panel__item"><?= $score ?></div>
							<div id="level" class="side-panel__item"><?= $level ?></div>

					</div>

					<div class="side-panel__block red">
						<a href="?logout"><div class="side-panel__button">LOG OUT</div></a>
					</div>

					<div class="side-panel__block">
						<h2 class="side-panel__title">Leaderboard:</h2>

						<table id="leaderboard">
						</table>

					</div>

					<div class="side-panel__block">
						<h2 class="side-panel__title">Players Activity:</h2>

						<table id="activity">
						</table>

					</div>

				</div>
				<!-- Middle part of container -->
				<div class="middle-part">

					<div class="middle-part__game">

						<div class="middle-part__outer-wrap">

							<div class="middle-part__image-wrap">

								<div id="coverWrap" class="middle-part__inner-wrap"></div>

							</div>

						</div>

					</div>

					<div class="middle-part__btn" onclick="startAction(true)">

						<span class="middle-part__btn-text">CLICK</span>

					</div>

				</div>

				<!-- Right side panel -->
				<div class="side-panel side-panel--right">

					<div class="side-panel__upgrades">

						<div class="upgrades__box">

							<img class="upgrades__image" src="images/manager.png">

							<div class="upgrades__first-layer">	

								<div class="upgrades__title--large">
									Worker 
									<span id="upgradeAmount1" class="upgrades__amount">\0</span>
								</div>

								<div class="upgrades__second-layer">

									<div class="upgrades__third-layer">

										<div class="upgrades__description">

											<span id="upgradeProfit1"></span>

										</div>

										<div class="upgrades__price">

											<span id="upgradePrice1">100 </span><i class="fab fa-bitcoin"></i>

										</div>

									</div>

									<div class="upgrades__third-layer">

										<div class="upgrades__btn" onclick="buyUpgrade(1)">

											<i class="fas fa-plus-circle upgrades__cross"></i>

										</div>

									</div>

								</div>

							</div>

						</div>

						<div class="upgrades__box">

							<img class="upgrades__image" src="images/group-of-people-in-a-formation.png">

							<div class="upgrades__first-layer">

								<div class="upgrades__title--large">

									5 Workers
									<span id="upgradeAmount2" class="upgrades__amount">\0</span>

								</div>

								<div class="upgrades__second-layer">

									<div class="upgrades__third-layer">

										<div class="upgrades__description">

											<span id="upgradeProfit2"></span>

										</div>

										<div class="upgrades__price">

											<span id="upgradePrice2">100 </span><i class="fab fa-bitcoin"></i>

										</div>

									</div>

									<div class="upgrades__third-layer">

										<div class="upgrades__btn" onclick="buyUpgrade(2)">

											<i class="fas fa-plus-circle upgrades__cross"></i>

										</div>

									</div>

								</div>

							</div>

						</div>

						<div class="upgrades__box">

							<img class="upgrades__image" src="images/application-ad.png">

							<div class="upgrades__first-layer">

								<div class="upgrades__title--large">

									Web Ad
									<span id="upgradeAmount3"  class="upgrades__amount">\0</span></div>

								<div class="upgrades__second-layer">

									<div class="upgrades__third-layer">

										<div class="upgrades__description">

											<span id="upgradeProfit3"></span>

										</div>

										<div class="upgrades__price">

											<span id="upgradePrice3">100 </span><i class="fab fa-bitcoin"></i>

										</div>
									</div>

									<div class="upgrades__third-layer">

										<div class="upgrades__btn" onclick="buyUpgrade(3)">

											<i class="fas fa-plus-circle upgrades__cross"></i>

										</div>

									</div>

								</div>

							</div>

						</div>

						<div class="upgrades__box">

							<img class="upgrades__image" src="images/dollar-symbol.png">

							<div class="upgrades__first-layer">	

								<div class="upgrades__title--large">

									Bank Loan
									<span id="upgradeAmount4" class="upgrades__amount">\0</span>

								</div>

								<div class="upgrades__second-layer">

									<div class="upgrades__third-layer">

										<div class="upgrades__description">

											<span id="upgradeProfit4"></span>

										</div>

										<div class="upgrades__price">

											<span id="upgradePrice4">100 </span><i class="fab fa-bitcoin"></i>

										</div>

									</div>

									<div class="upgrades__third-layer">

										<div class="upgrades__btn" onclick="buyUpgrade(4)">

											<i class="fas fa-plus-circle upgrades__cross"></i>

										</div>

									</div>

								</div>

							</div>

						</div>

						<div class="upgrades__box">

							<img class="upgrades__image" src="images/case.png">

							<div class="upgrades__first-layer">

								<div class="upgrades__title--large">

									Black Market
									<span id="upgradeAmount5" class="upgrades__amount">\0</span>

								</div>
								<div class="upgrades__second-layer">

									<div class="upgrades__third-layer">

										<div class="upgrades__description">

											<span id="upgradeProfit5"></span>

										</div>

										<div class="upgrades__price">

											<span id="upgradePrice5">100 </span><i class="fab fa-bitcoin"></i>

										</div>

									</div>

									<div class="upgrades__third-layer">

										<div class="upgrades__btn" onclick="buyUpgrade(5)">

											<i class="fas fa-plus-circle upgrades__cross"></i>

										</div>

									</div>

								</div>

							</div>

						</div>

						<div class="upgrades__box">

							<img class="upgrades__image" src="images/outer-space-alien.png">

							<div class="upgrades__first-layer">

								<div class="upgrades__title--large">

									Alien Help 
									<span id="upgradeAmount6" class="upgrades__amount">\0</span>

								</div>

								<div class="upgrades__second-layer">

									<div class="upgrades__third-layer">

										<div class="upgrades__description">

											<span id="upgradeProfit6"></span>

										</div>

										<div class="upgrades__price">

											<span id="upgradePrice6">100 </span><i class="fab fa-bitcoin"></i>

										</div>

									</div>

									<div class="upgrades__third-layer">

										<div class="upgrades__btn" onclick="buyUpgrade(6)">

											<i class="fas fa-plus-circle upgrades__cross"></i>

										</div>

									</div>

								</div>

							</div>

						</div>

					</div>

				</div>

			</div>

		</div>


		<script type="text/javascript">

			let money, score, level, lastScore, clickCount;

			let upgradesBought 		= <?= $upgradesBought ?>;
			let upgradesScoreValue  = [10, 50, 250, 1250, 6250, 31250];
			let upgradesPrice  		= <?= $upgradesPrice ?>;
			let upgrades 	   		= <?= $upgrades ?>;

			let leaderboard = document.getElementById('leaderboard');
			let activity 	= document.getElementById('activity');
			let coverWrap 	= document.getElementById('coverWrap');
			let innerWrap 	= document.getElementsByClassName('showCoin');
			let showMoney 	= document.getElementById('money');
			let showScore 	= document.getElementById('score');
			let showLevel 	= document.getElementById('level');
			
			money = <?= $money ?>;
			score = <?= $score ?>;
			level = <?= $level ?>;
			clickCount = 0;

			function startAction()
			{
				if (innerWrap.length == 0)
				{
					setTimeout(hideCoin, 1000);
					coverWrap.className = "middle-part__inner-wrap showCoin";

					setTimeout(update, 950);
				}
			}

			function hideCoin()
			{
				coverWrap.className = "middle-part__inner-wrap";
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

				let url = "updateStats.php";

				url += "?score=" + score;
				url += "&money=" + money;
				url += "&level=" + level;
				url += "&upgrades=" + upgrades;
				url += "&upgradesPrice=" + upgradesPrice;
				url += "&upgradesBought=" + upgradesBought;

				xhttp.open("GET", url, true);
				xhttp.send();
			}

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
				if (clickCount == 4) 
				{
					if (level < 5)
					{
						switch (level)
						{
							case 1:
							money += 10;
							break;

							case 2:
							money += 20;
							break;

							case 3:
							money += 30;
							break;

							case 4:
							money += 40;
							break;
						}
					} else if (level >= 5 && level <= 10)
					{
						money += 100;
					} else if (level >= 11 && level <= 25)
					{
						money += 500;
					} else if (level > 50)
					{
						money += 5000;
					}

					clickCount = 0;
				} else 
				{
					clickCount++;
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

					upAmount.innerHTML = "/" + upgradesBought[i];
					upProfit.innerHTML = upgrades[i] + " score/s";
					upPrice.innerHTML  = upgradesPrice[i] + " ";
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
						
						upgrades[i]		 = Math.round(upgrades[i]);
						upgradesPrice[i] = Math.round(upgradesPrice[i])

						console.log(upgrades);
						console.log(upgradesBought);
						console.log(upgradesPrice);

						let x = i+1;
						x = x.toString();

						let upAmount = document.getElementById('upgradeAmount' + x);
						let upProfit = document.getElementById('upgradeProfit' + x);
						let upPrice  = document.getElementById('upgradePrice'  + x);

						let showText;
						upgrades[i] > 999 ? showText = "<sup>sc/s</sup>" : showText = "<sup> score/s</sup>";
						
						upAmount.innerHTML = "/" + upgradesBought[i];
						upProfit.innerHTML = upgrades[i] + showText;
						upPrice.innerHTML  = upgradesPrice[i] + " ";

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
				let sum = upgrades.reduce(getSum, 0);

				score += sum;

				levelUp();
			}

			function getSum(total, num)
			{
				return total + num;
			}

		</script>
	 </body>
</html>