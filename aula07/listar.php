<html lang="pt-br">
<body>
    <table>
    <tr>
        <th>Senha</th>
        <th>Sexo</th>
        <th colspan="2"></th>
    </tr>


<?php

include 'conn.php';

    $select = "SELECT * FROM aluno";
    $result = mysqli_query($conn, $select);

    while ($aluno = mysqli_fetch_assoc($result)) {

        $rm = $aluno['rm']
        $nome = $aluno['nome']
        $email = $aluno['email']
        $senha = $aluno['senha']
        $avatar = $aluno['avatar']
        $sexo = $aluno['sexo']
        echo "
        <tr>
            <td><img src="$avatar"></td>
            <td>$rm</td>
            <td>$nome</td>
            <td>$email</td>
            <td>$senha</td>
            <td>$sexo</td>
        </tr>
        "
    }




?>

</body>

</html>