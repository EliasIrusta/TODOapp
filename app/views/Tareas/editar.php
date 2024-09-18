<?php include __DIR__ . '/../layouts/head.php'; ?>
<?php include __DIR__ . '/../layouts/navbar.php'; ?>

<div class="container mt-4 d-flex justify-content-center">
<div class="col-md-6">
    <h1 class="text-center">Editar Tarea</h1>
    <form action="/TODOapp/public/index.php?accion=editar" method="post">
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
            <fieldset disabled>
            <label for="creacion" class="form-label">Fecha de creacion</label>
            <input type="date" class="form-control" id="tareas_creacion" name="tareas_creacion" value="<?php echo date('Y-m-d', strtotime($tarea['tareas_creacion'])); ?>" required>
            </fieldset>
        </div>
        <div class="mb-3">
            <label for="vencimiento" class="form-label">Fecha de Vencimiento</label>
            <input type="date" class="form-control" id="tarea_vencimiento" name="tarea_vencimiento" value="<?php echo htmlspecialchars($tarea['tarea_vencimiento']); ?>" required>
        </div>
        <div class="d-grid">
        <button type="submit" class="btn btn-primary btn-block" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Aceptar Cambios">Actualizar Tarea</button>
        </div>
    </form>
</div>

<?php include __DIR__ . '/../layouts/footer.php'; ?>
