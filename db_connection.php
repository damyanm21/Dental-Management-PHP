<?php
	$db_host='localhost';
	$db_user='root';
	$db_pass='';
	$db_database='dentaldb';

	$link = mysqli_connect($db_host,$db_user,$db_pass,$db_database);
	
	//проверка на връзката
	if (!$link)
		die('Неуспешно свързване с базата от данни: '. mysqli_error($link));
	
	mysqli_set_charset($link, 'utf8');
?>