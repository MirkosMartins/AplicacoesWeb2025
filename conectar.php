<?php

$servidor = "localhost"; // Onde o MySQL está rodando
$usuario = "root";     // Seu usuário do MySQL
$senha = "";           // Sua senha do MySQL (deixe em branco se não tiver)
$dbname = "banco";   // Nome do banco de dados que criamos

// Conexão com o banco de dados
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

// Verifica a conexão
if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}
 //echo "Conexão bem-sucedida!"; // Apenas para testar a conexão, remova em produção

//echo "Está certo!";

?>