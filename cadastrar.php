<?php
include 'pagina.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cpf = $_POST['cpf'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $sql = "INSERT INTO pessoas (cpf,nome, email,telefone) 
	VALUES ('$cpf','$nome', '$email','$telefone');";

    if (mysqli_query($conn, $sql)) {
        header("Location: formulario.php"); // Redireciona de volta para a página principal
        exit();
    } else {
        echo "Erro ao cadastrar: " . mysqli_error($conn);
    }
	}
mysqli_close($conn);
?>
