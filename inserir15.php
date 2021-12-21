<?php
	$sucesso = "";
	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
		$pergunta = $_POST["pergunta"];
		$pontos = $_POST["pontos"];
		$grau = $_POST["grau"];

		$servidor = "localhost";
		$username = "root";
		$senha = "";
		$database = "faeterj3dawgame";
		$conn = new mysqli($servidor,$username,$senha, $database);
		
			if ($conn->connect_error) 
			{
				die("Conexao Falhou, avise o administrador do sistema");
			}

		$comandoSQL = "INSERT INTO `perguntas`(`pergunta`, `pontos`, `grauDificuldade`) VALUES ('$pergunta',$pontos,'$grau')";
		$result = $conn->query($comandoSQL);
		$sucesso = "Pergunta Inserida com sucesso!";
	}
?>
<!DOCTYPE html>
<html>
<head></head>
<body>
	<h1>Inserir Pergunta</h1>
<br>
	<a href="inserir15.php">Inserir Pergunta</a><br>
	<a href="alterar15.php">Alterar Pergunta</a><br>
	<a href="listar15.php">Listar Perguntas</a><br>
	<a href="remover15.php">Excluir Pergunta</a><br>
<br>

	<h3><?php echo $sucesso; ?></h3>
	
	<form action="inserir15.php" method=POST>
	
	Pergunta: <input type=text name="pergunta"> <br>
	pontos: <input type=text name="pontos"> <br>
	grau de difilculdade: <input type=text name="grau"> <br>
	<br><br>
	
	<input type="submit" value="Inserir">
	
	</form>

</body>
</html>