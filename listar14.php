<!DOCTYPE html>
<html>
<head>
</head>

<body>
	<a href="home14.php">Home</a><br>
	<a href="alterar14.php">Alterar Aluno</a><br>
	<a href="listar14.php">Listar Alunos</a><br>
	<a href="matriculaAlerar14.php">Excluir Aluno</a><br>
	<a href="matriculaListar14.php">Detalhe de Aluno</a><br>

<br><br>

	<h1>Listar Alunos</h1>
	
	<th>NOME</th>   
	<th>MATRÍCULA</th>  
	<th>EMAIL</th>  
	<th>DATA DE NASCIMENTO</th>  
	<th>CPF</th>  
	<th>TELEFONE</th>
	<th>ENDEREÇO</th>
	<th>CIDADE</th>   
	<th>ESTADO</th>
	<th>CEP</th>
	<th>AÇÕES</th>     
	</tr>

	<?php


	$servidor = "Localhost"; 

	$usuario = "root";

	$senha = ""; 

	$nomeBanco = "3daw"; 

	$conn = new mysqli($servidor, $usuario, $senha, $nomeBanco);

	if ($conn->connect_error)
	{
		die ("Falha na conexão com o banco de dados" . $conn->connect_error ); 
	}



	$comandoSQL = "SELECT * FROM `alunos3daw`"; 
	$result = $conn->query($comandoSQL);

	$i=0;

	while ($linha = $result->fetch_assoc())
	{
		echo "<tr>";
		echo "<td>" . $linha["Nome"] . "</td>";
		echo "<td>" . $linha["Matrícula"] . "</td>";
		echo "<td>" . $linha["Email"] . "</td>";
		echo "<td>" . $linha["Data de Nascimento"] . "</td>";
		echo "<td>" . $linha["CPF"] . "</td>";
		echo "<td>" . $linha["Telefone"] . "</td>";
		echo "<td>" . $linha["Endereço"] . "</td>";
		echo "<td>" . $linha["Cidade"] . "</td>";
		echo "<td>" . $linha["Estado"] . "</td>";
		echo "<td>" . $linha["CEP"] . "</td>";
		echo "<td><a href= 'alterar14.php?matricula=" . $linha["Matrícula"] . "'>Alterar</a></td>";
		echo "</tr>";
		
		$i++;
	}
	echo "</table>";  
	?>

</body>
</html>
