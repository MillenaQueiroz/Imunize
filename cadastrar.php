<?php
	require_once 'classes/usuarios.php';
	$u = new Usuario;
?>

<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Cadastro</title>
	<link rel="stylesheet" href="_css/estilo.css">
</head>
<body>
	<div id="corpo-form-cad">
		<form method="POST">
			
			<h1 align="center">CADASTRO</h1> <BR>
			
				<h4> DADOS BÁSICOS </h4><BR>
					Nome: <input type="text" name="Nome" placeholder="Nome Completo">
				 	CPF: <input type="text" name="cpf" maxlength="11">
					Data de nascimento: <input type="date" name="DataNasc">
					Sexo:
					<select name="sexo">
						<option value="fem">Feminino</option>
						<option value="masc">Masculino</option>
						<option value="outro">Outro</option>
					</select> <br>
					<br>
					Defina uma senha: <input type="password" name="senha"> 
		
				<h4> CONTATO </h4><BR>
					Email: <input type="text" name="email"> 
					Telefone: <input type="text" name="telefone"> 
			
				<h4> PROFISSIONAL DA SAÚDE </h4><BR>
					 Conselho:
					<select name="Conselho">
						<option value="CRM">CRM</option>
						<option value="CFBM">CFBM</option>
						<option value="COREN">COREN</option>
						<option value="CRF">CRF</option>
					</select>
				
					Estado:
					<select name="Estado">
						<option value="ac">AC</option>
						<option value="al">AL</option>
						<option value="ap">AP</option>
						<option value="am">AM</option>
						<option value="ba">BA</option>
						<option value="ce">CE</option>
						<option value="df">DF</option>
						<option value="es">ES</option>
						<option value="go">GO</option>
						<option value="ma">MA</option>
						<option value="mt">MT</option>
						<option value="ms">MS</option>
						<option value="mg">MG</option>
						<option value="pa">PA</option>
						<option value="pb">PB</option>
						<option value="pr">PR</option>
						<option value="pe">PE</option>
						<option value="pi">PI</option>
						<option value="rj">RJ</option>
						<option value="rn">RN</option>
						<option value="rs">RS</option>
						<option value="ro">RO</option>
						<option value="rr">RR</option>
						<option value="sc">SC</option>
						<option value="se">SE</option>
						<option value="sp">SP</option>
						<option value="to">TO</option>
					</select> <br>
				
					<Br>Número de registro: <input type="text" name="NumRegistro"> 
				
				 <center><input type="submit" value="Cadastrar"> </center>
			
			</form>
		</div>

	<?php
		if(isset($_POST['Nome'])) {
			$Nome = addslashes($_POST['Nome']);
			$cpf= addslashes($_POST['cpf']);
			$email= addslashes($_POST['email']);
			$sexo= addslashes($_POST['sexo']);
			$DataNasc= addslashes($_POST['DataNasc']);
			$senha= addslashes($_POST['senha']);
			$telefone= addslashes($_POST['telefone']);
			$Conselho= addslashes($_POST['Conselho']);
			$Estado= addslashes($_POST['Estado']);
			$NumRegistro= addslashes($_POST['NumRegistro']);
			//verificar campos
				if(!empty($Nome) && !empty($cpf) && !empty($email) && !empty($sexo) && !empty($DataNasc) && !empty($senha) && !empty($telefone) && !empty($Conselho) && !empty($Estado) && !empty($NumRegistro)){

						$u->conectar("imunize","localhost","root", "");
							if($u->msgErro == ""){
								if($u->cadastrar ($cpf, $Nome, $email, $sexo, $DataNasc,$NumRegistro,$Estado,$Conselho,$senha,$telefone)){
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