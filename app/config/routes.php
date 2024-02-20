<?php

use App\Controllers\AboutController;
use App\Controllers\HomeController;
use App\Controllers\ProductController;

return [
    'routes' => [
        '/gabo/' => [HomeController::class, 'index'],
        '/gabo/about' => [AboutController::class, 'index'],
        '/gabo/product' => [ProductController::class, 'index'],
        '/gabo/product/store' => [ProductController::class, 'store'],
        '/gabo/product/{id}' => [ProductController::class, 'edit'],
    ],
];
