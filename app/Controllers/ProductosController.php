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
        $productos = $this->Productos_model->getProductos($where_productos);
        // pre_die($productos->paginate(10));
        $categorias = GetResultsByWhere('categorias', $where_categorias);

        $data = [
            'title' => 'Productos',
            'main_view' => 'layout/productos/productos_feed_view',
            'productos' => !empty($productos) ? $productos : [],
            // 'paginator' => !empty($productos) ? $productos->pager : [],
            'categorias' => !empty($categorias) ? $categorias : [],
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


        $categorias = GetResultsByWhere('categorias', $where_categorias);

        $data = [
            'title' => $categoria->nombre,
            'main_view' => 'layout/productos/productos_feed_view',
            'productos' => !empty($productos) ? $productos : [],
            // 'paginator' => !empty($productos) ? $productos->pager : [],
            'categorias' => !empty($categorias) ? $categorias : [],
        ];
        return view('layout/layout_main_view', $data);
    }
    public function NuevoProducto(): string
    {
        // $post = $this->request->getPost();
        // if (!empty($post)) {
        //     if ($validate = $this->ValidaFields($post)) {
        //         $this->session->setflashdata("error_title", "Error de Validación");
        //         $this->session->setflashdata("error", "Se encontraron los siguientes errores: " . implode(", ", $validate));
        //         $this->session->setflashdata("errores", $post);
        //         return redirect('productos/nuevo');
        //     } else {

        //         $producto_array = [
        //             'nombre' => !empty($post['nombre']) ? $post['nombre'] : NULL,
        //             'descripcion' => !empty($post['descripcion']) ? $post['descripcion'] : NULL,
        //             'stock' => !empty($post['stock']) ? $post['stock'] : NULL,
        //             'precio' => !empty($post['precio']) ? $post['precio'] : NULL,
        //             'estado' => true,
        //             'created_at' => getTimestamp()
        //         ];

        //         $id_producto = $this->Productos_model->insertProducto($producto_array);
        //         if ($id_producto > 0) {
        //             $this->session->setflashdata("success_title", "Gestión de Productos");
        //             $this->session->setflashdata("success", "Se ha realizado la creación de un nuevo Producto correctamente.");
        //             return redirect('productos/listado');
        //         } else {
        //             $this->session->setflashdata("error_title", "Error Interno");
        //             $this->session->setflashdata("error", "Ha Ocurrido un problema al crear el producto. Intentelo Nuevamente, si el problema persiste contácte a Soporte");
        //             $this->session->setflashdata("errores", $post);
        //             return redirect(base_url('productos/nuevo'));
        //         }
        //     }
        // }

        $data = [
            'title' => 'Formulario de Nuevo Producto',
            'main_view' => 'productos/productos_new_view'
        ];
        return view('layout/layout_main_view', $data);
    }

    public function EditarProducto($id)
    {
        $post = $this->request->getPost();
        $data = [
            'main_view' => 'productos/productos_new_view'
        ];
        return view('layout/layout_main_view', $data);
    }
    public function EliminarProducto()
    {
        $post = $this->request->getPost();
        $data = [
            'main_view' => 'productos/productos_new_view'
        ];
        return view('layout/layout_main_view', $data);
    }
    // private function ValidaFields($data)
    // {
    //     $error = [];
    //     $error_flag = false;

    //     if (validateText(trim($data['nombre']))) {
    //         $error_flag = true;
    //         $error['nombre'] = 'Nombre';
    //     }
    //     if (!empty($data['descripcion'])) {
    //         if (validateText(trim($data['descripcion']))) {
    //             $error_flag = true;
    //             $error['descripcion'] = 'Descripcion';
    //         }
    //     }
    //     if (!empty($data['precio'])) {
    //         if (!is_numeric(trim($data['precio']))) {
    //             $error_flag = true;
    //             $error['precio'] = 'Precio';
    //         }
    //     } else {
    //         $error_flag = true;
    //         $error['precio'] = 'Precio';
    //     }
    //     if (!empty($data['stock'])) {
    //         if (!is_numeric(trim($data['stock']))) {
    //             $error_flag = true;
    //             $error['stock'] = 'Stock';
    //         }
    //     } else {
    //         $error_flag = true;
    //         $error['stock'] = 'Stock';
    //     }

    //     if ($error_flag) {
    //         return $error;
    //     } else {
    //         return false;
    //     }
    // }
}
