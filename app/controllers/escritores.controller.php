<?php
require_once __DIR__ . '/../models/escritores.model.php';
require_once __DIR__ . '/../models/libros.model.php';
require_once __DIR__ . '/../views/escritores.view.php';

class EscritoresController {
    private $model;
    private $librosModel;
    private $view;

    public function __construct($pdo) {
        $this->model       = new EscritoresModel($pdo);
        $this->librosModel = new LibrosModel($pdo);
        $this->view        = new EscritoresView();
    }

    public function getAll() {
        $escritores = $this->model->getAll();
        $this->view->renderAll($escritores);
    }

    public function get($id) {
        $escritor = $this->model->get($id);
        if (!$escritor) return $this->view->renderError('Escritor no encontrado');
        $libros = $this->librosModel->getByAutor($id);
        $this->view->renderDetalle($escritor, $libros);
    }

    public function formNuevo() {
        $this->view->renderForm();
    }

    public function insert() {
        $nombre      = trim($_POST['nombre'] ?? '');
        $descripcion = trim($_POST['descripcion'] ?? '');
        $fecha_nac   = $_POST['fecha_nac'] ?? '';
        $origen      = trim($_POST['origen'] ?? '');

        if (empty($nombre) || empty($fecha_nac) || empty($origen)) {
            return $this->view->renderForm(null, 'Nombre, fecha de nacimiento y origen son obligatorios');
        }

        $this->model->insert($nombre, $descripcion, $fecha_nac, $origen);
        header('Location: ' . BASE_URL . 'escritores');
        exit();
    }

    public function formEditar($id) {
        $escritor = $this->model->get($id);
        if (!$escritor) return $this->view->renderError('Escritor no encontrado');
        $this->view->renderForm($escritor);
    }

    public function update($id) {
        $nombre      = trim($_POST['nombre'] ?? '');
        $descripcion = trim($_POST['descripcion'] ?? '');
        $fecha_nac   = $_POST['fecha_nac'] ?? '';
        $origen      = trim($_POST['origen'] ?? '');

        if (empty($nombre) || empty($fecha_nac) || empty($origen)) {
            $escritor = $this->model->get($id);
            return $this->view->renderForm($escritor, 'Nombre, fecha de nacimiento y origen son obligatorios');
        }

        $this->model->update($id, $nombre, $descripcion, $fecha_nac, $origen);
        header('Location: ' . BASE_URL . 'escritores');
        exit();
    }

    public function delete($id) {
        $this->model->delete($id);
        header('Location: ' . BASE_URL . 'escritores');
        exit();
    }
}