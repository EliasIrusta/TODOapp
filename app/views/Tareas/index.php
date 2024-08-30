<?php include __DIR__ . '/../layouts/head.php'; ?>
<?php include __DIR__ . '/../layouts/navbar.php'; ?>

<script src="https://kit.fontawesome.com/3ca9a6174a.js" crossorigin="anonymous"></script>

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
      <th scope="col">Eliminada</th>
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
    <td><?php echo $tarea['tarea_eliminada'] ? 'Sí' : 'No'; ?></td>
    <td>
        <a href="/public/edit.php?id=1" class="btn btn-warning btn-small"><i class="fa-regular fa-pen-to-square"></i>
        <a href="/public/delete.php?id=1" class="btn btn-danger btn-small"><i class="fa-solid fa-trash"></i>
        <a href="/public/complete.php?id=1" class="btn btn-success btn-small"><i class="fa-regular fa-square-check"></i>
    </td>
    </tr>
    <?php endforeach; ?>
   </tbody>
</table>
<?php include __DIR__ . '/../layouts/footer.php'; ?>