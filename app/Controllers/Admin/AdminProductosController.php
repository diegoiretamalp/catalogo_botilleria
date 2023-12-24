<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class AdminProductosController extends BaseController
{
    public function __construct()
    {
        $this->session = session();
        $this->Productos_model = model('App\Models\Productos_model');
    }

    public function index(): string
    {
        $where_productos = [
            'p.estado' => true,
            'p.deleted' => false
        ];
        $where_categorias = [
            'estado' => true,
            'deleted' => false
        ];
        $productos = $this->Productos_model->getProductosJoin($where_productos);
        // pre_die($productos->paginate(10));
        // $categorias = GetResultsByWhere('categorias', $where_categorias);

        $data = [
            'title' => 'Productos',
            'main_view' => 'productos/productos_list_view',
            'productos' => !empty($productos) ? $productos : [],
            
        ];
        return view('layout/layout_main_view', $data);
    }

    public function NuevoProducto()
    {
        $post = $this->request->getPost();
        if (!empty($post)) {
            if ($validate = $this->ValidaFields($post)) {
                $this->session->setflashdata("error_title", "Error de Validación");
                $this->session->setflashdata("error", "Se encontraron los siguientes errores: " . implode(", ", $validate));
                $this->session->setflashdata("errores", $post);
                return redirect('admin/productos/nuevo');
            } else {

                $producto_array = [
                    'nombre' => !empty($post['nombre']) ? $post['nombre'] : NULL,
                    'descripcion' => !empty($post['descripcion']) ? $post['descripcion'] : NULL,
                    'stock' => !empty($post['stock']) ? $post['stock'] : NULL,
                    'precio' => !empty($post['precio']) ? $post['precio'] : NULL,
                    'codigo' => !empty($post['codigo']) ? $post['codigo'] : NULL,
                    'categoria_id' => !empty($post['categoria_id']) ? $post['categoria_id'] : NULL,
                    'estado' => true,
                    'created_at' => getTimestamp()
                ];

                $id_producto = $this->Productos_model->insertProducto($producto_array);
                if ($id_producto > 0) {
                    $this->session->setflashdata("success_title", "Gestión de Productos");
                    $this->session->setflashdata("success", "Se ha realizado la creación de un nuevo Producto correctamente.");
                    return redirect()->route('admin/productos/listado');
                } else {
                    $this->session->setflashdata("error_title", "Error Interno");
                    $this->session->setflashdata("error", "Ha Ocurrido un problema al crear el producto. Intentelo Nuevamente, si el problema persiste contácte a Soporte");
                    $this->session->setflashdata("errores", $post);
                    return redirect('admin/productos/nuevo');
                }
            }
        }

        $where_categorias = [
            'estado' => true,
            'deleted' => false
        ];
        $categorias = GetResultsByWhere('categorias', $where_categorias);

        $data = [
            'title' => 'Formulario de Nuevo Producto',
            'main_view' => 'productos/productos_new_view',
            'categorias' => !empty($categorias) ? $categorias : [],
            'js_content' => [
                '0' => 'layout/js/GeneralJS',
                '1' => 'productos/js/ProductosNewJS',
            ]
        ];
        return view('layout/layout_main_view', $data);
    }

    public function EditarProducto($id)
    {
        if(!is_numeric($id)){
            return redirect('/');
        }

        $producto = $this->Productos_model->getProducto($id);

        if(empty($producto)){
            return redirect('/');
        }

        $post = $this->request->getPost();
        if (!empty($post)) {
            if ($validate = $this->ValidaFields($post)) {
                $this->session->setflashdata("error_title", "Error de Validación");
                $this->session->setflashdata("error", "Se encontraron los siguientes errores: " . implode(", ", $validate));
                $this->session->setflashdata("errores", $post);
                return redirect('admin/productos/nuevo');
            } else {

                $producto_array = [
                    'nombre' => !empty($post['nombre']) ? $post['nombre'] : NULL,
                    'descripcion' => !empty($post['descripcion']) ? $post['descripcion'] : NULL,
                    'stock' => !empty($post['stock']) ? $post['stock'] : NULL,
                    'precio' => !empty($post['precio']) ? $post['precio'] : NULL,
                    'codigo' => !empty($post['codigo']) ? $post['codigo'] : NULL,
                    'categoria_id' => !empty($post['categoria_id']) ? $post['categoria_id'] : NULL,
                    'estado' => true,
                    'created_at' => getTimestamp()
                ];

                $id_producto = $this->Productos_model->insertProducto($producto_array);
                if ($id_producto > 0) {
                    $this->session->setflashdata("success_title", "Gestión de Productos");
                    $this->session->setflashdata("success", "Se ha realizado la creación de un nuevo Producto correctamente.");
                    return redirect()->route('admin/productos/listado');
                } else {
                    $this->session->setflashdata("error_title", "Error Interno");
                    $this->session->setflashdata("error", "Ha Ocurrido un problema al crear el producto. Intentelo Nuevamente, si el problema persiste contácte a Soporte");
                    $this->session->setflashdata("errores", $post);
                    return redirect('admin/productos/nuevo');
                }
            }
        }

        $where_categorias = [
            'estado' => true,
            'deleted' => false
        ];
        $categorias = GetResultsByWhere('categorias', $where_categorias);

        $data = [
            'main_view' => 'productos/productos_edit_view',
            'producto' => !empty($producto) ? $producto : [],
            'categorias' => !empty($categorias) ? $categorias : [],
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
    private function ValidaFields($data)
    {
        $error = [];
        $error_flag = false;

        if (validateText(trim($data['nombre']))) {
            $error_flag = true;
            $error['nombre'] = 'Nombre';
        }
        if (!empty($data['descripcion'])) {
            if (validateText(trim($data['descripcion']))) {
                $error_flag = true;
                $error['descripcion'] = 'Descripcion';
            }
        }
        if (!empty($data['precio'])) {
            if (!is_numeric(trim($data['precio']))) {
                $error_flag = true;
                $error['precio'] = 'Precio';
            }
        } else {
            $error_flag = true;
            $error['precio'] = 'Precio';
        }
        if (!empty($data['stock'])) {
            if (!is_numeric(trim($data['stock']))) {
                $error_flag = true;
                $error['stock'] = 'Stock';
            }
        } else {
            $error_flag = true;
            $error['stock'] = 'Stock';
        }

        if ($error_flag) {
            return $error;
        } else {
            return false;
        }
    }
}
