<?php include __DIR__ . '/../layouts/head.php'; ?>
<?php include __DIR__ . '/../layouts/navbar.php'; ?>

<script src="https://kit.fontawesome.com/3ca9a6174a.js" crossorigin="anonymous"></script>

<div class="container mt-4">

    <h2>Tareas Completadas</h2>
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

                <tr class="text-decoration-line-through">
                    <th scope="row"><?php echo htmlspecialchars($tarea['tareas_id']); ?></th>
                    <td><?php echo htmlspecialchars($tarea['tareas_titulo']); ?></td>
                    <td><?php echo htmlspecialchars($tarea['tareas_descripcion']); ?></td>
                    <td><?php echo htmlspecialchars($tarea['tarea_vencimiento']); ?></td>
                    <td>
                        <a href="/TODOapp/public/index.php?accion=completar&id=<?php echo $tarea['tareas_id']; ?>
                        " class="btn btn-success btn-small"><i class="fa-regular fa-square-check"></i></a>
                    </td>
                </tr>

            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php include __DIR__ . '/../layouts/footer.php'; ?>