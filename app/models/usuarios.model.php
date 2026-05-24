<?php

class UsuariosModel
{
    private $db;

    public function __construct($pdo)
    {
        $this->db = $pdo;
    }

    public function getAll()
    {
        $query = $this->db->prepare("SELECT id, usuario, email, rol FROM usuarios ORDER BY usuario");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function get($id)
    {
        $query = $this->db->prepare("SELECT id, usuario, email, rol FROM usuarios WHERE id = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function getByEmail($email)
    {
        $query = $this->db->prepare("SELECT * FROM usuarios WHERE email = ?");
        $query->execute([$email]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function insert($usuario, $email, $password, $rol = 'user')
    {
        $password_hash = password_hash($password, PASSWORD_BCRYPT);
        $query = $this->db->prepare("INSERT INTO usuarios (usuario, email, password, rol) VALUES (?, ?, ?, ?)");
        return $query->execute([$usuario, $email, $password_hash, $rol]);
    }

    public function delete($id)
    {
        $query = $this->db->prepare("DELETE FROM usuarios WHERE id = ?");
        return $query->execute([$id]);
    }

    public function verificarLogin($usuarioInput, $passwordInput)
    {
        $query = $this->db->prepare("SELECT * FROM usuarios WHERE usuario = ?");
        $query->execute([$usuarioInput]);
        $usuario = $query->fetch(PDO::FETCH_OBJ);

        if ($usuario && password_verify($passwordInput, $usuario->password)) {
            unset($usuario->password);
            return $usuario;
        }

        return false;
    }
    public function existeUsuario($usuario)
    {
        $query = $this->db->prepare("SELECT 1 FROM usuarios WHERE usuario = ? LIMIT 1");
        $query->execute([$usuario]);
        return $query->fetch();
    }
    public function existeEmail($email)
    {
        $query = $this->db->prepare("SELECT 1 FROM usuarios WHERE email = ? LIMIT 1");
        $query->execute([$email]);
        return $query->fetch();
    }
}