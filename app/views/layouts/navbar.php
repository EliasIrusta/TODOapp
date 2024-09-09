<nav class="navbar bg-primary navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">TodoApp</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/TODOapp/public/index.php">Tareas</a>

                </li>                

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/TODOapp/public/index.php?accion=tareasCompletadas">Tareas Completadas</a>

                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/TODOapp/public/index.php?accion=tareasPendientes">Tareas Pendientes</a>

                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/TODOapp/public/index.php?accion=historialTareas">Historial Tareas</a>

            </ul>
            <form class="d-flex" action="/TODOapp/public/index.php" method="get">
                <input type="hidden" name="accion" value="buscar">
                <input class="form-control me-2" type="search" name="buscar" placeholder="Buscar tarea" aria-label="Buscar">
                <button class="btn btn-outline-success" type="submit">Buscar</button>
            </form>
        </div>
    </div>
</nav>