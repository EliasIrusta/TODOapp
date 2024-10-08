<?php include __DIR__ . '/../layouts/head.php'; ?>
<?php include __DIR__ . '/../layouts/navbar.php'; ?>

<script src="https://kit.fontawesome.com/3ca9a6174a.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<div class="container mt-4">

  <a href="/TODOapp/public/index.php?accion=crear" class="btn btn-success btn-small">
    <i class="fa-solid fa-plus"></i> Crear Tarea
  </a>
  <br>

  <br>
    <?php include __DIR__ . '/../layouts/buscar.php'; ?>
    <br>
  <div class="text-center">
    <br>
    <h1>Lista de Tareas</h1>
    <br>
    <table class="table">
      <thead class="bg-info">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Título</th>
          <th scope="col">Descripción</th>
          <th scope="col">
            <a class="nav-link active" href="/TODOapp/public/index.php?accion=ordenar&vista=index&orden=tareas_creacion&direccion=<?php echo (isset($_GET['direccion']) && $_GET['direccion'] === 'asc') ? 'desc' : 'asc'; ?>">
              Fecha de Creación
              <i class="fa-solid fa-arrow-<?php echo (isset($_GET['orden']) && $_GET['orden'] === 'tareas_creacion' && isset($_GET['direccion']) && $_GET['direccion'] === 'asc') ? 'up' : 'down'; ?>"></i>
            </a>
          </th>
          <th scope="col">
            <a class="nav-link active" href="/TODOapp/public/index.php?accion=ordenar&vista=index&orden=tarea_vencimiento&direccion=<?php echo (isset($_GET['direccion']) && $_GET['direccion'] === 'asc') ? 'desc' : 'asc'; ?>">
              Fecha de Vencimiento
              <i class="fa-solid fa-arrow-<?php echo (isset($_GET['orden']) && $_GET['orden'] === 'tarea_vencimiento' && isset($_GET['direccion']) && $_GET['direccion'] === 'asc') ? 'up' : 'down'; ?>"></i>
            </a>
          </th>
          <th scope="col">
          <a class="nav-link active" href="/TODOapp/public/index.php?accion=ordenar&vista=index&orden=tarea_completada&direccion=<?php echo (isset($_GET['direccion']) && $_GET['direccion'] === 'asc') ? 'desc' : 'asc'; ?>&estado=<?php echo isset($_GET['estado']) ?? ''?>">
            Completada
            <i class="fa-solid fa-arrow-<?php echo (isset($_GET['orden']) && $_GET['orden'] === 'tarea_completada' && isset($_GET['direccion']) && $_GET['direccion'] === 'desc') ? 'up' : 'down'; ?>"></i>
          </a>
        </th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody>

        <?php foreach ($tareas as $tarea): ?>
          <?php
          $vencimiento = ($tarea['tarea_vencimiento']);
          $hoy = date('Y-m-d');
          $dias_restantes = date_diff(date_create($hoy), date_create($vencimiento));
          ?>

          <tr class="<?php echo ($dias_restantes->format('%R%a') < 0) ? 'table-warning' : 'table-success'; ?>">
            <th scope="row"><?php echo htmlspecialchars($tarea['tareas_id']); ?></th>
            <td><?php echo htmlspecialchars($tarea['tareas_titulo']); ?></td>
            <td><?php echo htmlspecialchars($tarea['tareas_descripcion']); ?></td>
            <td><?php echo htmlspecialchars($tarea['tareas_creacion']); ?></td>
            <td><?php echo htmlspecialchars($tarea['tarea_vencimiento']); ?></td>
            <td><?php echo $tarea['tarea_completada'] ? 'Sí' : 'No'; ?></td>

            <td>
              <a href="/TODOapp/public/index.php?accion=editar&id=<?php echo $tarea['tareas_id']; ?>" class="btn btn-warning btn-small" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Editar Tarea">
                <i class="fa-regular fa-pen-to-square"></i>
              </a>
              <a href="/TODOapp/public/index.php?accion=eliminarLogico&id=<?php echo $tarea['tareas_id']; ?>" class="btn btn-danger btn-small" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Eliminar Tarea">
                <i class="fa-solid fa-trash"></i>
              </a>
              <?php if ($tarea['tarea_completada']): ?>
                <a href="/TODOapp/public/index.php?accion=completar&id=<?php echo $tarea['tareas_id']; ?>" class="btn btn-success btn-small"><i class="fa-regular fa-square-check" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Marcar como NO Completada"></i>
                <?php else: ?>
                  <a href="/TODOapp/public/index.php?accion=completar&id=<?php echo $tarea['tareas_id']; ?>" class="btn btn-secondary btn-small"><i class="fa-xmark" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Marcar como Completada"></i>
                  </a>
                <?php endif; ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>


<?php include __DIR__ . '/../layouts/footer.php'; ?>