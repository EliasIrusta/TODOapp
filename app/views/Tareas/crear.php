<?php include __DIR__ . '/../layouts/head.php'; ?>
<?php include __DIR__ . '/../layouts/navbar.php'; ?>

<div class="container mt-4 d-flex justify-content-center">
<div class="col-md-6">
    <h1 class="text-center">Crear  Tarea</h1>
    <form action="/TODOapp/public/index.php?accion=crear" method="post">
        <input type="hidden" name="action" value="crear">
        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
        </div>
        <div class="mb-3 ">
            <label for="vencimiento" class="form-label">Fecha de Vencimiento</label>
            <input type="date" class="form-control" id="fecha_vencimiento" name="fecha_vencimiento" required>
        </div>
        <div class="d-grid">
        <button type="submit" class="btn btn-primary btn-block">Guardar Tarea</button>
        </div>
    </form>
</div>
</div>

<?php include __DIR__ . '/../layouts/footer.php'; ?>