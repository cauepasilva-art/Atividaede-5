<?php 
require_once __DIR__ . '/../repositories/LivroRepository.php';
(new LivroRepository())->excluir($_GET['id']);
header("Location: index.php");
?>