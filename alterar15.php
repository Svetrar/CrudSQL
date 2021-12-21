<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1>Alterar Pergunta</h1>
<br>
	<a href="inserir15.php">Inserir Pergunta</a><br>
	<a href="alterar15.php">Alterar Pergunta</a><br>
	<a href="listar15.php">Listar Perguntas</a><br>
	<a href="remover15.php">Excluir Pergunta</a><br>
<br>

<?php

	$sucesso = "";
	$servidor = "localhost";
	$username = "root";
	$senha = "";
	$database = "faeterj3dawgame";
	$conn = new mysqli($servidor, $username, $senha, $database);

	if ($conn->connect_error) 
	{
		die("Conexao Falhou, avise o administrador do sistema");
	}

	if ($_SERVER["REQUEST_METHOD"] == "GET") 
	{
		$id = $_GET["id"];

		$comandoSQL = "SELECT * FROM `perguntas` where id = $id";
		$resultado = $conn->query($comandoSQL);
		$linha = $resultado->fetch_assoc();
	}

?>
	<form action="alterar15.php" method=POST>
		Pergunta: <input type=text name="pergunta" value="<?php echo $linha['pergunta'] ?>"> <br>
		pontos: <input type=text name="pontos" value="<?php echo $linha['pontos'] ?>"> <br>
		grau de difilculdade: <input type=text name="grau" value="<?php echo $linha['grauDificuldade'] ?>"> <br>
		<input type="hidden" name="id" value="<?php echo $linha['id'] ?>">
		<br><br>
		
		<input type="submit" value="Alterar Pergunta">
	</form>
<?php
	elseif ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
		$id = $_POST["id"];
		$pergunta = $_POST["pergunta"];
		$pontos = $_POST["pontos"];
		$grau = $_POST["grau"];

		$comandoSQL = "UPDATE `perguntas` SET `pergunta`='$pergunta',`pontos`='$pontos',`grauDificuldade`='$grau' WHERE id = $id";
		$resultado = $conn->query($comandoSQL);
		$sucesso = "Pergunta alterada com sucesso!";
	}
?>

<h3><?php echo $sucesso; ?></h3>
</body>
</html>