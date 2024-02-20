<?php

namespace App\Controllers;

class ProductController
{
    public function index()
    {

        $data = [
            'name' => 'John',
            'age' => 30
        ];

        // Carga la vista 'home' y pasa los datos
        return view('home', $data);
    }

    public function create()
    {

        echo 'crear';
    }

    public function edit($id)
    {
        $product_id = self::getParamsUrl($id);

        return view('home', compact('product_id'));
    }

    public static function getParamsUrl($url)
    {
        $url = $url->get('url');
        $parts = explode('/', $url);
        return $final = end($parts);
    }
}
