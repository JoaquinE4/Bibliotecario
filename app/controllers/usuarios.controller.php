<?php
require_once __DIR__ . '/../models/usuarios.model.php';
require_once __DIR__ . '/../views/usuarios.view.php';

class UsuariosController {
    private $model;
    private $view;

    public function __construct($pdo) {
        $this->model = new UsuariosModel($pdo);
        $this->view  = new UsuariosView();
    }

    public function getAll() {
        $usuarios = $this->model->getAll();
        $this->view->renderAll($usuarios);
    }

    public function formNuevo() {
        $this->view->renderForm();
    }

    public function insert() {
        $usuario  = trim($_POST['usuario'] ?? '');
        $email    = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        $rol      = $_POST['rol'] ?? 'user';

        if (empty($usuario) || empty($email) || empty($password)) {
            return $this->view->renderForm('Todos los campos son obligatorios');
        }

    
        $resultado = $this->model->insert($usuario, $email, $password, $rol);
        if (!$resultado) return $this->view->renderForm('El usuario o email ya existe');

        header('Location: ' . BASE_URL . 'usuarios');
        exit();
    }

    public function delete($id) {
        $this->model->delete($id);
        header('Location: ' . BASE_URL . 'usuarios');
        exit();
    }


    public function showLogin() {
        $this->view->renderLogin();
    }

    public function doLogin() {
        $email    = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        if (empty($email) || empty($password)) {
            return $this->view->renderLogin('Email y contraseña son obligatorios');
        }

        $usuario = $this->model->verificarLogin($email, $password);

        if ($usuario) {
            $_SESSION['usuario_id']     = $usuario->id;
            $_SESSION['usuario_nombre'] = $usuario->usuario;
            $_SESSION['usuario_email']  = $usuario->email;
            $_SESSION['usuario_rol']    = $usuario->rol;
            header('Location: ' . BASE_URL . 'home');
            exit();
        }

        $this->view->renderLogin('Email o contraseña incorrectos');
    }

    public function showRegistro() {
        $this->view->renderRegistro();
    }

    public function doRegistro() {
        $usuario  = trim($_POST['usuario'] ?? '');
        $email    = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        if (empty($usuario) || empty($email) || empty($password)) {
            return $this->view->renderRegistro('Todos los campos son obligatorios');
        }

        if (strlen($password) < 6) {
            return $this->view->renderRegistro('La contraseña debe tener al menos 6 caracteres');
        }

        $resultado = $this->model->insert($usuario, $email, $password);
        if ($resultado) {
            header('Location: ' . BASE_URL . 'login');
            exit();
        }

        $this->view->renderRegistro('El email o usuario ya existe');
    }

    public function logout() {
        session_destroy();
        header('Location: ' . BASE_URL . 'login');
        exit();
    }
}