<?php
require_once __DIR__ . '/../models/escritores.model.php';
require_once __DIR__ . '/../models/libros.model.php';
require_once __DIR__ . '/../views/escritores.view.phtml';

class EscritoresController
{
    private $model;
    private $librosModel;
    private $view;

    public function __construct($pdo)
    {
        $this->model       = new EscritoresModel($pdo);
        $this->librosModel = new LibrosModel($pdo);
        $this->view        = new EscritoresView();
    }

    public function getAll($req, $query = null)
    {

        $orden = (isset($_GET['sort']) && strtoupper($_GET['sort']) === 'DESC') ? 'DESC' : 'ASC';

        if ($query !== null && $query !== '') {
            $escritores = $this->model->getByOrigen($query, $orden);
        } else {
            $escritores = $this->model->getAll($orden);
        }

        $origenes = $this->model->getOrigenes();

        $this->view->setUser($req->user);
        $this->view->renderAll($req, $escritores, $origenes, $orden);
    }


    public function get($req, $id)
    {
        $this->view->setUser($req->user);

        $escritor = $this->model->get($id);
        if (!$escritor) return $this->view->renderError('Escritor no encontrado');
        $libros = $this->librosModel->getByAutor($id);
        $this->view->renderDetalle($req, $escritor, $libros);
    }

    public function formNuevo($req)
    {
        $this->view->renderForm($req);
    }

    public function insert($req)
    {
        $this->view->setUser($req->user);

        $nombre      = trim($_POST['nombre'] ?? '');
        $descripcion = trim($_POST['descripcion'] ?? '');
        $fecha_nac   = $_POST['fecha_nac'] ?? '';
        $origen      = trim($_POST['origen'] ?? '');
        $img = trim($_POST['img']) ?? null;

        if (empty($nombre) || empty($fecha_nac) || empty($origen)) {
            return $this->view->renderForm($req, null, 'Nombre, fecha de nacimiento y origen son obligatorios');
        }

        if ($this->model->existeEscritorPorNombre($nombre)) {
            return $this->view->renderForm($req, null, 'Ya existe un escritor con ese nombre');
        }


        $this->model->insert($nombre, $descripcion, $fecha_nac, $origen, $img);
        header('Location: ' . BASE_URL . 'escritores');
    }

    public function formEditar($req, $id)
    {
        $escritor = $this->model->get($id);
        if (!$escritor) return $this->view->renderError('Escritor no encontrado');
        $this->view->renderForm($req, $escritor);
    }

    public function update($req, $id)
    {
        $this->view->setUser($req->user);

        $nombre      = trim($_POST['nombre'] ?? '');
        $descripcion = trim($_POST['descripcion'] ?? '');
        $fecha_nac   = $_POST['fecha_nac'] ?? '';
        $origen      = trim($_POST['origen'] ?? '');
        $img = trim($_POST['img']) ?? null;
        if (empty($nombre) || empty($fecha_nac) || empty($origen)) {
            $escritor = $this->model->get($id);
            return $this->view->renderForm($req, $escritor, 'Nombre, fecha de nacimiento y origen son obligatorios');
        }

        $id = $this->model->update($id, $nombre, $descripcion, $fecha_nac, $origen, $img);
        header('Location: ' . BASE_URL  . 'escritor/' . $id);
    }

    public function delete($id)
    {
        $this->model->delete($id);
        header('Location: ' . BASE_URL . 'escritores');
    }
}