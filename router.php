<?php
session_start();
require_once __DIR__ . '/app/config/db.php';
require_once __DIR__ . '/app/controllers/escritores.controller.php';
require_once __DIR__ . '/app/controllers/libros.controller.php';
require_once __DIR__ . '/app/controllers/home.controller.php';
require_once __DIR__ . '/app/controllers/usuarios.controller.php';

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
$path = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
define('BASE_URL', $protocol . '://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . $path . '/');

$escritoresController = new EscritoresController($pdo);
$librosController     = new LibrosController($pdo);
$homeController       = new HomeController();
$usuariosController   = new UsuariosController($pdo);

$action = 'home';
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);
$id = $params[1] ?? null;

switch ($params[0]) {

    case 'home':
        $homeController->index();
        break;

    // ESCRITORES
    case 'escritores':
        $escritoresController->getAll();
        break;

    case 'escritor':
        if ($params[1] === 'nuevo') {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $escritoresController->insert();
            } else {
                $escritoresController->formNuevo();
            }
        } elseif ($params[1] === 'editar') {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $escritoresController->update($params[2]);
            } else {
                $escritoresController->formEditar($params[2]);
            }
        } elseif ($params[1] === 'eliminar') {
            $escritoresController->delete($params[2]);
        } elseif ($id) {
            $escritoresController->get($id);
        } else {
            $escritoresController->getAll();
        }
        break;

    // LIBROS
    case 'libros':
        $librosController->getAll();
        break;

    case 'libro':
        if ($params[1] === 'nuevo') {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $librosController->insert();
            } else {
                $librosController->formNuevo();
            }
        } elseif ($params[1] === 'editar') {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $librosController->update($params[2]);
            } else {
                $librosController->formEditar($params[2]);
            }
        } elseif ($params[1] === 'eliminar') {
            $librosController->delete($params[2]);
        } elseif ($id) {
            $librosController->get($id);
        } else {
            $librosController->getAll();
        }
        break;

    // USUARIOS
    case 'usuarios':
        $usuariosController->getAll();
        break;

    case 'usuario':
        if ($params[1] === 'nuevo') {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $usuariosController->insert();
            } else {
                $usuariosController->formNuevo();
            }
        } elseif ($params[1] === 'eliminar') {
            $usuariosController->delete($params[2]);
        }
        break;

    case 'login':
        $usuariosController->showLogin();
        break;

    case 'doLogin':
        $usuariosController->doLogin();
        break;

    case 'registro':
        $usuariosController->showRegistro();
        break;

    case 'doRegistro':
        $usuariosController->doRegistro();
        break;

    case 'logout':
        $usuariosController->logout();
        break;

    default:
        require __DIR__ . '/app/views/template/404.template.php';
        break;
}