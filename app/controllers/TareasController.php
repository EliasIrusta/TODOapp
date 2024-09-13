<?php

require_once 'BaseController.php';
require_once '../app/models/Tarea.php';

class TareasController extends BaseController 
{
    private $modeloTarea;

    public function __construct() 
    {
        $this->modeloTarea = new Tarea();
    }

    private function validarFechaVencimiento($fechaVencimiento) 
    {
        $fechaActual = date('Y-m-d');
        return $fechaVencimiento >= $fechaActual;
    }

    public function crear() 
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo = $_POST['titulo'];
            $descripcion = $_POST['descripcion'];
            $fechaVencimiento = $_POST['fecha_vencimiento'];

            if (!$this->validarFechaVencimiento($fechaVencimiento)) {
                echo "<script>alert('La fecha de vencimiento no puede ser anterior a la fecha actual.');</script>";
                $this->renderizar('Tareas/crear');
                exit;
            }

            $this->modeloTarea->crearTarea($titulo, $descripcion, $fechaVencimiento);
            header('Location: /TODOapp/public/index.php');
            exit;
        } else {
            $this->renderizar('Tareas/crear');
        }
    }

    public function listartareas() 
    {
        $tareas = $this->modeloTarea->obtenerTareas();
        $this->renderizar('Tareas/index', ['tareas' => $tareas]);
    }

    public function listartareasTodas() 
    {
        $tareas = $this->modeloTarea->obtenerTareasTodas();
        $this->renderizar('Tareas/historial', ['tareas' => $tareas]);
    }

    public function listarTareasPorEstado($estado) 
    {
        $tareas = $this->modeloTarea->obtenerTareasPorEstado($estado);

        if ($estado == 0) {
            $this->renderizar('Tareas/pendiente', ['tareas' => $tareas]);
        } else {
            $this->renderizar('Tareas/completada', ['tareas' => $tareas]);
        }
    }

    public function buscar() 
    {
        $buscar = $_GET['buscar'] ?? '';
        $tareas = $this->modeloTarea->buscarTareasPorTitulo($buscar);
        $this->renderizar('Tareas/index', ['tareas' => $tareas]);
    }

    public function ordenar() 
    {
        $orden = $_GET['orden'] ?? ''; 
        $direccion = $_GET['direccion'] ?? 'asc';      
    
        $tareas = $this->modeloTarea->ordenarTareas($orden, $direccion);
        $this->renderizar('Tareas/index', ['tareas' => $tareas]);
    }        
    
    public function completar($id) 
    {
        $tarea = $this->modeloTarea->obtenerTareaPorId($id);

        if ($tarea) {
            $completada = $tarea['tarea_completada'] ? 0 : 1;
            $this->modeloTarea->actualizarEstadoCompletada($id, $completada);

            if ($completada) {

                header('Location: /TODOapp/public/index.php?accion=tareasCompletadas');
            } else {

                header('Location: /TODOapp/public/index.php?accion=tareasPendientes');
            }
            exit;
        }
    }

    public function eliminarLogico($id) 
    {
        $tarea = $this->modeloTarea->obtenerTareaPorId($id);
        if ($tarea) {
            $tareaEliminar = $tarea['tarea_eliminada'] ? 0 : 1;
            $this->modeloTarea->eliminarTarea($id, $tareaEliminar);
            header('Location: /TODOapp/public/index.php');
            exit;
        }
    }

    public function eliminar($id)
    {
        $this->modeloTarea->eliminarDefinitivo($id);
        header('Location: /TODOapp/public/index.php');
        exit;
    }

    public function editar($id)
    {
        $tarea = $this->modeloTarea->obtenerTareaPorId($id);
        if (!$tarea) {
            header('Location: /TODOapp/public/index.php');
            exit;
        }

        $this->renderizar('Tareas/editar', ['tarea' => $tarea]);
    }

    public function actualizar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $titulo = $_POST['titulo'];
            $descripcion = $_POST['descripcion'];
            $vencimiento = $_POST['vencimiento'];

            if (!$this->validarFechaVencimiento($vencimiento)) {
                echo "<script>alert('La fecha de vencimiento no puede ser anterior a la fecha actual.');</script>";
                $this->renderizar('Tareas/crear');
                exit;
            }

            $this->modeloTarea->actualizarTarea($id, $titulo, $descripcion, $vencimiento);

            header('Location: /TODOapp/public/index.php');
            exit;
        }
    }
}


?>
