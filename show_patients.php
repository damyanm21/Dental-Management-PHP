<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Данни за пациенти</title>
	<style>
		nav{
			font-size: 200%;
			padding-bottom: 4%;
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

		#link1,#link2,#link3,#link4{
			display: none;
		}
		#show{
			font-size: 150%;
			opacity: 0.7;
			cursor: pointer;
		}
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
		$(document).ready(function() {
			$("#show").click(function() {
				$("#link1").fadeIn("slow");
				$("#link2").fadeIn("slow");
				$("#link3").fadeIn("slow");
				$("#link4").fadeIn("slow");
			});
		});
	</script>
</head>
<body>
	<nav>Данни за пациенти:</nav>
</body>
</html>
<?php
	include 'db_connection.php';

	$sqlQuery = 'SELECT * FROM patients'; 
	$result = mysqli_query($link, $sqlQuery) or die(mysqli_error($link));  
	if ($result) {		
		$b="style='border:1px solid  gray; border-collapse:collapse; text-align:center'";
		echo "<table $b><tr $b><th $b>Номер</th><th $b>Име</th><th $b>ЕГН</th><th $b>Възраст</th><th $b>Лечение</th><th $b>Алергии</th></tr>";
		while ($row = mysqli_fetch_array($result)) {  //за обхождане на резултата ред по ред
			echo "<tr $b>";
            echo "<td $b>".$row['id']."</td>";
			echo "<td $b>".$row['name']."</td>";         
			echo "<td $b>".$row['egn']."</td>";        
			echo "<td $b>".$row['age']."</td>";         
			echo "<td $b>".$row['treatment']."</td>";  
            echo "<td $b>".$row['allergies']."</td>"; 
			echo "</tr>";
		}
		echo "</table>";
	} 
	echo '</br></br>';
	echo '<div id="show">Меню</div>';
	echo '<p id="link1"><a href="add_patients.php"> Добавяне на нов пациент </a></p>';
	echo '<p id="link2"><a href="show_patient_by_egn.php"> Покажи данните за пациент по ЕГН </a></p>';
	echo '<p id="link3"><a href="show_patients_allergies.php"> Покажи всички пациенти с определени алергии </a></p>';
	echo '<p id="link4"><a href="index.php">← Начало</a></p>';
?>