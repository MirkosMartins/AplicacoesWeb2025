<?php
include 'conectar.php';

if (isset($_GET['cpf']) && is_numeric($_GET['cpf'])) {
    $cpf = $_GET['cpf'];

    $sql = "DELETE FROM pessoas WHERE cpf = $cpf";

    if (mysqli_query($conn, $sql)) {
        header("Location: index.php"); // Redireciona de volta para a página principal
        exit();
    } else {
        echo "Erro ao excluir: " . mysqli_error($conn);
    }
} else {
    echo "CPF de pessoa inválido.";
}

mysqli_close($conn);
?>
