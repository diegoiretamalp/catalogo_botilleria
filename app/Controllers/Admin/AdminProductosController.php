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
        // Ruta al archivo CSV
        // $archivo_csv = 'C:\Users\diego\Downloads\productos2.csv';
        // // Abre el archivo en modo lectura
        // $archivo = fopen($archivo_csv, 'r');

        // // Verifica si se abrió correctamente el archivo
        // if ($archivo !== false) {
        //     // Lee el encabezado
        //     $encabezado = fgetcsv($archivo, 0, "\t");

        //     // Inicializa el array para almacenar los datos
        //     $datos = array();

        //     // Lee el contenido del archivo línea por línea
        //     while (($linea = fgets($archivo)) !== false) {
        //         // Convierte la línea en un array usando str_getcsv
        //         $fila = str_getcsv($linea, ",");
        //         // Agrega la fila al array de datos
        //         // pre_die($fila);

        //         switch (strtoupper($fila[3])) {
        //             case 'AGUAS':
        //                 $categoria = 1;
        //                 break;
        //             case 'AGUAS 1.5 LT':
        //                 $categoria = 2;
        //                 break;
        //             case 'AGUAS 500 CC':
        //                 $categoria = 3;
        //                 break;
        //             case 'BEBIDAS':
        //                 $categoria = 4;
        //                 break;
        //             case 'BEBIDAS EN LATA':
        //                 $categoria = 5;
        //                 break;
        //             case 'CERVEZAS':
        //                 $categoria = 6;
        //                 break;
        //             case 'CIGARROS':
        //                 $categoria = 7;
        //                 break;
        //             case 'ENERGETICAS':
        //                 $categoria = 8;
        //                 break;
        //             case 'ESPUMANTES':
        //                 $categoria = 9;
        //                 break;
        //             case 'JUGOS':
        //                 $categoria = 10;
        //                 break;
        //             case 'LICORES':
        //                 $categoria = 11;
        //                 break;
        //             case 'PISCOS':
        //                 $categoria = 12;
        //                 break;
        //             case 'RON':
        //                 $categoria = 13;
        //                 break;
        //             case 'TEQUILA':
        //                 $categoria = 14;
        //                 break;
        //             case 'VINOS':
        //                 $categoria = 15;
        //                 break;
        //             case 'VODKA':
        //                 $categoria = 16;
        //                 break;
        //             case 'WHISKY':
        //                 $categoria = 17;
        //                 break;
        //             default:
        //                 # code...
        //                 break;
        //         }
        //         // $categoria
        //         $datos = array(
        //             'codigo' => $fila[0],
        //             'nombre' => $fila[1],
        //             // 'unidad_medida' => $fila[1],
        //             'categoria_id' => $categoria,
        //             // 'impuesto_iva' => $fila[3],
        //             // 'impuesto_ila' => $fila[4],
        //             'stock' => $fila[6],
        //             'precio' => $fila[7],
        //             // 'created_at' => getTimestamp()
        //         );
        //         $id_producto = $this->Productos_model->insertProducto($datos);
        //         pre($id_producto);
        //     }
        //     pre_die($datos);

        //     // Cierra el archivo
        //     fclose($archivo);

            // Ahora, $datos contiene todos los datos del archivo CSV

            // // Conexión a la base de datos (ajusta los valores según tu configuración)
            // $conexion = new mysqli('localhost', 'usuario', 'contraseña', 'nombre_de_la_base_de_datos');

            // // Verifica la conexión
            // if ($conexion->connect_error) {
            //     die("Error de conexión a la base de datos: " . $conexion->connect_error);
            // }

            // // Itera sobre los datos y realiza la inserción en la base de datos
            // foreach ($datos as $dato) {
            //     $query = "INSERT INTO tu_tabla (producto, unidad_medida, familia, impuesto_iva, impuesto_ila, stock_critico, lista_publico) VALUES (?, ?, ?, ?, ?, ?, ?)";
            //     $stmt = $conexion->prepare($query);

            //     // Enlaza los parámetros
            //     $stmt->bind_param('sssssss', $dato['producto'], $dato['unidad_medida'], $dato['familia'], $dato['impuesto_iva'], $dato['impuesto_ila'], $dato['stock_critico'], $dato['lista_publico']);

            //     // Ejecuta la consulta
            //     $stmt->execute();

            //     // Cierra la consulta preparada
            //     $stmt->close();
            // }

            // // Cierra la conexión a la base de datos
            // $conexion->close();
        // } else {
        //     echo "No se pudo abrir el archivo CSV.";
        // }

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
        if (!is_numeric($id)) {
            return redirect('/');
        }

        $producto = $this->Productos_model->getProducto($id);

        if (empty($producto)) {
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
