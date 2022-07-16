<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Всички лечения</title>

	<style>
		nav {
			font-size: 200%;
			padding-left: 5%;
			padding-bottom: 4%;
			font-weight: bold;
		}

		td {
			padding-bottom: 5%;
		}

		body {
			background-image: url("dentalbg.jpg");
			margin-left: 30%;
			margin-top: 7%;
			color: lightblue;
		}

		img {
			opacity: 0.5;
		}

		a {
			color: lightblue;
			text-decoration: none;
			font-size: 130%;
			opacity: 0.5;
		}

		a:hover {
			opacity: 1;
		}

		table {
			font-size: 150%;
			border: 1px solid;
			padding: 20px;
			border-radius: 5px;
		}

		nav {
			font-weight: bold;
			margin-left: 15%;
		}

		#show {
			font-size: 150%;
			opacity: 0.7;
			cursor: pointer;
		}

		div {
			padding-bottom: 1%;
		}

		#link1,
		#link2 {
			display: none;
		}
	</style>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
		$(document).ready(function() {
			$("#show").click(function() {
				$("#link1").fadeIn("fast");
				$("#link2").fadeIn("slow");
			});
		});
	</script>

</head>

<body>
	<nav>Лечения:</nav>

	<?php
	include 'db_connection.php';
	$sqlQuery = 'SELECT * FROM treatments';
	$result = mysqli_query($link, $sqlQuery) or die(mysqli_error($link));
	if ($result) {
		$b = "style='border:1px solid  gray; border-collapse:collapse; text-align:center'";
		echo "<table $b><tr $b><th $b>Номер</th><th $b>Име</th><th $b>Цена</th><th $b>Описание</th></tr>";
		while ($row = mysqli_fetch_array($result)) {  //за обхождане на резултата ред по ред
			echo "<tr $b>";
			echo "<td $b>" . $row['id'] . "</td>";
			echo "<td $b>" . $row['name'] . "</td>";
			echo "<td $b>" . $row['price'] . "</td>";
			echo "<td $b>" . $row['description'] . "</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
	echo '</br></br>';
	?>

	<div id="show">Меню</div>
	<div id="link1"><a href="add_treatments.php"> Добавяне на ново лечение</a></div>
	<div id="link2"><a href="index.php">← Начало</a></div>

</body>

</html>