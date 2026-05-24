<?php
require_once __DIR__ . '/app/config/config.php';
require_once __DIR__ . '/app/controllers/escritores.controller.php';
require_once __DIR__ . '/app/controllers/libros.controller.php';
require_once __DIR__ . '/app/controllers/home.controller.php';
require_once __DIR__ . '/app/controllers/usuarios.controller.php';
require_once __DIR__ . '/app/middleware/session.middleware.php';
require_once __DIR__ . '/app/middleware/guard.middleware.php';
session_start();

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
$path = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
define('BASE_URL', $protocol . '://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . $path . '/');

$escritoresController = new EscritoresController($pdo);
$librosController     = new LibrosController($pdo);
$homeController       = new HomeController();
$usuariosController   = new UsuariosController($pdo);

$req = new stdClass();
$req = (new SessionMiddleware())->run($req);

$urlCompleta = $_SERVER['REQUEST_URI'];
$urlLimpia = strtok($urlCompleta, '?');

$req->currentUrl = $urlLimpia;
$post = $_SERVER['REQUEST_METHOD'] === 'POST';

$action = 'home';
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);
$id = $params[1] ?? null;

switch ($params[0]) {

    case 'categorias':
        $escritoresController->getAll($req);
        break;
    case 'home':
        $homeController->index($req);
        break;

    // ESCRITORES
    case 'escritores':
        if (isset($params[1])) {

            $escritoresController->getAll($req, $params[1]);
        } else {
            $escritoresController->getAll($req);
        }
        break;

    case 'escritor':


        if ($params[1] === 'nuevo') {
            $req =  (new GuardMiddleware())->run($req);

            if ($post) {
                $escritoresController->insert($req);
            } else {
                $escritoresController->formNuevo($req);
            }
        } elseif ($params[1] === 'editar') {
            $req =  (new GuardMiddleware())->run($req);

            if ($post) {
                $escritoresController->update($req, $params[2]);
            } else {
                $escritoresController->formEditar($req, $params[2]);
            }
        } elseif ($params[1] === 'eliminar') {
            $req =  (new GuardMiddleware())->run($req);

            $escritoresController->delete($params[2]);
        } elseif ($id) {
            $escritoresController->get($req, $id);
        } else {
            $escritoresController->getAll($req);
        }
        break;

    // LIBROS
    case 'libros':
        $librosController->getAll($req);
        break;

    case 'libro':

        if ($params[1] === 'nuevo') {
            $req =  (new GuardMiddleware())->run($req);

            if ($post) {
                $librosController->insert($req);
            } else {
                $librosController->formNuevo($req);
            }
        } elseif ($params[1] === 'editar') {
            $req =  (new GuardMiddleware())->run($req);

            if ($post) {
                $librosController->update($req, $params[2]);
            } else {
                $librosController->formEditar($req, $params[2]);
            }
        } elseif ($params[1] === 'eliminar') {
            $req =  (new GuardMiddleware())->run($req);

            $librosController->delete($params[2]);
        } elseif ($id) {
            $librosController->get($req, $id);
        } else {
            $librosController->getAll($req);
        }
        break;

    // USUARIOS
    case 'usuarios':
        $req =  (new GuardMiddleware())->run($req);
        $usuariosController->getAll($req);
        break;

    case 'usuario':
        if ($params[1] === 'nuevo') {
            if ($post) {
                $usuariosController->insert($req);
            } else {
                $usuariosController->formNuevo($req);
            }
        } elseif ($params[1] === 'eliminar') {
            $req =  (new GuardMiddleware())->run($req);

            $usuariosController->delete($req, $params[2]);
        }
        break;

    case 'login':
        $usuariosController->showLogin($req);
        break;

    case 'doLogin':
        $usuariosController->doLogin($req);
        break;

    case 'registro':
        $usuariosController->showRegistro($req);
        break;

    case 'doRegistro':
        $usuariosController->doRegistro($req);
        break;

    case 'logout':
        $usuariosController->logout();
        break;

    default:
        require_once __DIR__ . '/app/views/template/404.template.phtml';
        break;
}
