<?php
require_once __DIR__ . '/../models/libros.model.php';
require_once __DIR__ . '/../models/escritores.model.php';
require_once __DIR__ . '/../views/libros.view.phtml';

class LibrosController
{
    private $model;
    private $escritoresModel;
    private $view;

    public function __construct($pdo)
    {
        $this->model          = new LibrosModel($pdo);
        $this->escritoresModel = new EscritoresModel($pdo);
        $this->view           = new LibrosView();
    }

    public function getAll($req)
    {

        $libros = $this->model->getAll();
        $this->view->setUser($req->user);

        $this->view->renderAll($req, $libros);
    }

    public function get($req, $id)
    {
        $libro = $this->model->get($id);
        $this->view->setUser($req->user);

        if (!$libro) return $this->view->renderError('Libro no encontrado');
        $this->view->renderDetalle($req, $libro);
    }

    public function formNuevo($req)
    {
        $escritores = $this->escritoresModel->getAll();
        $this->view->setUser($req->user);
        $this->view->renderForm($req, null, $escritores);
    }

    public function insert($req)
    {
        $this->view->setUser($req->user);

        $titulo   = trim($_POST['titulo'] ?? '');
        $autor    = $_POST['autor_nombre'] ?? '';
        $sinopsis = trim($_POST['sinopsis'] ?? '');
        $anio     = $_POST['anio'] ?? '';
        $genero   = $_POST['genero'] ?? '';
        $img      = $_POST['img'] ?? null;

        if (empty($titulo) || empty($autor) || empty($anio)) {
            $escritores = $this->escritoresModel->getAll(null);
            return $this->view->renderForm($req, null, $escritores, 'Título, escritor y año son obligatorios');
        }

        if ($this->model->existeLibroPorTitulo($titulo)) {
            $escritores = $this->escritoresModel->getAll(null);
            return $this->view->renderForm($req, null, $escritores, 'Ya existe un libro con ese título');
        }

        $id = $this->model->insert($titulo, $autor, $sinopsis, $anio, $genero, $img);
        header('Location: ' . BASE_URL . 'libro/' . $id);
    }

    public function formEditar($req, $id)
    {
        $libro = $this->model->get($id);
        $this->view->setUser($req->user);

        if (!$libro) return $this->view->renderError('Libro no encontrado');
        $escritores = $this->escritoresModel->getAll();
        $this->view->renderForm($req, $libro, $escritores, null);
    }

    public function update($req, $id)
    {
        $this->view->setUser($req->user);

        $titulo   = trim($_POST['titulo'] ?? '');
        $autor    = $_POST['autor_nombre'] ?? '';
        $sinopsis = trim($_POST['sinopsis'] ?? '');
        $anio     = $_POST['anio'] ?? '';
        $genero = $_POST['genero'] ?? '';
        $img = $_POST['img'] ?? null;

        if (empty($titulo) || empty($autor) || empty($anio)) {
            $libro      = $this->model->get($id);
            $escritores = $this->escritoresModel->getAll();
            return $this->view->renderForm($req, $libro, $escritores, 'Título, escritor y año son obligatorios');
        }

        if ($this->model->existeLibroPorTitulo($titulo)) {
            $escritores = $this->escritoresModel->getAll(null);
            return $this->view->renderForm($req, null, $escritores, 'Ya existe un libro con ese título');
        }

        $id =  $this->model->update($id, $titulo, $autor, $sinopsis, $anio, $genero, $img);
        header('Location: ' . BASE_URL  . 'libro/' . $id);
    }

    public function delete($id)
    {
        $this->model->delete($id);
        header('Location: ' . BASE_URL . 'libros');
    }
}
