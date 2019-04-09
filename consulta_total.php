<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
	include 'header.php';
	?>
	<fieldset>
<?php
include "db.php";
@$data = $_POST['data'];

$sql = "SELECT * FROM venda WHERE month(data)='$data'";
		$con = mysql_query($sql) or die(mysql_error());
		$rows = mysql_num_rows($con);
		$result = mysql_fetch_assoc($con);


		if ($rows == 0) {
			echo "<p class='center'><b>Não houve vendas!</b></p>";
		}else{
?>
<h4><p align="center">Total de vendas de cada vendedor(a):</p></h4>


		<?php
		echo "<h4 align='center'><b>Mês: </b>" . $data . "</h4>";

		include 'db.php';
		@$data = $_POST['data'];

	        $result = mysql_query("SELECT COUNT(id), vendedor FROM venda WHERE month(data) = '$data' group by vendedor");

	        $data1 = mysql_fetch_assoc($result);

	        file_put_contents("file.json", json_encode($data1));

				$rows = [];

				while ($row = mysql_fetch_assoc($result)) {

  				  array_push($rows, $row);

				}
				$json = json_encode($rows);
	            
	           } 
	        ?>
	</table>
	<br>
<p align="center">
<a href="index.php" type="button" class="btn btn-primary btn-lg" value="Block level button">Voltar</a>
</p>
</body>
</html>

