<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Начало Dental Management</title>
    <style>
        body{
            background-image: url("dentalbg.jpg");
            margin-left: 35%;
            padding-top: 5%;
        }
        nav{
			font-size: 300%;
			padding-bottom: 4%;
			font-weight: bold;
            color: lightblue;
		}
        table{
			font-size: 150%;
			border: 1px solid;
			padding: 2%;
			border-radius: 5px;
            color: lightblue;
            margin-left: 2%;
		}

        td{
            padding-right: 10px;
            opacity: 0.7;
        }
        
        td:hover{
            opacity: 1;
        }

        a{
			text-decoration: none;
            color: lightblue;
		}

        #logo{
            height: 30%;
            width: 30%;
            padding-bottom: 5%;
            padding-top: 3%;
            padding-left: 7%;
        }

        #logo, nav, #op1, #op2, #op3{
            display: none;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
		$(document).ready(function() {
                $("#logo").fadeIn("slow");
				$("nav").fadeIn("slow");
                $("#op1").fadeIn("slow");
                $("#op2").fadeIn("slow");
                $("#op3").fadeIn("slow");
			});
	</script>
</head>
<body>
    <table>
        <nav>Dental Management ®</nav>
        <img id="logo" src="https://cdn-icons-png.flaticon.com/512/2818/2818366.png" alt="">
        <tr>
            <td>
                <a id="op1" href="show_appointments.php">Часове</a>
            </td>
            <td>
                |
            </td>
            <td>
                <a id="op2" href="show_patients.php">Пациенти</a>
            </td>
            <td>
                |
            </td>
            <td>
            <a id="op3" href="show_treatments.php">Лечения</a>
            </td>
        </tr>
    </table>
</body>
</html>