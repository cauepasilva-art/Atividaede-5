<?php
require_once __DIR__ . '/../repositories/LivroRepository.php';

$repo = new LivroRepository();
$livros = $repo->listar();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de livros</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 40px;
        }

        nav {
            margin-right: 15px;
            text-decoration: none;
            font-weight: bold;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
        }

        th {
            background: #eee;
        }
    </style>
</head>
<body>
    <h1>Sistema de cadastro de livros</h1>
    <nav>
        <a href="index.php">Listar Livros</a>
        <a href="criar.php">Novo Livro</a>
    </nav>
    <table>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Ano</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($livros as $l): ?>
            <tr>
                <td><?= $l['id'] ?></td>
                <td><?= $l['titulo'] ?></td>
                <td><?= $l['autor'] ?></td>
                <td><?= $l['ano'] ?></td>
                <td>
                    <a href="editar.php?id=<?= $l['id'] ?>">editar</a>
                    |
                    <a href="excluir.php?id=<?= $l['id'] ?>" onclick="return confirm('Deseja excluir?')">excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>