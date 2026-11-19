<?php
require_once __DIR__ . '/../repositories/LivroRepository.php';

if ($_POST) {
    $livro = new Livro(
        $_POST['titulo'],
        $_POST['autor'],
        $_POST['ano']
    );

    (new LivroRepository())->criar($livro);
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Novo livro</title>
</head>
<body>
    <h1>Novo livro</h1>
    <nav>
        <a href="index.php">Voltar</a>
    </nav>

    <form action="" method="post">
        <input type="text" name="titulo" id="titulo" placeholder="Título" required><br>
        <input type="text" name="autor" id="autor" placeholder="Autor" required><br>
        <input type="number" name="ano" id="ano" placeholder="Ano" required><br>
        <button type="submit">Salvar</button>
    </form>
</body>
</html>