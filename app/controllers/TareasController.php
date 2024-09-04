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

    public function listartareas() {
        $tareas = $this->modeloTarea->obtenerTareas();
        $this->renderizar('Tareas/index', ['tareas' => $tareas]);
    }

    public function listarTareasPorEstado($estado) {

        $tareas = $this->modeloTarea->obtenerTareasPorEstado($estado);
        
        if ($estado == 0) {
            $this->renderizar('Tareas/pendiente', ['tareas' => $tareas]);
        } else {
            $this->renderizar('Tareas/completada', ['tareas' => $tareas]);
        }
    }
    
    
    public function completar($id) {
        $tarea = $this->modeloTarea->obtenerTareaPorId($id);
    
        if ($tarea) {
            $completada = $tarea['tarea_completada'] ? 0 : 1; 
            $this->modeloTarea->actualizarEstadoCompletada($id, $completada);
            
            if ($completada) {
            
                header('Location: /public/index.php?accion=tareasCompletadas');
            } else {
                
                header('Location: /public/index.php?accion=tareasPendientes');
            }
            exit;
        }  

    }    
    
    public function eliminar($id) {
        $this->modeloTarea->eliminarTarea($id); 
        header('Location: /public/index.php');
        exit;
    }

    public function editar($id) {
        $tarea = $this->modeloTarea->obtenerTareaPorId($id);  
        if (!$tarea) {
            header('Location: /public/index.php');  
            exit;
        }

        $this->renderizar('Tareas/editar', ['tarea' => $tarea]);  
    }

    public function actualizar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $titulo = $_POST['titulo'];
            $descripcion = $_POST['descripcion'];
            $vencimiento = $_POST['vencimiento'];

            $this->modeloTarea->actualizarTarea($id, $titulo, $descripcion, $vencimiento); 

            header('Location: /public/index.php');  
            exit;
        }
    }

}


?>
