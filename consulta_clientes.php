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
@$descricao = $_POST['descricao'];

$sql = "SELECT * FROM produto WHERE descricao='$descricao'";
		$con = mysql_query($sql) or die(mysql_error());
		$rows = mysql_num_rows($con);
		$result = mysql_fetch_assoc($con);


		if ($rows == 0) {
			echo "<p class='center'><b>Não houve vendas!</b></p>";
		}else{

?>
<div>
				<h4><p align="center">Cliente que mais compraram:</p></h4>
		<?php
		include 'db.php';
		@$descricao = $_POST['descricao'];
$result = mysql_query("SELECT nome, clienteId, count(clienteId)

      FROM cliente, venda, produto WHERE produto.descricao = '$descricao' AND produto.id = venda.prodId AND venda.clienteId = cliente.id

      GROUP BY clienteId

      having count(clienteId)=(SELECT max(a.cnt)

      FROM (SELECT count(clienteId) AS cnt

      FROM cliente, venda, produto  WHERE produto.descricao = '$descricao' AND produto.id = venda.prodId AND venda.clienteId = cliente.id

      GROUP BY (clienteId)) AS a)");

	        $data = mysql_fetch_assoc($result);

	        file_put_contents("file.json", json_encode($data));

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

