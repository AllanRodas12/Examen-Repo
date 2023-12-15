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

        if ($_REQUEST['txt_id'] == "") {
            $this->model_e->create($data); // Crea un nuevo registro si no hay ID proporcionado
        } else {
            $id = $_REQUEST['txt_id']; // Obtén el ID del formulario
            $this->model_e->update($id, $data); // Actualiza el registro existente con el ID proporcionado
        }

        header("Location:index.php");
        exit();
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
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['_method']) && $_POST['_method'] === "PUT") {
            $data = $this->obtenerDatos();
            if ($this->validarDatos($data)) {
                $id = $_POST['txt_id']; // Asegúrate de obtener el ID del formulario
                if (isset($id)) { // Comprueba si $id está definido antes de usarlo
                    $this->model_e->update($id, $data); // Llama a la función de actualización del modelo con dos argumentos
                    header("Location:index.php");
                    exit();
                } else {
                    // Manejo de error o aviso sobre la falta del ID
                }
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
