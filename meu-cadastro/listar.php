<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Usuários Cadastrados</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <h2>Usuários Cadastrados</h2>

    <table>
        <tr>
            <th>Código</th>
            <th>Nome</th>
            <th>Email</th>
        </tr>

        <?php
        // Inclui o arquivo de conexão
        include 'conn.php';

        // Prepara a query SQL para selecionar os dados
        // IMPORTANTE: Nunca selecione a senha para exibir na tela!
        $sql = "SELECT codigo, nome, email FROM usuarios";
        $resultado = $conn->query($sql);

        // Verifica se há resultados
        if ($resultado->num_rows > 0) {
            // Loop para exibir cada linha de resultado
            while($linha = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $linha["codigo"] . "</td>";
                echo "<td>" . $linha["nome"] . "</td>";
                echo "<td>" . $linha["email"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Nenhum usuário cadastrado</td></tr>";
        }

        // Fecha a conexão
        $conn->close();
        ?>
    </table>

    <br>
    <a href="form.html">Cadastrar Novo Usuário</a>

</body>
</html>