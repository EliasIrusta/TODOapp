<nav class="navbar bg-primary navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/public/index.php">Mis tareas</a>

                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/public/index.php?accion=crear">Crear Tarea</a>

                </li>

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/public/index.php?accion=tareasCompletadas">Tareas Completadas</a>

                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/public/index.php?accion=tareasPendientes">Tareas Pendientes</a>

                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/public/index.php?accion=historialTareas">Historial Tareas</a>

                </li>

            </ul>
            <form accion="/public/index.php" method="get" class="d-flex" role="Buscar">
                <input class="form-control me-2" type="text" placeholder="Buscar tareas por título" aria-label="Buscar"
                    value="<?php echo htmlspecialchars($_GET['buscar'] ?? ''); ?>">
                <button class="btn btn-outline-success" type="submit">Buscar</button>
            </form>
        </div>
    </div>
</nav>