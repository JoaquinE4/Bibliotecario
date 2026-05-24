<?php
class LibrosModel
{
    private $db;

    public function __construct($pdo)
    {
        $this->db = $pdo;
    }

    public function getAll()
    {
        $query = $this->db->prepare("SELECT l.*, e.nombre AS autor_nombre FROM libros l LEFT JOIN escritores e ON l.autor = e.id ORDER BY l.titulo ASC");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function get($id)
    {
        $query = $this->db->prepare("SELECT l.*, e.nombre AS autor_nombre FROM libros l LEFT JOIN escritores e ON l.autor = e.id WHERE l.id = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function getByAutor($autor)
    {
        $query = $this->db->prepare("SELECT * FROM libros WHERE autor = ?");
        $query->execute([$autor]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function insert($titulo, $autor, $sinopsis, $anio, $genero, $img = null)
    {
        $query = $this->db->prepare("INSERT INTO libros (titulo, autor, sinopsis, anio, genero, img) VALUES (?, ?, ?, ?, ?, ?)");
        $query->execute([$titulo, $autor, $sinopsis, $anio, $genero, $img]);
        return $this->db->lastInsertId();
    }
    public function existeLibroPorTitulo($titulo)
    {
        $query = $this->db->prepare("SELECT 1 FROM libros WHERE titulo = ? LIMIT 1");
        $query->execute([$titulo]);
        return $query->fetch();
    }

    public function update($id, $titulo, $autor, $sinopsis, $anio, $genero, $img)
    {
        $query = $this->db->prepare("UPDATE libros SET titulo = ?, autor = ?, sinopsis = ?, anio = ?, genero = ?, img = ? WHERE id = ?");
        $query->execute([$titulo, $autor, $sinopsis, $anio, $genero, $img, $id]);
        return $id;
    }

    public function delete($id)
    {
        $query = $this->db->prepare("DELETE FROM libros WHERE id = ?");
        $query->execute([$id]);
        return $id;
    }
}