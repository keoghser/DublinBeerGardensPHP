<?php

	$DB = 'db1246372_pubdetails';
	//$DB = 'beergarden';
	$password = '72ea5e28';
	$link = mysqli_connect('172.16.4.177', 'u1246372_root', $password);
	//$link = mysqli_connect('localhost', 'root', $password);

if (!$link)
	{
	$output = 'Unable to connect to the database server.';
	include 'output.html.php';
	exit();
	}

if (!mysqli_set_charset($link, 'utf8'))
	{
	$output = 'Unable to set database connection encoding.';
	include 'output.html.php';
	exit();
	}

if (!mysqli_select_db($link, $DB))
	{
	$output = 'Unable to locate the database.';
	include 'output.html.php';
	exit();
	}

?>