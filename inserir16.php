<?php
    $pergunta = $_GET["pergunta"];
    $pontos = $_GET["pontos"];
    $grau = $_GET["grau"];


    $servidor = "localhost";
    $username = "root";
    $senha = "";
    $database = "faeterj3dawgame";
	
    $conn = new mysqli($servidor,$username,$senha, $database);
    if ($conn->connect_error) {
        die("Conexao Falhou, avise o administrador do sistema");
    }
    $comandoSQL = "INSERT INTO `perguntas`(`pergunta`, `pontos`, `grauDificuldade`) VALUES ('$pergunta',$pontos,'$grau')";
    $result = $conn->query($comandoSQL);
    $sucesso = "Pergunta Inserida com sucesso!";

    $comandoSQL = "SELECT from `perguntas` where pergunta = '$pergunta'";
    $result = $conn->query($comandoSQL);
    $jPergunta = json_encode($result->fetch_assoc(), JSON_UNESCAPED_UNICODE);

    $resposta = "{\"pergunta\":\"$pergunta\",\"pontos\":\"$pontos\",\"grau\":\"$grau\"}";
    $resposta2 = "{\"pergunta\":\"" . $pergunta . "\",\"pontos\":\"" . $pontos . "\",\"grau\":\"" . $grau . "\"}";

    echo $jPergunta;
?>