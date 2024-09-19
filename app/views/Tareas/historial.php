<?php include __DIR__ . '/../layouts/head.php'; ?>
<?php include __DIR__ . '/../layouts/navbar.php'; ?>

<script src="https://kit.fontawesome.com/3ca9a6174a.js" crossorigin="anonymous"></script>


<div class="container mt-4 text-center">
    <h2>Historial de Tareas</h2>
    <br>
    <?php include __DIR__ . '/../layouts/buscar.php'; ?>
    <br>
    <table class="table table-striped  text-center">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Título</th>
                <th scope="col">Descripción</th>
                <th scope="col">
                    <a class="nav-link active" href="/TODOapp/public/index.php?accion=ordenar&vista=historial&orden=tarea_vencimiento&direccion=<?php echo (isset($_GET['direccion']) && $_GET['direccion'] === 'asc') ? 'desc' : 'asc'; ?>">
                        Fecha de Vencimiento
                        <i class="fa-solid fa-arrow-<?php echo (isset($_GET['orden']) && $_GET['orden'] === 'tarea_vencimiento' && isset($_GET['direccion']) && $_GET['direccion'] === 'asc') ? 'up' : 'down'; ?>"></i>
                    </a>
                </th>
                <th scope="col">
                    <a class="nav-link active" href="/TODOapp/public/index.php?accion=ordenar&vista=historial&orden=tarea_completada&direccion=<?php echo (isset($_GET['direccion']) && $_GET['direccion'] === 'asc') ? 'desc' : 'asc'; ?>&estado=<?php echo isset($_GET['estado']) ?? '' ?>">
                        Completada
                        <i class="fa-solid fa-arrow-<?php echo (isset($_GET['orden']) && $_GET['orden'] === 'tarea_completada' && isset($_GET['direccion']) && $_GET['direccion'] === 'desc') ? 'up' : 'down'; ?>"></i>
                    </a>
                </th>
                <th scope="col">Eliminada</th>
                <th scope="col">Borrar/Restaurar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tareas as $tarea): ?>

                <tr class="<?php echo $tarea['tarea_eliminada'] ? 'text-decoration-line-through table-danger ' : ''; ?>">
                    <th scope="row"><?php echo htmlspecialchars($tarea['tareas_id']); ?></th>
                    <td><?php echo htmlspecialchars($tarea['tareas_titulo']); ?></td>
                    <td><?php echo htmlspecialchars($tarea['tareas_descripcion']); ?></td>
                    <td><?php echo htmlspecialchars($tarea['tarea_vencimiento']); ?></td>
                    <td><?php echo $tarea['tarea_completada'] ? 'Sí' : 'No'; ?></td>
                    <td><?php echo $tarea['tarea_eliminada'] ? 'Sí' : 'No'; ?></td>
                    <td>
                        <a href="/TODOapp/public/index.php?accion=eliminar&id=<?php echo $tarea['tareas_id']; ?>" class="btn btn-danger btn-small m-1" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Eliminar definitivamente"><i class="fa-solid fa-trash"></i>
                            <?php if ($tarea['tarea_eliminada']): ?>
                                <a href="/TODOapp/public/index.php?accion=eliminarLogico&id=<?php echo $tarea['tareas_id']; ?>" class="btn btn-success btn-small" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Restaurar la tarea" ><i class="fa-solid fa-trash-arrow-up"></i>
                                <?php endif; ?>
                    </td>
                </tr>

            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
    const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))
</script>

<?php include __DIR__ . '/../layouts/footer.php'; ?>