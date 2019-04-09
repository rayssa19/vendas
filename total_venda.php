<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
	include 'header.php';
	?>

<form name="form" method="post" action="consulta_total.php">
<div class="form-group" align="center">
<label for="exampleFormControlSelect1"><b>Consultar total de venda de cada vendedor do mês:</b></label>


<?php
include 'db.php';

echo "<select name='data'>";

$sql = "SELECT DISTINCT month(data) FROM venda ORDER BY data";

$resultado = mysql_query($sql);

if($resultado)//teste se houve resultado entra no while 
{
while($linha = mysql_fetch_array($resultado)) {
  echo "<option value='".$linha["month(data)"]."'>".$linha["month(data)"]."</option>";
}

echo $linha["data"]; /*aqui é a parte de exibição a informação que o usuario ira ver na tela "as opções"*/  
}
echo "</select>";
?>
<br><button type="submit" class="btn btn-primary">Enviar</button>


</form> 
</body>
</html>
