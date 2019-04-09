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
	        $query = "SELECT COUNT(id), vendedor FROM venda WHERE month(data) = '$data' group by vendedor";
	        $exe = mysql_query($query) or die("Erro header+-62:". mysql_error());
	        $result = mysql_fetch_assoc($exe);
	            do{

	            $arr = array('vendedor' => $result['vendedor'], 'quantidade vendida' => $result['COUNT(id)']);
	        echo "<p align='center'>".json_encode($arr) . "</p><br>";
	            }while($result = mysql_fetch_assoc($exe));
	            }
	        ?>
	</table>
	<br>
<p align="center">
<a href="index.php" type="button" class="btn btn-primary btn-lg" value="Block level button">Voltar</a>
</p>
</body>
</html>

