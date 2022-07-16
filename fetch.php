<?php
$connect = mysqli_connect("localhost", "root", "", "dentaldb");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM patients 
  WHERE allergies LIKE '%".$search."%'
 ";
}
else
{
 $query = "
  SELECT * FROM patients ORDER BY id
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>Име</th>
     <th>ЕГН</th>
     <th>Възраст</th>
     <th>Лечение</th>
     <th>Алергии</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["name"].'</td>
    <td>'.$row["egn"].'</td>
    <td>'.$row["age"].'</td>
    <td>'.$row["treatment"].'</td>
    <td>'.$row["allergies"].'</td>
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Няма резултати, отговарящи на търсенето!';
}

?>