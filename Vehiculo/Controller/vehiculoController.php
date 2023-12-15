<?php
require_once('Model/vehiculoModelo.php');

class vehiculoController
{
    private $model_e;

    function __construct()
    {
        $this->model_e = new vehiculoModelo();
    }

    function index()
    {
        $query = $this->model_e->get();

        include_once('View/header.php');
        include_once('View/index.php');
        include_once('View/footer.php');
    }

    function vehiculo()
    {
        $data = NULL;
        if (isset($_REQUEST['id'])) {
            $data = $this->model_e->get_id($_REQUEST['id']);
        }
        $query = $this->model_e->get();
        include_once('View/header.php');
        include_once('View/vehiculoVista.php');
        include_once('View/footer.php');
    }

    function get_datosE()
    {
        $data['id'] = $_REQUEST['txt_id'];
        $data['placacar'] = $_REQUEST['txt_placacar'];
        $data['modelo'] = $_REQUEST['txt_modelo'];
        $data['anho'] = $_REQUEST['txt_anho'];
        $data['binauto'] = $_REQUEST['txt_binauto'];

        if ($_REQUEST['id'] == "") {
            $this->model_e->create($data);
        } elseif ($_REQUEST['id'] != "") {
            $date = $_REQUEST['id']; // Este parece ser un error, podría ser $data['id']
            $this->model_e->update($data);
        }

        header("Location:index.php");
    }

    function insertar()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data = $this->obtenerDatos();
            if ($this->validarDatos($data)) {
                $this->model_e->create($data);
                header("Location:index.php");
                exit();
            }
        }
    }

    function actualizar()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data = $this->obtenerDatos();
            if ($this->validarDatos($data)) {
                $this->model_e->update($data);
                header("Location:index.php");
                exit();
            }
        }
    }

    private function obtenerDatos()
    {
        return [
            'id' => $_POST['txt_id'] ?? '',
            'placacar' => $_POST['txt_placacar'] ?? '',
            'modelo' => $_POST['txt_modelo'] ?? '',
            'anho' => $_POST['txt_anho'] ?? '',
            'binauto' => $_POST['txt_binauto'] ?? ''
        ];
    }

    function post_datosE()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data['id'] = $_POST['txt_id'];
            $data['placacar'] = $_POST['txt_placacar'];
            $data['modelo'] = $_POST['txt_modelo'];
            $data['anho'] = $_POST['txt_anho'];
            $data['binauto'] = $_POST['txt_binauto'];

            if (empty($data['id'])) {
                $this->model_e->create($data);
            } else {
                $this->model_e->update($data);
            }

            header("Location:index.php");
            exit();
        }
    }


    function confirmarDelete()
    {
        $data = NULL;

        if ($_REQUEST['id'] != 0) {
            $data = $this->model_e->get_id($_REQUEST['id']);
        }

        if ($_REQUEST['id'] == 0) {
            $date['id'] = $_REQUEST['txt_id'];
            $this->model_e->delete($date['id']);
            header("Location:index.php");
        }

        include_once('View/header.php');
        include_once('View/confirm.php');
        include_once('View/footer.php');
    }

    private function validarDatos($data)
    {
        return !in_array('', $data, true); // Verifica si algún campo está vacío
    }
}
