<form class="d-flex" action="/TODOapp/public/index.php" method="GET" >
    <input type="hidden" name="accion" value="buscar">
    <input type="hidden" name="vista" value="<?php echo htmlspecialchars($_GET['accion'] ?? ''); ?>">
    <input class="form-control me-2" type="search" name="buscar" placeholder="Buscar tarea" value="<?php echo htmlspecialchars($_GET['buscar'] ?? ''); ?>">
    <button type="submit" class="btn btn-outline-success">Buscar</button>
</form>
