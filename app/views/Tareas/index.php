<?php include __DIR__ . '/../layouts/head.php'; ?>
<?php include __DIR__ . '/../layouts/navbar.php'; ?>

<script src="https://kit.fontawesome.com/3ca9a6174a.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<a href="/public/index.php?accion=crear" class="btn btn-success btn-small"><i class="fa-solid fa-plus"></i> Crear Tarea</a>

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
          <a href="/public/index.php?accion=editar&id=<?php echo $tarea['tareas_id']; ?>" class="btn btn-warning btn-small"><i class="fa-regular fa-pen-to-square"></i>
            <a href="/public/index.php?accion=eliminarLogico&id=<?php echo $tarea['tareas_id']; ?>" class="btn btn-danger btn-small"><i class="fa-solid fa-trash"></i>
              <a href="/public/index.php?accion=completar&id=<?php echo $tarea['tareas_id']; ?>" class="btn btn-success btn-small"><i class="fa-regular fa-square-check"></i>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<form accion="/public/index.php" method="get" class="mb-4">
  <div class="input-group">
    <input type="text" class="form-control" name="buscar" placeholder="Buscar tareas por título" value="<?php echo htmlspecialchars($_GET['buscar'] ?? ''); ?>">
    <button class="btn btn-primary" type="submit">Buscar</button>
  </div>
</form>
</div>
<?php include __DIR__ . '/../layouts/footer.php'; ?>