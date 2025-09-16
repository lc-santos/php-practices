<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Alunos</title>
</head>
<body>

<h2>Lista de Cadastros</h2>

<table border="1" width="100%">
    <tr>
        <th>Avatar</th>
        <th>ID</th>
        <th>RM</th>
        <th>Email</th>
        <th>Data de Nascimento</th>
        <th colspan="2">Ações</th>
    </tr>

    <?php
    include 'conn.php';

    $select = "SELECT * FROM cadastro";
    $result = mysqli_query($conn, $select);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($cadastro = mysqli_fetch_assoc($result)) {

            $id     = $cadastro['id'];
            $rm     = $cadastro['rm'];
            $email  = $cadastro['email'];
            $senha  = $cadastro['senha'];
            $avatar = $cadastro['avatar'] ? "img/" . $cadastro['avatar'] : "img/default.png"; 
            $dataNascimento = $cadastro['data_nascimento'];
            
            ?>

            <tr>
                <td><img src="<?= $avatar ?>" width="50"></td>
                <td><?= $id ?></td>
                <td><?= $rm ?></td>
                <td><?= $email ?></td>
                <td><?= $dataNascimento ?></td>
                <td><a href="editar.php?id=<?= $id ?>" class="btn btn-warning">Editar</a></td>
                <td><a href="#">Excluir</a></td>
            </tr>

            <?php
        }
    } else {
        echo "<tr><td colspan='8'>Nenhum Cadastro.</td></tr>";
    }
    ?>
</table>

<br>
<a href="form.html">Cadastrar Novo</a>

</body>
</html>
