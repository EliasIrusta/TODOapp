<?php include __DIR__ . '/../layouts/head.php'; ?>
<?php include __DIR__ . '/../layouts/navbar.php'; ?>

<script src="https://kit.fontawesome.com/3ca9a6174a.js" crossorigin="anonymous"></script>

<div class="container mt-4">

    <h2>Tareas Pendientes</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Título</th>
                <th scope="col">Descripción</th>
                <th scope="col">Fecha de Vencimiento</th>
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
                    <td>
                        <a href="/TODOapp/public/index.php?accion=editar&id=<?php echo $tarea['tareas_id']; ?>" class="btn btn-warning btn-small"><i class="fa-regular fa-pen-to-square" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Modificar Tarea"></i>
                            <a href="/TODOapp/public/index.php?accion=eliminar&id=<?php echo $tarea['tareas_id']; ?>" class="btn btn-danger btn-small"><i class="fa-solid fa-trash" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Eliminar Tarea"></i>
                                <a href="/TODOapp/public/index.php?accion=completar&id=<?php echo $tarea['tareas_id']; ?>" class="btn btn-secondary btn-small"><i class="fa-solid fa-xmark" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Marcar como Completada"></i>
                    </td>
                </tr>

            <?php endforeach; ?>
        </tbody>
    </table>

</div>
<?php include __DIR__ . '/../layouts/footer.php'; ?>