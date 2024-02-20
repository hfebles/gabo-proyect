<?php

function view($view, $data = [])
{
    extract($data);
    include_once 'resources/views/' . $view . '.php';

    // $views = './resources/views/';
    // $cache = './resources/cache/';
    // $blade = new Blade($views, $cache);
    // return $blade->make($view, $data)->render();
}

function config($key)
{
    // Directorio de configuraciones
    $configDir = __DIR__ . '/../config/';

    // Obtener todos los archivos de configuración en el directorio
    $configFiles = glob($configDir . '*.php');

    // Arreglo para almacenar todas las configuraciones
    $allConfigs = [];

    // Cargar todas las configuraciones
    foreach ($configFiles as $file) {
        $config = include $file;
        if (is_array($config)) {
            $allConfigs = array_merge($allConfigs, $config);
        }
    }

    // Devolver la configuración correspondiente a la clave
    return $allConfigs[$key] ?? null;
}
