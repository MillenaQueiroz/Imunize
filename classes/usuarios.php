<?php

	 Class Usuario{
		private $pdo;
		public $msgErro="";

		public function conectar($nome, $host, $usuario, $senha){
			global $pdo;
			global $msgErro;
			try {
				$pdo= new PDO("mysql:dbname=".$nome."; host=".$host,$usuario,$senha);
			} catch (PDOException $nr) {
				$msgErro= $nr->getMessage();
			}
		}

		public function cadastrar($cpf,$Nome,$email,$sexo,$DataNasc,$NumRegistro,$Estado,$Conselho,$senha,$telefone){
			global $pdo;
			global $msgErro;
			$sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE NumRegistro=:nr");
			$sql->bindValue(":nr",$NumRegistro);
			$sql->execute();
			if($sql->rowCount() > 0 ){
				return false;
			}else{
				$sql = $pdo ->prepare("INSERT INTO usuarios (cpf,Nome,email,sexo,DataNasc,NumRegistro,Estado,Conselho,senha,telefone) VALUES (:c, :n, :e, :s, :dt, :nr, :es, :co, :se, :tel)");
				$sql->bindValue(":nr",$NumRegistro);
				$sql->bindValue(":c",$cpf);
				$sql->bindValue(":n",$Nome);
				$sql->bindValue(":e",$email);
				$sql->bindValue(":s",$sexo);
				$sql->bindValue(":dt",$DataNasc);
				$sql->bindValue(":nr",$NumRegistro);
				$sql->bindValue(":es",$Estado);
				$sql->bindValue(":co",$Conselho);
				$sql->bindValue(":se",md5($senha));
				$sql->bindValue(":tel",$telefone);
				$sql-> execute();
				return true;
			}

		}

		public function logar($NumRegistro,$senha){
			global $pdo;
			global $msgErro;
			$sql = $pdo ->prepare("SELECT id_usuario FROM usuarios WHERE NumRegistro=:nr AND senha=:se");
			$sql->bindValue(":nr",$NumRegistro);
			$sql->bindValue(":se",md5($senha));
			$sql->execute();
			if($sql->rowCount() > 0 ){
				$dado= $sql->fetch();
				session_start();
				$_SESSION ['id_usuario'] = $dado['id_usuario'];
				return true;
			}else{
				return false;
			}
		}
	}

?>