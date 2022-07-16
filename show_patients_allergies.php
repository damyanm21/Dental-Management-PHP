<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Търсене по алергии</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body{
            background-image: url("dentalbg.jpg");
			margin-left: 5%;
			margin-top: 3%;
			color: lightblue;
        }
        #menu{
            margin-left: 35%;
            font-size: 120%;
            color: white;
        }
        img {
			opacity: 0.5;
		}

        a {
			color: lightblue;
			text-decoration: none;
			font-size: 140%;
			opacity: 0.7;
		}

		a:hover {
			opacity: 1;
            text-decoration: none;
            color: white;
		}
        table{
            font-size: 140%;
        }

    </style>
</head>

<body>
    <div class="container">
        <br />
        <h2 align="center">Извеждане на данни за пациенти с определени алергии</h2><br />
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon">Търсене</span>
                <input type="text" name="search_text" id="search_text" placeholder="Търсене по алергии" class="form-control" />
            </div>
        </div>
        <br />
        <div id="result"></div>
    </div>
    <p id="menu"><a href="add_patients.php"> Добавяне на нов пациент </a></p>
    <p id="menu"><a href="show_patients.php"> Покажи всички пациенти </a></p>
    <p id="menu"><a href="show_patient_by_egn.php"> Покажи данните за пациент по ЕГН </a></p>
    <p id="menu"><a href="index.php">← Начало</a></p>
</body>

</html>
<script>
    $(document).ready(function() {

        load_data();

        function load_data(query) {
            $.ajax({
                url: "fetch.php",
                method: "POST",
                data: {
                    query: query
                },
                success: function(data) {
                    $('#result').html(data);
                }
            });
        }
        $('#search_text').keyup(function() {
            var search = $(this).val();
            if (search != '') {
                load_data(search);
            } else {
                load_data();
            }
        });
    });
</script>