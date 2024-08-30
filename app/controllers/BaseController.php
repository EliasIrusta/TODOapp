<?php

class BaseController {
    protected $rutaDeVistas = __DIR__ . '/../views/';

    public function renderizar($vista, $datos = []) {
        extract($datos);
        include $this->rutaDeVistas . $vista . '.php';
    }
}