<?php include __DIR__ . '/../layouts/head.php'; ?>
<?php include __DIR__ . '/../layouts/navbar.php'; ?>

<div class="container mt-4">
    <h1>Editar Tarea</h1>
    <form action="/public/index.php?accion=editar" method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($tarea['tareas_id']); ?>">
        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo htmlspecialchars($tarea['tareas_titulo']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion"><?php echo htmlspecialchars($tarea['tareas_descripcion']); ?></textarea>
        </div>
        <div class="mb-3">
            <label for="vencimiento" class="form-label">Fecha de Vencimiento</label>
            <input type="date" class="form-control" id="vencimiento" name="vencimiento" value="<?php echo htmlspecialchars($tarea['tarea_vencimiento']); ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Tarea</button>
    </form>
</div>

<?php include __DIR__ . '/../layouts/footer.php'; ?>
