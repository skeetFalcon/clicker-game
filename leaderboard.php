<?php

	require 'db.php';

	$leaderboard = $db_con->query("
			SELECT username, uscore
			FROM users
			ORDER BY uscore DESC
			");

	$rank = 1;
	foreach ($leaderboard as $l)
	{
		echo "
			<tr>
				<td class='leaderboard__item'>" . $rank . "#</td>
				<td class='leaderboard__item'>" . $l['username'] . "</td>
				<td class='leaderboard__item--60width'>" . $l['uscore'] . "</td>
			</tr>";
		$rank++;
	}