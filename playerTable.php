<?php
	require 'db.php';

	$playerTable = $db_con->query("
					SELECT username, id
					FROM users
					");


	$profileimg = $db_con->query("
			SELECT *
			FROM profileimg
			");
	$pi =$profileimg->fetch();

	$fileType = $pi['filetype'];
	$fileStatus = $pi['status'];

	$fileName = '"' . $userID . "." . $fileType . '"';

	//var_dump($profileimg);

	$a = array();

	foreach ($profileimg as $pim)
	{
		if (isset($pim['filetype']) && !empty($pim['filetype']))
		{
			$x = "profile".$pim['userid'];
			$y = $pim['filetype'];
			$z = $x . "." . $y;
			array_push($a, $z);
		}
		else
		{
			$z = "defaultPP.jpg";
			array_push($a, $z);
		}
	}
	//print_r($a);
?>

<div id="playerTable">
	
	<div class="adminSearch">
		<form>
			<input type="text" name="player" placeholder="Zadej jméno hráče..">
			<button type="submit" name="search">Hledej</button>
		</form>
	</div>

	<div class="adminTable">
		<table>

			<?php
			$counter = -1;
			foreach ($playerTable as $p)
			{
				$counter++;
			?>
					<tr>
						<td class='adminImg'><img src='./images/profilePhotos/<?= $a[$counter]?>'></td>
						<td class='adminUser'><?= $p['username'] ?> </td>
						<td class='adminEdit'><a href=''><img src='./images/icons/edit.png'></a></td>
						<td class='adminEdit'><a href=''><img src='./images/icons/trash.png'></a></td>
					</tr>
			<?php
			}
			?>
			<tr>
				<td class="adminImg"><img src="./images/profilePhotos/defaultPP.jpg"></td>
				<td class="adminUser">username</td>
				<td class="adminEdit"><a href=""><img src="./images/icons/edit.png"></a></td>
				<td class="adminEdit"><a href=""><img src="./images/icons/trash.png"></a></td>
			</tr>
			
		</table>
	</div>
</div>