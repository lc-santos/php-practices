<!DOCTYPE html>
 <html lang="pt-br">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    th, td {
        text-align: center;
        vertical-align: middle;
    }
</style>
 </head>
 <body>
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
        while ($aluno = mysqli_fetch_assoc($result)) {
            $rm = $aluno['rm'];
            $nome = $aluno['nome'];
            $email = $aluno['email'];
            $senha = $aluno['senha'];
            $avatar = $aluno['avatar'];
            $sexo = $aluno['sexo'];
            echo "
            <tr>
                <td><img src='img/" . $aluno['avatar'] . "' width='50'></td>

                <td>$rm</td>
                <td>$nome</td>
                <td>$email</td>
                <td>$senha</td>
                <td>$sexo</td>
                <td><a href='#'>Editar</a></td>
                <td><a href='#'>Excluir</a></td>
            </tr>";
        }
        ?>
    </table>
 </body>
 </html>