<?php

	 Class Vacina{
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

		public function cadastrar($cpf,$nome,$data,$NumRegistro,$validade){
			global $pdo;
			global $msgErro;
			$sql = $pdo->prepare("SELECT id_vacina FROM vacinas WHERE NumRegistro=:nr");
			$sql->bindValue(":nr",$NumRegistro);
			$sql->execute();
			if($sql->rowCount() > 0 ){
				return false;
			}else{
				$sql = $pdo ->prepare("INSERT INTO vacinas (cpf,nome,data, NumRegistro, validade) VALUES (:c, :n, :dt, :nr, :v)");
				$sql->bindValue(":nr",$NumRegistro);
				$sql->bindValue(":c",$cpf);
				$sql->bindValue(":n",$nome);
				$sql->bindValue(":dt",$data);
				$sql->bindValue(":nr",$NumRegistro);
				$sql->bindValue(":v",$validade);
				$sql-> execute();
				return true;
			}

		}

		public function consulta($cpf){
			global $pdo;
			
			$sql = $pdo ->prepare("SELECT * FROM vacinas WHERE cpf=:c");
			$cpf = $_POST['cpf'];
			
		}
	}
?>