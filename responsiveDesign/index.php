<!DOCTYPE html>
<html>
	<head>
		<title>responsiveDesign</title>
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

			<div class="rightColumn">
				
				<div class="profile">

					<div class="profileEdit" onclick="popupWindow(true)">
						<img id="profileEditImg" class="profileEditImg" src="../images/icons/pencil-edit-button.png">
						<img id="profileImg" class="profileImg" src="../images/profilePhotos/defaultPP.jpg">
					</div>
					
					<div class="profileTable">
						<div class="profileStats">usernameeeeeeeeee</div>
						<div class="profileStats">scorereeeeeeeeeeee</div>
						<div class="profileStats">leveleeeeeeeeeeeee</div>
						<div class="profileStats">moneyeeeeeeeeeee</div>
					</div>

				</div>

				<div class="leaderboard">
					
					<h2>LEADERBOARD:</h2>
						
					<table>
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
						<tr>
							<td>1#</td>
							<td>useeeeeeeeeeeeeeer</td>	
							<td>1000000000000000000</td>
						</tr>
						<tr>
							<td>1#</td>
							<td>useeeeeeeeeeeeeeer</td>	
							<td>1000000000000000000</td>
						</tr>
						<tr>
							<td>1#</td>
							<td>useeeeeeeeeeeeeeer</td>	
							<td>1000000000000000000</td>
						</tr>
						<tr>
							<td>1#</td>
							<td>useeeeeeeeeeeeeeer</td>	
							<td>1000000000000000000</td>
						</tr>
						<tr>
							<td>1#</td>
							<td>useeeeeeeeeeeeeeer</td>	
							<td>1000000000000000000</td>
						</tr>
						<tr>
							<td>1#</td>
							<td>useeeeeeeeeeeeeeer</td>	
							<td>1000000000000000000</td>
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
					<table>
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
						<tr>
							<td>2#</td>
							<td>useeeeeeeeeeeeeeer</td>	
							<td>1.1.2000 11:11:11</td>
						</tr>
						<tr>
							<td>2#</td>
							<td>useeeeeeeeeeeeeeer</td>	
							<td>1.1.2000 11:11:11</td>
						</tr>
						<tr>
							<td>2#</td>
							<td>useeeeeeeeeeeeeeer</td>	
							<td>1.1.2000 11:11:11</td>
						</tr>
						<tr>
							<td>2#</td>
							<td>useeeeeeeeeeeeeeer</td>	
							<td>1.1.2000 11:11:11</td>
						</tr>
						<tr>
							<td>2#</td>
							<td>useeeeeeeeeeeeeeer</td>	
							<td>1.1.2000 11:11:11</td>
						</tr>
						<tr>
							<td>2#</td>
							<td>useeeeeeeeeeeeeeer</td>	
							<td>1.1.2000 11:11:11</td>
						</tr>


					</table>

				</div>

			</div>

			<div class="middleColumn">
			</div>

			<div class="leftColumn">

				<div class="item">
					<div class="itemImg">
						<div class="itemAdd"></div>
						<div class="itemAddMore"></div>
						<img src="../images/icons/manager.png">	
					</div>

					<div class="itemTextBox">	
						<div class="itemText itemHeader">HEADER</div>
						<div class="itemText itemValue">VALUE</div>
						<div class="itemText itemAmount">AMOUNT</div>
					</div>
				</div>

				<div class="item">
					<div class="itemImg">
						<div class="itemAdd"></div>
						<div class="itemAddMore"></div>
						<img src="../images/icons/group-of-people-in-a-formation.png">	
					</div>

					<div class="itemTextBox">	
						<div class="itemText itemHeader">HEADER</div>
						<div class="itemText itemValue">VALUE</div>
						<div class="itemText itemAmount">AMOUNT</div>
					</div>
				</div>

				<div class="item">
					<div class="itemImg">
						<div class="itemAdd"></div>
						<div class="itemAddMore"></div>
						<img src="../images/icons/application-ad.png">	
					</div>

					<div class="itemTextBox">	
						<div class="itemText itemHeader">HEADER</div>
						<div class="itemText itemValue">VALUE</div>
						<div class="itemText itemAmount">AMOUNT</div>
					</div>
				</div>

				<div class="item">
					<div class="itemImg">
						<div class="itemAdd"></div>
						<div class="itemAddMore"></div>
						<img src="../images/icons/dollar-symbol.png">	
					</div>

					<div class="itemTextBox">	
						<div class="itemText itemHeader">HEADER</div>
						<div class="itemText itemValue">VALUE</div>
						<div class="itemText itemAmount">AMOUNT</div>
					</div>
				</div>

				<div class="item">
					<div class="itemImg">
						<div class="itemAdd"></div>
						<div class="itemAddMore"></div>
						<img src="../images/icons/case.png">	
					</div>

					<div class="itemTextBox">	
						<div class="itemText itemHeader">HEADER</div>
						<div class="itemText itemValue">VALUE</div>
						<div class="itemText itemAmount">AMOUNT</div>
					</div>
				</div>

				<div class="item">
					<div class="itemImg">
						<div class="itemAdd"></div>
						<div class="itemAddMore"></div>
						<img src="../images/icons/outer-space-alien.png">	
					</div>

					<div class="itemTextBox">	
						<div class="itemText itemHeader">HEADER</div>
						<div class="itemText itemValue">VALUE</div>
						<div class="itemText itemAmount">AMOUNT</div>
					</div>
				</div>

			</div>
		
		</div>
	</body>

	<script type="text/javascript">

		var userID;

		function popupWindow(status)
		{
			if (userID != null) 
			{
				let fade = document.getElementById('fadeScreen');
				let log  = document.getElementById('popupWindow');	
				let img  = document.getElementById('profileEditImg');
				let img2  = document.getElementById('profileImg');
			
				if (status) 
				{

					console.log(userID);

					fade.style.display = "initial";
					log.style.display = "initial";
					img.style.opacity = "1";
					img2.style.opacity = "0.7";

					if (userID == "admin") 
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

		
	</script>
</html>