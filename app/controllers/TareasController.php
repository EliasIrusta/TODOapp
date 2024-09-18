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

    private function validarFechaVencimientoCrear($fechaVencimiento) 
    {
        $fechaActual = date('Y-m-d');
        return $fechaVencimiento >= $fechaActual;
    }

    private function validarFechaVencimientoActualizar($tareas_creacion, $fechaVencimiento) 
    {
        $fechaCreacion = new DateTime($tareas_creacion);
        $fechaVenc = new DateTime($fechaVencimiento);
    
        return $fechaVenc >= $fechaCreacion;
    }

    public function crear() 
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo = $_POST['titulo'];
            $descripcion = $_POST['descripcion'];
            $fechaVencimiento = $_POST['fecha_vencimiento'];

            if (!$this->validarFechaVencimientoCrear($fechaVencimiento)) {
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
        $vista = $_GET['vista'] ?? 'index';
        $tareas = $this->modeloTarea->buscarTareasPorTitulo($buscar);


        switch ($vista){
            case 'tareasCompletadas':
                $this->renderizar(('Tareas/completada'), ['tareas' => $tareas]);
                break;
            case 'tareasPendientes':
                $this->renderizar(('Tareas/pendiente'), ['tareas' => $tareas]);
                break;
            case 'historialTareas':
                $this->renderizar(('Tareas/historial'), ['tareas' => $tareas]);
                break;
            default:
                $this->renderizar('Tareas/index', ['tareas' => $tareas]);
                break;
        }
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
            $creacion = $_POST['tareas_creacion'];
            $vencimiento = $_POST['tarea_vencimiento'];

            if (!$this->validarFechaVencimientoActualizar($creacion, $vencimiento)) {
                echo "<script>alert('La fecha de vencimiento no puede ser anterior a la fecha de creación.');</script>";
                $this->renderizar('Tareas/editar', ['tarea' => $this->modeloTarea->obtenerTareaPorId($id)]);
                exit;
            }

            $this->modeloTarea->actualizarTarea($id, $titulo, $descripcion, $vencimiento);

            header('Location: /TODOapp/public/index.php');
            exit;
        }
    }
}


?>
