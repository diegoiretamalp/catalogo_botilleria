<?php

namespace App\Controllers;

class MainController extends BaseController
{
    public function index()
    {

        $data = [
            'title' => '',
            'main_view' => 'main/web_main_view',
            // 'productos' => !empty($productos) ? $productos : [],
            // 'url_categoria' => !empty($url_categoria) ? $url_categoria : [],
            // 'paginator' => !empty($productos) ? $productos->pager : [],
            // 'categorias' => !empty($categorias) ? $categorias : [],
            'js_content' => [
                '0' => 'main/js/MainJS',
                // '1' => 'productos/js/ProductosCategoriaJS'
            ],
        ];
        return view('layout/layout_main_view', $data);
    }
}