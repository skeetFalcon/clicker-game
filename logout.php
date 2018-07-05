<?php

	session_start();
	include_once 'db.php';

	$user->logout();

	$user->redirect('loginPage.php');
