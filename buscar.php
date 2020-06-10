
<?php
	require_once 'classes/vacinas.php';
	$v = new Vacina;

?>

<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Buscar</title>
	<link rel="stylesheet" href="_css/estilo.css">
</head>
<body>
		<div id="corpo-form-cad">
		<form method="POST" action="pesquisar.php">
			
			<h1 align="center">Buscar Vacina</h1> <BR>
			
				
		  <input type="text" id="txtBusca" name= "cpf" placeholder="Buscar..."/>
		  <center><input type="submit" value="Buscar"> </center>
			
		</div>
<?php
 
	


?>
</body>
</html>