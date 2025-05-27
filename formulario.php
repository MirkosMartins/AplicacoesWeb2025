<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHP Simples</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>Gerenciamento de Usuários</h1>

        <h2>Adicionar Novo Usuário</h2>
        <form action="cadastrar.php" method="POST" class="form-add">
            <label for="cpf">CPF:</label>
            <input type="text" id="cpf" name="cpf" required>

            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="telefone">Telefone:</label>
            <input type="text" id="telefone" name="telefone" required>

            <button type="submit">Cadastrar</button>
        </form>

        <h2>Lista de Usuários</h2>
        <table class="user-table">
            <thead>
                <tr>
                    <th>CPF</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'conectar.php';

                $sql = "SELECT cpf, nome, email, telefone FROM pessoas ORDER BY cpf DESC";
                $resultado = mysqli_query($conn, $sql);

                if (mysqli_num_rows($resultado) > 0) {
                    while ($row = mysqli_fetch_assoc($resultado)) {
                        echo "<tr>";
                        echo "<td>" . $row['cpf'] . "</td>";
                        echo "<td>" . $row['nome'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['telefone'] . "</td>";
                        echo "<td>";
                        echo "<a href='editar.php?cpf=" . $row['cpf'] . "' class='btn-action btn-edit'>Editar</a>";
                        echo "<a href='excluir.php?cpf=" . $row['cpf'] . "' class='btn-action btn-delete' onclick='return confirm(\"Tem certeza que deseja excluir este usuário?\")'>Excluir</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Nenhum usuário cadastrado.</td></tr>";
                }

                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>