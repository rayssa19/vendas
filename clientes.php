<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
include 'header.php';
?>
<form name="form" method="post" action="consulta_clientes.php">
<div class="form-group" align="center">
<label for="exampleFormControlSelect1"><b>Consultar clientes que mais compraram:</b></label>

<?php
include 'db.php';

echo "<select class='selectpicker' name='descricao'>";

$sql = "SELECT DISTINCT produto.descricao FROM venda, produto WHERE venda.prodId = produto.id";

$resultado = mysql_query($sql);

if($resultado)//teste se houve resultado entra no while 
{
while($linha = mysql_fetch_array($resultado)) {
  echo "<option value='".$linha["descricao"]."'>".$linha["descricao"]."</option>";
}

}
echo "</select>";
?>
<br><button type="submit" class="btn btn-primary">Enviar</button>


</form> 
</body>
</html>
