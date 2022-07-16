<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		nav{
			font-size: 200%;
			padding-bottom: 4%;
			padding-left: 7%;
			font-weight: bold;
		}

		td{
			padding-bottom: 5%;
		}

		body{
			background-image: url("dentalbg.jpg");
			margin-left: 30%;
			margin-top: 5%;
			color: lightblue;
		}

		img{
			opacity: 0.5;
		}
		a{
			color: lightblue;
			text-decoration: none;
			font-size: 130%;
			opacity: 0.5;
		}

		a:hover{
			opacity: 1;
		}

		table{
			font-size: 150%;
			border: 1px solid;
			padding: 20px;
			border-radius: 5px;
		}

		nav{
			font-weight: bold;
			margin-left: 15%;
		}
	</style>
</head>
<body>
	<nav>Записани часове:</nav>
</body>
</html>
<?php
	include 'db_connection.php';
	$sqlQuery = 'SELECT * FROM appointments'; 
	$result = mysqli_query($link, $sqlQuery) or die(mysqli_error($link));  
	if ($result) {		
		$b="style='border:1px solid  gray; border-collapse:collapse; text-align:center'";
		echo "<table $b><tr $b><th $b>Номер</th><th $b>Име</th><th $b>ЕГН</th><th $b>Телефон</th><th $b>Лечение</th><th $b>Дата</th><th $b>Час</th></tr>";
		while ($row = mysqli_fetch_array($result)) {  //за обхождане на резултата ред по ред
			echo "<tr $b>";
            echo "<td $b>".$row['id']."</td>";
			echo "<td $b>".$row['name']."</td>";         
			echo "<td $b>".$row['egn']."</td>";        
			echo "<td $b>".$row['phone']."</td>";         
			echo "<td $b>".$row['treatment']."</td>";  
            echo "<td $b>".$row['date']."</td>";  
            echo "<td $b>".$row['time']."</td>";  
			echo "</tr>";
		}
		echo "</table>";
	} 
	echo '</br></br>';
	echo '<p><a href="add_appointments.php"> Добавяне на нов час</a></p>';
	echo '<p><a href="index.php">← Начало</a></p>';
?>