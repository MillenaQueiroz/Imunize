<?php
	require_once 'classes/vacinas.php';
	$v = new Vacina;
?>

<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Cadastro de Vacina</title>
	<link rel="stylesheet" href="_css/estilo.css">
</head>
<body>
		<div id="corpo-form-cad">
		<form method="POST">
			
			<h1 align="center">CADASTRO DE VACINA</h1> <BR>
			
				
					Nome: <input type="text" name="nome" placeholder="Nome da Vacina">
					Data: <input type="date" name="data">
					Validade: <input type="date" name="validade">
					Registro do Profissional Responsável: <input type="text" name="NumRegistro"> 
		 			CPF do imuno: <input type="text" name="cpf" maxlength="11"> 
				
				 <center><input type="submit" value="Cadastrar"> </center>
			
			</form>
		</div>
<?php
		if(isset($_POST['nome'])) {
			$nome= addslashes($_POST['nome']);
			$data= addslashes($_POST['data']);
			$validade= addslashes($_POST['validade']);
			$NumRegistro= addslashes($_POST['NumRegistro']);
			$cpf= addslashes($_POST['cpf']);
			if(!empty($nome) && !empty($cpf) && !empty($data) &&  !empty($NumRegistro)){

									$v->conectar("imunize","localhost","root", "");
										if($v->msgErro == ""){
											if($v->cadastrar ($cpf, $nome, $data, $validade, $NumRegistro)){
												?>
												<div id="msg-sucesso">
												 Cadastro realizado com sucesso!
												</div>
												<?php
											}else{
												?>
												<div class="msg-erro">
												O Número de Registro já está cadastrado!
												</div>
												<?php	
											}
										}else{

											echo "Erro: ".$u->msgErro;
										}
							}else{
								?>
								<div class="msg-erro">
								Preencha todos os campos!
								</div>
							<?php	
							}
					}
				?>

</body>
</html>