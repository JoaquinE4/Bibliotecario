<?php
require_once __DIR__ . '/../models/usuarios.model.php';
require_once __DIR__ . '/../views/usuarios.view.phtml';

class UsuariosController
{
    private $model;
    private $view;

    public function __construct($pdo)
    {
        $this->model = new UsuariosModel($pdo);
        $this->view  = new UsuariosView();
    }

    public function getAll($req)
    {
        $usuarios = $this->model->getAll();
        $this->view->renderAll($req, $usuarios);
    }

    public function formNuevo($req)
    {
        $this->view->renderForm($req);
    }

    public function insert($req)
    {
        $usuario = $_POST['usuario'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        if (empty($usuario) || empty($email) || empty($password)) {
            return $this->view->renderForm($req, 'Todos los campos son obligatorios');
        }
        if ($this->model->existeUsuario($usuario)) {
            return $this->view->renderRegistro($req, 'El nombre de usuario ya está en uso');
        }
        if ($this->model->existeEmail($email)) {
            return $this->view->renderRegistro($req, 'El email ya está registrado');
        }

        $rol = "user";
        $resultado = $this->model->insert($usuario, $email, $password, $rol);
        if (!$resultado) return $this->view->renderForm($req, 'El usuario o email ya existe');
        header('Location: ' . BASE_URL . 'usuarios');
    }

    public function delete($req, $id)
    {
        $this->model->delete($id);
        header('Location: ' . BASE_URL . 'usuarios');
    }

    public function showLogin($req)
    {
        $this->view->renderLogin($req);
    }

    public function doLogin($req)
    {
        $usuarioInput = trim($_POST['usuario'] ?? '');
        $passwordInput = $_POST['password'] ?? '';

        if (empty($usuarioInput) || empty($passwordInput)) {
            return $this->view->renderLogin($req, 'Usuario y contraseña son obligatorios');
        }

        $usuario = $this->model->verificarLogin($usuarioInput, $passwordInput);

        if ($usuario) {
            $_SESSION['id'] = $usuario->id;
            $_SESSION['usuario'] = $usuario->usuario;
            $_SESSION['nombre'] = $usuario->nombre;
            $_SESSION['email'] = $usuario->email;
            $_SESSION['rol'] = $usuario->rol;
            header('Location: ' . BASE_URL . 'home');
            exit;
        }

        $this->view->renderLogin($req, 'Usuario o contraseña incorrectos');
    }

    public function showRegistro($req)
    {
        $this->view->renderRegistro($req);
    }

    public function doRegistro($req)
    {
        $usuario = trim($_POST['usuario'] ?? '');
        $email   = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        if (empty($usuario) || empty($email) || empty($password)) {
            return $this->view->renderRegistro($req, 'Todos los campos son obligatorios');
        }
        if (strlen($password) < 5) {
            return $this->view->renderRegistro($req, 'La contraseña debe tener al menos 5 caracteres');
        }

        if ($this->model->existeUsuario($usuario)) {
            return $this->view->renderRegistro($req, 'El nombre de usuario ya está en uso');
        }
        if ($this->model->existeEmail($email)) {
            return $this->view->renderRegistro($req, 'El email ya está registrado');
        }


        $resultado = $this->model->insert($usuario, $email, $password);
        if ($resultado) {
            header('Location: ' . BASE_URL . 'login');
            exit;
        }

        $this->view->renderRegistro($req, 'Error al registrar, intente más tarde');
    }

    public function logout()
    {
        session_destroy();
        header('Location: ' . BASE_URL . 'login');
    }
}