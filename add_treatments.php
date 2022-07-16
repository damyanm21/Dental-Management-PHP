<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Записване на лечение в база от данни</title>
	<style>
		nav{
			font-size: 200%;
            padding-left: 2%;
			padding-bottom: 4%;
			font-weight: bold;
		}

		td{
			padding-bottom: 5%;
		}

		body{
			background-image: url("dentalbg.jpg");
			margin-left: 36%;
			margin-top: 3%;
            padding-top: 5%;
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

	</style>
</head>

<body>

	<form method="POST">
		<nav>Добавяне на лечение</nav>
		<table>
			<tr>
				<td>Име:</td>
				<td><input type="text" name="name" /></td>
			</tr>
			<tr>
				<td>Цена:</td>
				<td><input type="text" name="price" /></td>
			</tr>
			<tr>
				<td>Описание:</td>
				<td><input type="text" name="description" /></td>
			</tr>
			<tr>
				<th colspan="2"><input type="submit" name="submit" value="Добави" /></th>
			</tr>
		</table>
	</form>
	<br />


	<?php
	include 'db_connection.php';
	if (isset($_POST['submit'])) {
		if ((!empty($_POST['name'])) && (!empty($_POST['price'])) && (!empty($_POST['description']))) {
			$treat_name = $_POST['name'];
			$treat_price = $_POST['price'];
			$treat_desc = $_POST['description'];

			$sqlQuery = "INSERT INTO treatments (name,price,description) VALUES ('$treat_name', '$treat_price', '$treat_desc')";
			$result = mysqli_query($link, $sqlQuery) or die(mysqli_error($link));

			//извеждане на съобщение за грешка, ако изпълнението на заявката е неуспешно
			if (!$result)
				die("Добавянето на запис е неуспешно: " . mysqli_error($sqlQuery));
			else {
				echo 'Успешно добавен запис в таблицата.';
			}
		} else
			echo 'Моля, въведете всички полета за лечение.';
	}
	?>
	<p><a href="show_treatments.php">Покажи всички лечения </a></p>
	<p><a href="index.php">← Начало</a></p>

</body>

</html>