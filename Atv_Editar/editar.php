<?php
require "conn.php";

if (!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
    echo "ID inválido!";
    exit;
}
$id = $_GET["id"];


$stmt = $conn->prepare("SELECT * FROM cadastro WHERE id = ?");
$stmt->bind_param("i", $id); 
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "Cadastro não encontrado!";
    exit;
}

$cadastro = $result->fetch_assoc();
$rm = $cadastro['rm'];
$email = $cadastro['email'];
$dataNascimento = $cadastro['data_nascimento'];
$avatarAtual = $cadastro['avatar'] ? "img/" . $cadastro['avatar'] : "img/default.png";

$stmt->close();
?>
<!doctype html>
<html lang="pt-br">

<head>
    <title>Editar Cadastro</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container mt-5">
        <h2>Editar Cadastro do RM: <?= htmlspecialchars($rm) ?></h2>
        
        <form action="update.php" method="post" enctype="multipart/form-data">

            <input type="hidden" name="id" value="<?= $id ?>">

            <div class="mb-3">
                <label for="rm" class="form-label">RM</label>
                <input type="text" class="form-control" name="rm" id="rm" value="<?= htmlspecialchars($rm) ?>" required />
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" value="<?= htmlspecialchars($email) ?>" required />
            </div>

            <div class="mb-3">
                <label for="senha" class="form-label">Nova Senha (deixe em branco para não alterar)</label>
                <input type="password" class="form-control" name="senha" id="senha" minlength="6" />
            </div>
            
            <div class="mb-3">
                <label for="dataNascimento" class="form-label">Data de Nascimento</label>
                <input type="date" class="form-control" name="dataNascimento" id="dataNascimento" value="<?= htmlspecialchars($dataNascimento) ?>" required />
            </div>

            <div class="mb-3">
                <label class="form-label">Avatar Atual:</label><br>
                <img src="<?= $avatarAtual ?>" width="100">
            </div>

            <div class="mb-3">
                <label for="avatar" class="form-label">Trocar Avatar (opcional)</label>
                <input type="file" class="form-control" id="avatar" name="avatar" accept="image/*" />
            </div>
            
            <button type="submit" class="btn btn-success">Salvar Alterações</button>
            <a href="listar.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>

</html>