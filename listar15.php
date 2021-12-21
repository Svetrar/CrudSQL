<!DOCTYPE html>
<html>
<head></head>
<body>
	<h1>Listar Perguntas</h1>
<br>
	<a href="inserir15.php">Inserir Pergunta</a><br>
	<a href="alterar15.php">Alterar Pergunta</a><br>
	<a href="listar15.php">Listar Perguntas</a><br>
	<a href="remover15.php">Excluir Pergunta</a><br>
<br>
<table border="1px">
    <tr>
        <th>Pergunta</th>
        <th>Pontos</th>
        <th>Grau de dificuldade</th>
        <th>Ações</th>
    </tr>
<?php
	$servidor = "localhost";
	$username = "root";
	$senha = "";
	$database = "faeterj3dawgame";
	$conn = new mysqli($servidor,$username,$senha, $database);
	if ($conn->connect_error) {
		die("Conexao Falhou, avise o administrador do sistema");
	}
	$comandoSQL = "SELECT * FROM `perguntas`";
	$resultado = $conn->query($comandoSQL);
	While ($linha = $resultado->fetch_assoc()) 
	{
		echo "<tr>";
		echo "<td>" . $linha["pergunta"] . "</td>";
		echo "<td>" . $linha["pontos"] . "</td>";
		echo "<td>" . $linha["grauDificuldade"] . "</td>";
		echo "<td><a href='alterar15.php?id=" . $linha["id"] . "'>Alterar</a>";
		echo "</tr>";
	}
		?>
</table>
</body>
</html>