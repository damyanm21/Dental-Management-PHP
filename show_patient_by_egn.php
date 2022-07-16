<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Извеждане на данни за пациенти по ЕГН</title>
	<style>
		nav {
			font-size: 200%;
			padding-bottom: 4%;
			font-weight: bold;
		}

		td {
			padding-bottom: 5%;
		}

		body {
			background-image: url("dentalbg.jpg");
			margin-left: 35%;
			margin-top: 10%;
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
	</style>
</head>

<body>

	<form method="POST">
		<p>Въведете ЕГН на пациент:<input type="text" name="egn" />
			<input type="submit" name="submit" value="Покажи" />
		</p>
	</form>
	<br />


	<?php
	include 'db_connection.php';
	if (isset($_POST['submit'])) {
		if ((!empty($_POST['egn']))) {
			$pat_egn = $_POST['egn'];

			$sqlQuery = "SELECT * FROM patients WHERE egn=" . $pat_egn;
			$result = mysqli_query($link, $sqlQuery) or die(mysqli_error($link));
			if (!$result)
				die("Неуспешно изпълнение на заявката: " . mysqli_error($sqlQuery));
			else {
				if (mysqli_num_rows($result) == 0)
					echo "Няма пациент с такова ЕГН.";
				else {
					$row = mysqli_fetch_array($result);
					echo "Номер: " . $row['id'] . "<br/>";
					echo "Име: " . $row['name'] . "<br/>";
					echo "ЕГН: " . $row['egn'] . "<br/>";
					echo "Възраст: " . $row['age'] . "<br/>";
					echo "Лечение: " . $row['treatment'] . "<br/>";
					echo "Алергии: " . $row['allergies'] . "<br/><br/>";
				}
			}
		} else
			echo 'Моля, въведете правилно ЕГН.';
	}
	echo '<p><a href="add_patients.php"> Добавяне на нов пациент </a></p>';
	echo '<p><a href="show_patients.php"> Покажи всички пациенти </a></p>';
	echo '<p><a href="show_patients_allergies.php"> Покажи всички пациенти с определени алергии </a></p>';
	echo '<p><a href="index.php">← Начало</a></p>';
	?>
</body>

</html>