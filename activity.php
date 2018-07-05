<?php

	require 'db.php';

	$activity = $db_con->query("
					SELECT username, activityDate
					FROM users
					ORDER BY activityDate DESC
					");

	$rank = 1;
	foreach ($activity as $a)
	{
		echo "
			<tr>
				<td class='leaderboard__item'>" . $rank . "#</td>
				<td class='leaderboard__item'>" . $a['username'] . "</td>
				<td class='leaderboard__item--60width'>" . $a['activityDate'] . "</td>
			</tr>";
		$rank++;
	}