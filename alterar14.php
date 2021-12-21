<?php
	if ($_SERVER["REQUEST_METHOD"] == "GET") 
	{
		$matricula = $_GET["matricula"];
		
		$sucesso=0;

		$servidor = "Localhost";
		
		$usuario = "root";
		
		$senha = ""; 
		
		$nomeBanco = "3daw";  
		
		$conn = new mysqli($servidor, $usuario, $senha, $nomeBanco); 
		

		if ($conn->connect_error)
		{
			die ("Falha na conexão com o banco de dados" . $conn->connect_error );
		}

		$comandoSQL = "SELECT * FROM `alunos3daw` where Matrícula = '$matricula'";
		$result = $conn->query($comandoSQL);
		
		$linha = $result->fetch_assoc();
	 
		if ($linha["Matrícula"] != $matricula)
		{
			echo "<script>alert ('Matrícula não encontrada'); window.location='matriculaAltera14.php';</script>";
		}
	}
	else
	{
		$nome = $_POST["nome"];
		
		$matricula = $_POST["matricula"];
		
		$email = $_POST["email"];
		
		$dtNasc = $_POST["dtNasc"];
		
		$cpf = $_POST["cpf"];
		
		$telefone = $_POST["telefone"];
		
		$endereco = $_POST["endereco"];
		
		$cidade = $_POST["cidade"];
		
		$estado = $_POST["estado"];
		
		$cep = $_POST["cep"];

		$servidor = "Localhost";
		
		$usuario = "root";
		
		$nomeBanco = "3daw"; 
		
		$conn = new mysqli($servidor, $usuario, $senha, $nomeBanco); 

		if ($conn->connect_error)
		{
			die ("Falha na conexão com o banco de dados" . $conn->connect_error );
		}

		$comandoSQL = "UPDATE `3daw cadastro de alunos` SET `Nome`='$nome',`Email`='$email',`Data de Nascimento`='$dtNasc',`CPF`='$cpf',
						`Telefone`='$telefone',`Endereço`='$endereco',`Cidade`='$cidade',`Estado`='$estado',`CEP`='$cep' WHERE  Matrícula = '$matricula'";
		$result = $conn->query($comandoSQL);

		echo  "<script>alert('Os dados do Aluno(a): $nome foram alterados com Sucesso!');</script>";

		echo "<script>window.location='alterar14.php?matricula=$matricula';</script>";
	}
?>

<!DOCTYPE html>
<html>
<head>
    <body>

	<a href="home14.php">Home</a><br>
	<a href="alterar14.php">Alterar Aluno</a><br>
	<a href="listar14.php">Listar Alunos</a><br>
	<a href="matriculaAlerar14.php">Excluir Aluno</a><br>
	<a href="matriculaListar14.php">Detalhe de Aluno</a><br> 
	<br><br>


	<form action="alterar14.php" method=GET>
	
	Digite o número da matricula: <input type=number name="matricula" required>
	<br><br>
	<input type="submit" value="Procurar"><br><br>
	
	</form>

<h3>Dados do aluno(a): <?php echo $linha["Nome"];?> </h3>
		   
	<form action="alterar14.php" method=POST>
	
	Matricula  <input type=number name='matricula' value='<?php echo $linha["Matrícula"];?>' readonly="readonly"> <br>
	Nome: <input type=text name='nome' value='<?php echo $linha["Nome"];?>'> <br>
	Email: <input type=text name='email' value='<?php echo $linha["Email"];?>'> <br>
	Data de Nascimento: <input type=text name='dtNasc' value='<?php echo $linha["Data de Nascimento"];?>'> <br>
	CPF: <input type=text name='cpf' value='<?php echo $linha["CPF"];?>'> <br>
	Telefone:<input type=text name='telefone' value='<?php echo $linha["Telefone"];?>'> <br>
	Endereço: <input type=text name='endereco' value='<?php echo $linha["Endereço"];?>'> <br>
	Cidade: <input type=text name='cidade' value='<?php echo $linha["Cidade"];?>'> <br>
	Estado: <input type=text name='estado' value='<?php echo $linha["Estado"];?>'> <br>
	CEP: <input type=text name='cep' value='<?php echo $linha["CEP"];?>'> <br>
	<br><br>
	
	<input type="submit" value="Alterar">
	
	</form>
</body>
</head>
</html>
