<?php

namespace App\Controllers;

class ProductosController extends BaseController
{
    public function __construct()
    {
        $this->session = session();
        $this->Productos_model = model('App\Models\Productos_model');
    }

    public function index(): string
    {
        $where_productos = [
            'estado' => true,
            'deleted' => false
        ];
        $where_categorias = [
            'estado' => true,
            'deleted' => false
        ];
        // pre_die($productos->paginate(10));
        $page = 1;
        $perPage = 10;
        $categorias = GetResultsByWhere('categorias', $where_categorias);


        $productos = $this->Productos_model->getProductos($where_productos);

        $data = [
            'title' => 'Productos',
            'main_view' => 'productos/productos_feed_view',
            'productos' => !empty($productos) ? $productos : [],
            // 'paginator' => !empty($productos) ? $productos->pager : [],
            'categorias' => !empty($categorias) ? $categorias : [],
            'js_content' => [
                '0' => 'layout/js/GeneralJS',
                '1' => 'productos/js/ProductosFeedJS'
            ],
        ];
        return view('layout/layout_main_view', $data);
    }

    public function ProductosCategoria($url_categoria)
    {
        if (empty($url_categoria)) {
            return redirect('productos');
        }

        $categoria = GetRowObjectByWhere('categorias', ['url_categoria' => $url_categoria, 'estado' => true]);

        if (empty($categoria)) {
            return redirect('productos');
        }

        $where_productos = [
            'categoria_id' => $categoria->id,
            'estado' => true,
            'deleted' => false,
        ];

        $where_categorias = [
            'estado' => true,
            'deleted' => false
        ];
        $productos = $this->Productos_model->getProductos($where_productos);
        // pre_die($productos);


        $categorias = GetResultsByWhere('categorias', $where_categorias);

        $data = [
            'title' => $categoria->nombre,
            'main_view' => 'productos/productos_feed_view',
            'productos' => !empty($productos) ? $productos : [],
            'url_categoria' => !empty($url_categoria) ? $url_categoria : [],
            // 'paginator' => !empty($productos) ? $productos->pager : [],
            'categorias' => !empty($categorias) ? $categorias : [],
            'js_content' => [
                '0' => 'layout/js/GeneralJS',
                '1' => 'productos/js/ProductosCategoriaJS'
            ],
        ];
        return view('layout/layout_main_view', $data);
    }


    public function PaginarFeed()
    {
        $post = $this->request->getPost();
        $rsp = [];
        if (!empty($post)) {
            // pre_die();
            $page = !empty($post['data']['page']) ? $post['data']['page'] : 1;
            $perPage = !empty($post['data']['perPage']) ? $post['data']['perPage'] : 12;

            $where_productos = [
                'estado' => true,
                'deleted' => false,
            ];

            $productos = $this->Productos_model->getProductosPaginate($where_productos, $perPage, $page);

            if (!empty($productos)) {
                $rsp = [
                    'tipo' => 'success',
                    'title' => 'Gestión de Vehiculos',
                    'msg' => 'Datos cargados con éxito.',
                    'data' => $productos,
                ];
                http_response_code(200); // Código de estado HTTP: 200 OK
            } else {
                $rsp = [
                    'tipo' => 'warning',
                    'title' => 'Gestión de Vehiculos',
                    'msg' => 'No se han encontado resultados para los filtros establecidos.'
                ];
                http_response_code(404); // Código de estado HTTP: 200 OK
            }
        } else {
            $rsp = [
                'tipo' => 'error',
                'title' => 'Error de Validación',
                'msg' => 'Datos no recibidos por el servidor'
            ];
            http_response_code(400); // Código de estado HTTP: 200 OK
        }
        header('Content-Type: application/json');
        echo json_encode($rsp);
        exit;
    }
    public function PaginarProCate($url_categoria = null)
    {
        $post = $this->request->getPost();
        $rsp = [];
        if (!empty($post)) {
            // pre_die();
            $page = !empty($post['data']['page']) ? $post['data']['page'] : 1;
            $perPage = !empty($post['data']['perPage']) ? $post['data']['perPage'] : 12;

            $where_productos = [
                'estado' => true,
                'deleted' => false,
                'categoria_id' => 1
            ];

            if (!empty($url_categoria)) {
                $categoria = GetRowObjectByWhere('categorias', ['url_categoria' => $url_categoria]);
                if (!empty($categoria)) {
                    $where_productos['categoria_id'] = $categoria->id;
                }
            }
            $productos = $this->Productos_model->getProductosPaginate($where_productos, $perPage, $page);

            if (!empty($productos)) {
                $rsp = [
                    'tipo' => 'success',
                    'title' => 'Gestión de Vehiculos',
                    'msg' => 'Datos cargados con éxito.',
                    'data' => $productos,
                ];
                http_response_code(200); // Código de estado HTTP: 200 OK
            } else {
                $rsp = [
                    'tipo' => 'warning',
                    'title' => 'Gestión de Vehiculos',
                    'msg' => 'No se han encontado resultados para los filtros establecidos.'
                ];
                http_response_code(404); // Código de estado HTTP: 200 OK
            }
        } else {
            $rsp = [
                'tipo' => 'error',
                'title' => 'Error de Validación',
                'msg' => 'Datos no recibidos por el servidor'
            ];
            http_response_code(400); // Código de estado HTTP: 200 OK
        }
        header('Content-Type: application/json');
        echo json_encode($rsp);
        exit;
    }
}
