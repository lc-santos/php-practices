<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Alunos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/listar.css"/>

</head>
<body>

<h2>Lista de Cadastros</h2>

<table class="table table-bordered table-dark">
    <tr>
        <th scope="col">Avatar</th>
        <th scope="col">ID</th>
        <th scope="col">RM</th>
        <th scope="col">Email</th>
        <th scope="col">Data de Nascimento</th>
        <th scope="col" colspan="2">Ações</th>
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
                <td><a href="editar.php?id=<?= $id ?>" class="btn btn-primary">Editar</a></td>
                <td><a href="#" class="btn btn-secondary">Excluir</a></td>
            </tr>

            <?php
        }
    } else {
        echo "<tr><td colspan='8'>Nenhum Cadastro.</td></tr>";
    }
    ?>
</table>

<br>
<button><a href="form.html" class="btn btn-primary">Cadastrar Novo</a></button>
 <script>
    // Validação Bootstrap 5 customizada
    (() => {
      'use strict';
      const forms = document.querySelectorAll('.needs-validation');
      Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
          if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    })();
  </script>

</body>
</html>
