<?php 
require_once __DIR__ . '/../repositories/LivroRepository.php';
$repo = new LivroRepository();

if ($_POST) {
    $livro = new Livro(
        $_POST['titulo'],
        $_POST['autor'],
        $_POST['ano']
    );
    $repo->atualizar($_POST['id'], $livro);
    header("Location: index.php");
    exit;
}

$livro = $repo->buscarPorId($_GET['id']);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar livro</title>
</head>
<body>
    <h1>Editar livro</h1>
    <nav>
        <a href="index.php">Voltar</a>
    </nav>

    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $livro['id'] ?>">
        <input type="text" name="titulo" id="titulo" value="<?= $livro['titulo'] ?>" required><br>
        <input type="text" name="autor" id="autor" value="<?= $livro['autor'] ?>" required><br>
        <input type="number" name="ano" id="ano" value="<?= $livro['ano'] ?>" required><br>
        <button type="submit">Atualizar</button>
    </form>
</body>
</html>