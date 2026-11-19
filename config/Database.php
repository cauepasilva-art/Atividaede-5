<?php
class Database {
    private static $conn;

    public static function conectar() {
        if (!self::$conn) {
            self::$conn = new PDO(
                "pgsql:host=192.168.10.15;port=5432;dbname=biblioteca",
                "livros",
                "livros",
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );
        }

        return self::$conn;
    }
}
?>