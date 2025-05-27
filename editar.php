<?php
include 'conectar.php';

$id = "";
$nome = "";
$email = "";
$telefone = "";
// && is_numeric($_GET['cpf'])
if (isset($_GET['cpf'])) {
    $cpf = $_GET['cpf'];

    $sql = "SELECT cpf, nome, email, telefone
	FROM pessoas WHERE cpf = $cpf;";
    $resultado = mysqli_query($conn, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        $row = mysqli_fetch_assoc($resultado);
        $nome = $row['nome'];
        $email = $row['email'];
		$telefone = $row['telefone'];
    } else {
        echo "Usuário não encontrado.";
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cpf = $_POST['cpf'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
	$telefone= $_POST['telefone'];

    $sql = "UPDATE pessoas SET nome = 
	'$nome', email = '$email', telefone=$telefone
	WHERE cpf = $cpf;";

    if (mysqli_query($conn, $sql)) {
        header("Location: formulario.php"); // Redireciona de volta para a página principal
        exit();
    } else {
        echo "Erro ao atualizar: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>Editar Usuário</h1>

        <form action="editar.php" method="POST" class="form-add">
            <input type="hidden" name="cpf" value="<?php echo htmlspecialchars($cpf	); ?>">

            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($nome); ?>" required>

            <label for="email">Email:</label>
            <input type="text" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>

            <label for="telefone">Telefone:</label>
            <input type="text" id="telefone" name="telefone" value="<?php echo htmlspecialchars($telefone); ?>" required>



            <button type="submit">Atualizar</button>
            <a href="formulario.php" class="btn-back">Cancelar</a>
        </form>
    </div>
</body>
</html>