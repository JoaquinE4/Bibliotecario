<?php
require_once __DIR__ . '/../models/libros.model.php';
require_once __DIR__ . '/../models/escritores.model.php';
require_once __DIR__ . '/../views/libros.view.php';

class LibrosController {
    private $model;
    private $escritoresModel;
    private $view;

    public function __construct($pdo) {
        $this->model          = new LibrosModel($pdo);
        $this->escritoresModel = new EscritoresModel($pdo);
        $this->view           = new LibrosView();
    }

    public function getAll() {
        $libros = $this->model->getAll();
        $this->view->renderAll($libros);
    }

    public function get($id) {
        $libro = $this->model->get($id);
        if (!$libro) return $this->view->renderError('Libro no encontrado');
        $this->view->renderDetalle($libro);
    }

    public function formNuevo() {
        $escritores = $this->escritoresModel->getAll();
        $this->view->renderForm(null, $escritores);
    }

    public function insert() {
        $titulo   = trim($_POST['titulo'] ?? '');
        $autor    = $_POST['autor'] ?? '';
        $sinopsis = trim($_POST['sinopsis'] ?? '');
        $anio     = $_POST['anio'] ?? '';

        if (empty($titulo) || empty($autor) || empty($anio)) {
            $escritores = $this->escritoresModel->getAll();
            return $this->view->renderForm(null, $escritores, 'Título, autor y año son obligatorios');
        }

        $this->model->insert($titulo, $autor, $sinopsis, $anio);
        header('Location: ' . BASE_URL . 'libros');
        exit();
    }

    public function formEditar($id) {
        $libro = $this->model->get($id);
        if (!$libro) return $this->view->renderError('Libro no encontrado');
        $escritores = $this->escritoresModel->getAll();
        $this->view->renderForm($libro, $escritores);
    }

    public function update($id) {
        $titulo   = trim($_POST['titulo'] ?? '');
        $autor    = $_POST['autor'] ?? '';
        $sinopsis = trim($_POST['sinopsis'] ?? '');
        $anio     = $_POST['anio'] ?? '';

        if (empty($titulo) || empty($autor) || empty($anio)) {
            $libro      = $this->model->get($id);
            $escritores = $this->escritoresModel->getAll();
            return $this->view->renderForm($libro, $escritores, 'Título, autor y año son obligatorios');
        }

        $this->model->update($id, $titulo, $autor, $sinopsis, $anio);
        header('Location: ' . BASE_URL . 'libros');
        exit();
    }

    public function delete($id) {
        $this->model->delete($id);
        header('Location: ' . BASE_URL . 'libros');
        exit();
    }
}