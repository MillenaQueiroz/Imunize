<?php
$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "imunize";
	//Criar a conexao
	$conn = mysqli_connect("imunize","localhost","root", "");
	
	$pesquisar = $_POST['pesquisar'];
	$result_cursos = "SELECT * FROM vacinas WHERE cpf LIKE '%$pesquisar%' ";
	$resultado_cursos = mysqli_query($conn, $result_vacinas);
	
	while($rows_cursos = mysqli_fetch_array($resultado_vacinas)){
		echo "Nome das vacinas: ".$rows_cursos['nome']."<br>";
	}
?>