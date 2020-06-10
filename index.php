<?php
	require_once 'classes/usuarios.php';
	$u = new Usuario;
?>

<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" href="_css/estilo.css">
</head>
<body>
	<div id="corpo-form">
		<h1> LOGIN </h1>
			<form method="POST">
				<input type="text" name="NumRegistro" placeholder="Registro">
				<input type="password" name="senha" placeholder="Senha">
				<input type="submit" name="" value="Acessar">
				<a href="cadastrar.php">Ainda não é inscrito? <strong>Clique aqui!</strong></a>
			</form>
	</div>
<?php
		if(isset($_POST['NumRegistro'])) {
			$senha= addslashes($_POST['senha']);
			$NumRegistro= addslashes($_POST['NumRegistro']);
			//verificar campos
				if(!empty($senha) && !empty($NumRegistro)){
					$u->conectar("imunize","localhost","root", "");
					if($u->msgErro == ""){
					if($u->logar($NumRegistro,$senha)){
						header("location:AreaPrivada.php");
					}else{
						echo "Registro e/ou senha estão incorretos!";
					}
				}else{
					echo "Houve erro no banco de dados!";
				}
				}else{
					echo "Preencha todos os campos!";
				}
			}
?>
</body>
</html>