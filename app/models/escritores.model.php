<?php
class EscritoresModel
{
    private $db;

    public function __construct($pdo)
    {
        $this->db = $pdo;
    }

    public function getAll($orden = 'ASC')
    {
        $query = $this->db->prepare("SELECT * FROM escritores ORDER BY fecha_nac $orden");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function get($id)
    {
        $query = $this->db->prepare("SELECT * FROM escritores WHERE id = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function getByOrigen($origen, $orden)
    {
        $query = $this->db->prepare("SELECT * FROM escritores WHERE origen= ? ORDER BY fecha_nac $orden");
        $query->execute([$origen]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getOrigenes()
    {
        $query = $this->db->prepare("SELECT DISTINCT origen FROM escritores ORDER BY origen ASC");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function insert($nombre, $descripcion, $fecha_nac, $origen, $img)
    {
        $query = $this->db->prepare("INSERT INTO escritores (nombre, descripcion, fecha_nac, origen, img) VALUES (?, ?, ?, ?,?)");
        $query->execute([$nombre, $descripcion, $fecha_nac, $origen, $img]);
        return $this->db->lastInsertId();
    }

    public function existeEscritorPorNombre($nombre)
    {
        $query = $this->db->prepare("SELECT 1 FROM escritores WHERE nombre = ? LIMIT 1");
        $query->execute([$nombre]);
        return $query->fetch();
    }

    public function update($id, $nombre, $descripcion, $fecha_nac, $origen, $img)
    {
        $query = $this->db->prepare("UPDATE escritores SET nombre = ?, descripcion = ?, fecha_nac = ?, origen = ? , img = ? WHERE id = ?");
        $query->execute([$nombre, $descripcion, $fecha_nac, $origen, $img, $id]);
        return $id;
    }

    public function delete($id)
    {
        $query = $this->db->prepare("DELETE FROM escritores WHERE id = ?");
        $query->execute([$id]);
        return $query->rowCount();
    }
}