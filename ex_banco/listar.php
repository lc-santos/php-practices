<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Alunos</title>
</head>
<body>

<h2>Lista de Alunos</h2>

<table border="1" width="100%">
    <tr>
        <th>Avatar</th>
        <th>RM</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Senha</th>
        <th>Sexo</th>
        <th colspan="2">Ações</th>
    </tr>

    <?php
    include 'conn.php';

    $select = "SELECT * FROM aluno";
    $result = mysqli_query($conn, $select);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($aluno = mysqli_fetch_assoc($result)) {
            $rm     = $aluno['rm'];
            $nome   = $aluno['nome'];
            $email  = $aluno['email'];
            $senha  = $aluno['senha'];
            $sexo   = $aluno['sexo'];
            $avatar = $aluno['avatar'] ? "img/" . $aluno['avatar'] : "img/default.png"; 
            ?>

            <tr>
                <td><img src="<?= $avatar ?>" width="50"></td>
                <td><?= $rm ?></td>
                <td><?= $nome ?></td>
                <td><?= $email ?></td>
                <td><?= $senha ?></td>
                <td><?= $sexo ?></td>
                <td><a href="#">Editar</a></td>
                <td><a href="#">Excluir</a></td>
            </tr>

            <?php
        }
    } else {
        echo "<tr><td colspan='8'>Nenhum aluno cadastrado.</td></tr>";
    }
    ?>
</table>

</body>
</html>
