<?php

require_once 'BaseController.php';
require_once '../app/models/Tareas.php';

class TareasController extends BaseController
{
    private $modeloTarea;

    public function __construct()
    {
        $this->modeloTarea = new Tarea();
    }


    public function crear()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //echo "Crear method called!";
            //var_dump($_POST);
            $titulo = $_POST['titulo'];
            $descripcion = $_POST['descripcion'];
            $fechaVencimiento = $_POST['fecha_vencimiento'];
            $pendiente=true;
            $this->modeloTarea->crearTarea($titulo, $descripcion, $fechaVencimiento, $pendiente);
            header('Location: /public/index.php');
            exit;
        } else {
        $this->renderizar('Tareas/crear');
        }
    }

public function modificar($id)
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $titulo = $_POST['titulo'];
        $descripcion = $_POST['descripcion'];
        $fechaVencimiento = $_POST['fecha_vencimiento'];

        $this->modeloTarea->modificarTarea($id, $titulo, $descripcion, $fechaVencimiento);
        header('Location: /TODOapp/public/index.php');
        exit;
    } else {
        $tarea = $this->modeloTarea->obtenerTareaPorId($id);
        $this->renderizar('Tareas/modificar', ['tarea' => $tarea]);
    }
}

    public function listartareas()
    {
        $tareas = $this->modeloTarea->obtenerTareas();
        $this->renderizar('Tareas/index', ['tareas' => $tareas]);
    }

    public function eliminar($id) {
        $this->modeloTarea->eliminarTarea($id); 
        header('Location: /TODOapp/public/index.php');
        exit;
    }

   
}


?>
