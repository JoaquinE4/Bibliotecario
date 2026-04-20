<?php
class EscritoresModel {
    private $db;

    public function __construct($pdo) {
        $this->db = $pdo;
    }

    public function getAll() {
        $query = $this->db->query("SELECT * FROM escritores ORDER BY nombre ASC");
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function get($id) {
        $query = $this->db->prepare("SELECT * FROM escritores WHERE id = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function insert($nombre, $descripcion, $fecha_nac, $origen) {
        $query = $this->db->prepare("INSERT INTO escritores (nombre, descripcion, fecha_nac, origen) VALUES (?, ?, ?, ?)");
        $query->execute([$nombre, $descripcion, $fecha_nac, $origen]);
        return $this->db->lastInsertId();
    }

    public function update($id, $nombre, $descripcion, $fecha_nac, $origen) {
        $query = $this->db->prepare("UPDATE escritores SET nombre = ?, descripcion = ?, fecha_nac = ?, origen = ? WHERE id = ?");
        $query->execute([$nombre, $descripcion, $fecha_nac, $origen, $id]);
        return $query->rowCount();
    }

    public function delete($id) {
        $query = $this->db->prepare("DELETE FROM escritores WHERE id = ?");
        $query->execute([$id]);
        return $query->rowCount();
    }
}
?>