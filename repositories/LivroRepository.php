<?php

require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/Livro.php';
require_once __DIR__ . '/../interfaces/RepositoryInterface.php';

class LivroRepository implements RepositoryInterface {
    private $conn;

    public function __construct() {
        $this->conn = Database::conectar();
    }

    public function criar($livro) {
        $sql = "INSERT INTO livros (titulo, autor, ano) VALUES (:t, :au, :an)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':t'  => $livro->getTitulo(),
            ':au' => $livro->getAutor(),
            ':an' => $livro->getAno()
        ]);
    }

    public function listar() {
        $stmt = $this->conn->query("SELECT * FROM livros ORDER BY id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id) {
        $stmt = $this->conn->prepare("SELECT * FROM livros WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizar($id, $objeto) {
        $sql = "UPDATE livros SET titulo = :t, autor = :au, ano = :an WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':t'  => $objeto->getTitulo(),
            ':au' => $objeto->getAutor(),
            ':an' => $objeto->getAno(),
            ':id' => $id
        ]);
    }

    public function excluir($id) {
        $sql = "DELETE FROM livros WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
    }
}
?>