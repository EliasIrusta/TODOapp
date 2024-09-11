<?php include __DIR__ . '/../layouts/head.php'; ?>
<?php include __DIR__ . '/../layouts/navbar.php'; ?>

<script src="https://kit.fontawesome.com/3ca9a6174a.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<div class="container mt-4">

<a href="/public/index.php?accion=crear" class="btn btn-success btn-small" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Agregar una Tarea a la lista"><i class="fa-solid fa-plus"></i> Crear Tarea</a>

<h1>Lista de Tareas</h1>

<table class="table">
  <thead class="bg-info">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Título</th>
      <th scope="col">Descripción</th>
      <th scope="col">Fecha de Creación</th>
      <th scope="col">Fecha de Vencimiento</th>
      <th scope="col">Completada</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>

    <?php foreach ($tareas as $tarea): ?>
      <tr>
        <th scope="row"><?php echo htmlspecialchars($tarea['tareas_id']); ?></th>
        <td><?php echo htmlspecialchars($tarea['tareas_titulo']); ?></td>
        <td><?php echo htmlspecialchars($tarea['tareas_descripcion']); ?></td>
        <td><?php echo htmlspecialchars($tarea['tareas_creacion']); ?></td>
        <td><?php echo htmlspecialchars($tarea['tarea_vencimiento']); ?></td>
        <td><?php echo $tarea['tarea_completada'] ? 'Sí' : 'No'; ?></td>

        <td>
                    <a href="/public/index.php?accion=editar&id=<?php echo $tarea['tareas_id']; ?>" class="btn btn-warning btn-small" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Editar Tarea">
                        <i class="fa-regular fa-pen-to-square"></i>
                    </a>
                    <a href="/public/index.php?accion=eliminarLogico&id=<?php echo $tarea['tareas_id']; ?>" class="btn btn-danger btn-small" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Eliminar Tarea">
                        <i class="fa-solid fa-trash"></i>
                    </a>                   
                    <?php if ($tarea['tarea_completada']): ?>                        
                        <a href="/public/index.php?accion=completar&id=<?php echo $tarea['tareas_id']; ?>" class="btn btn-success btn-small"><i class="fa-regular fa-square-check" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Marcar como NO Completada"></i>
                    <?php else: ?>
                      <a href="/public/index.php?accion=completar&id=<?php echo $tarea['tareas_id']; ?>" class="btn btn-secondary btn-small"><i class="fa-solid fa-xmark" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Marcar como Completada"></i>
                        </a>
                    <?php endif; ?>
                </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<form class="d-flex" action="/public/index.php" method="get">
  <input type="hidden" name="accion" value="buscar">
  <input class="form-control me-2" type="search" name="buscar" placeholder="Buscar tarea" aria-label="Buscar">
  <button class="btn btn-outline-success" type="submit">Buscar</button>
</form>
</div>


<?php include __DIR__ . '/../layouts/footer.php'; ?>

