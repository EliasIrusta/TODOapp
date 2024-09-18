<?php include __DIR__ . '/../layouts/head.php'; ?>
<?php include __DIR__ . '/../layouts/navbar.php'; ?>

<script src="https://kit.fontawesome.com/3ca9a6174a.js" crossorigin="anonymous"></script>

<div class="container mt-4">

    <h2 class="text-center">Tareas Completadas</h2>
    <br>
    <?php include __DIR__ . '/../layouts/buscar.php'; ?>
    <br>
    <table class="table table-striped text-center">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Título</th>
                <th scope="col">Descripción</th>
                <th scope="col">Fecha de Vencimiento</th>
                <th scope="col">Fecha Completada</th>
                <th scope="col">Tiempo de Resolución</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tareas as $tarea): ?>

                <tr>
                    <th scope="row"><?php echo htmlspecialchars($tarea['tareas_id']); ?></th>
                    <td><?php echo htmlspecialchars($tarea['tareas_titulo']); ?></td>
                    <td><?php echo htmlspecialchars($tarea['tareas_descripcion']); ?></td>
                    <td><?php echo htmlspecialchars($tarea['tarea_vencimiento']); ?></td>
                    <td><?php echo htmlspecialchars($tarea['fecha_completada']); ?></td>
                    <td>
                        <?php
                        $fechaCreacion = new DateTime($tarea['tareas_creacion']);
                        $fechaCompletada = new DateTime($tarea['fecha_completada']);                       
                        $diferencia = $fechaCreacion->diff($fechaCompletada);                       
                        echo htmlspecialchars($diferencia->days) . " días";
                        ?>
                    </td>
                    <td>
                        <a href="/TODOapp/public/index.php?accion=completar&id=<?php echo $tarea['tareas_id']; ?>
                        " class="btn btn-success btn-small"><i class="fa-regular fa-square-check" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Marcar como NO completada"></i></a>
                    </td>
                </tr>

            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php include __DIR__ . '/../layouts/footer.php'; ?>