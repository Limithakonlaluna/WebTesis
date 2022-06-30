<?php

namespace App\Controllers;

use App\Models\CategoriaProductoModel;
use App\Models\ProductoModel;
use CodeIgniter\Controller;

class ProductoController extends BaseController
{
    public function productos_invitado()
    {
        $producto = new ProductoModel();
        $categoriaProducto = new CategoriaProductoModel();

        $data['titulo'] = 'Productos';
        $data['productos'] = $producto->GetAllProductos();
        $data['categorias'] = $categoriaProducto->GetAllCategoriaProducto();

        return view('producto/producto_invitado', $data);
    }

    public function invitadoProductoFiltro()
    {
        $producto = new ProductoModel();
        $categoriaProducto = new CategoriaProductoModel();

        $data['titulo'] = 'Productos';

        if ($this->request->getVar('Categoria_id') > 0) {
            $data['productos'] = $producto->getAllProductosForCategoria($this->request->getVar('Categoria_id'));
        } else {
            $data['productos'] = $producto->GetAllProductos();
        }

        $data['categorias'] = $categoriaProducto->GetAllCategoriaProducto();

        return view('producto/producto_invitado', $data);
    }

    public function ver_detalles($producto_id = null)
    {
        $producto = new ProductoModel();

        $data['titulo'] = 'Ver Detalles';
        $data['productoDetalle'] = $producto->GetProductoForId($producto_id);

        return view('producto/ver_detalles', $data);
    }

    public function createProducto()
    {
        if (session('rol_id') == 1 || session('rol_id') == 4) {
            $categoria_producto = new CategoriaProductoModel();

            $data['titulo'] = 'Agregar Producto';
            $data['categorias'] = $categoria_producto->GetAllCategoriaProducto();

            session();
            $validation = \Config\Services::validation();
            $data['errores'] = $validation;

            return view('producto/crearProducto', $data);
        } else {
            return redirect()->to(base_url('/iniciar_sesion'));
        }
    }

    public function saveProducto()
    {
        if (session('rol_id') == 1 || session('rol_id') == 4) {
            if ($this->validate('producto')) {
                $producto = new ProductoModel();

                $productoFoto = $this->request->getFile('producto_foto');
                $productoUrl = null;

                if ($productoFoto->isValid()) {
                    $productoNombre = $productoFoto->getName();
                    $productoFoto->move(ROOTPATH . 'public/uploads/kits', $productoNombre);
                    $productoUrl = $productoNombre;
                }

                $data = [
                    'Categoria_id' => $this->request->getVar('categoria_id'),
                    'Producto_nombre' => $this->request->getVar('producto_nombre'),
                    'Producto_descripcion' => $this->request->getVar('producto_descripcion'),
                    'Producto_precio' => $this->request->getVar('producto_precio'),
                    'Producto_estado' => 1,
                    'Producto_stock' => $this->request->getVar('producto_stock'),
                    'Producto_foto' => $productoUrl,
                ];

                $_SESSION['success'] = 1;
                $producto->SaveProducto($data);
                return redirect()->to(base_url('/listar_producto'));
            } else {
                return redirect()->to(base_url('/crear_producto'))->withInput();
            }
        } else {
            return redirect()->to(base_url('/iniciar_sesion'));
        }
    }

    public function listProducto()
    {
        if (session('rol_id') == 1 || session('rol_id') == 4) {
            $producto = new ProductoModel();
            $categoriaProducto = new CategoriaProductoModel();

            $data['titulo'] = 'Listado de Productos';
            $data['productos'] = $producto->GetAllProductos();
            $data['categorias'] = $categoriaProducto->GetAllCategoriaProducto();

            if (session('success') != null) {
                switch (session('success')) {
                        // crear
                    case 1:
                        $data['mensaje'] = 'Producto Creado Exitosamente!';
                        break;

                        // Editar
                    case 2:
                        $data['mensaje'] = 'Producto Actualizado Exitosamente!';
                        break;

                        // Eliminar
                    case 3:
                        $data['mensaje'] = 'Producto Eliminado Exitosamente!';
                        break;
                }
                unset($_SESSION['success']);
            }

            return view('producto/listarProducto', $data);
        } else {
            return redirect()->to(base_url('/iniciar_sesion'));
        }
    }

    public function listProductoFiltro()
    {
        if (session('rol_id') == 1 || session('rol_id') == 4) {
            $producto = new ProductoModel();
            $categoriaProducto = new CategoriaProductoModel();

            $data['titulo'] = 'Listado de Productos';

            if ($this->request->getVar('Categoria_id') > 0) {
                $data['productos'] = $producto->getAllProductosForCategoria($this->request->getVar('Categoria_id'));
            } else {
                $data['productos'] = $producto->GetAllProductos();
            }

            $data['categorias'] = $categoriaProducto->GetAllCategoriaProducto();

            return view('producto/listarProducto', $data);
        } else {
            return redirect()->to(base_url('/iniciar_sesion'));
        }
    }

    public function editProducto($producto_id = null)
    {
        if (session('rol_id') == 1 || session('rol_id') == 4) {

            $producto = new ProductoModel();
            $categoriaProducto = new CategoriaProductoModel();


            $data['titulo'] = 'Editar Producto';
            $data['producto'] = $producto->GetProductoForId($producto_id);
            $data['categorias'] = $categoriaProducto->GetAllCategoriaProducto();

            session();
            $validation = \Config\Services::validation();
            $data['errores'] = $validation;

            return view('producto/editarProducto', $data);
        } else {
            return redirect()->to(base_url('/iniciar_sesion'));
        }
    }

    public function updateProducto()
    {
        if (session('rol_id') == 1 || session('rol_id') == 4) {
            $producto_id = $this->request->getVar('producto_id');

            if ($this->validate('producto')) {
                $producto = new ProductoModel();

                $productoFoto = $this->request->getFile('producto_foto');
                $productoUrl = null;

                if ($productoFoto->isValid()) {
                    $productoNombre = $productoFoto->getName();
                    $productoFoto->move(ROOTPATH . 'public/uploads/kits', $productoNombre);
                    $productoUrl = $productoNombre;

                    $data = [
                        'Categoria_id' => $this->request->getVar('categoria_id'),
                        'Producto_nombre' => $this->request->getVar('producto_nombre'),
                        'Producto_descripcion' => $this->request->getVar('producto_descripcion'),
                        'Producto_precio' => $this->request->getVar('producto_precio'),
                        'Producto_stock' => $this->request->getVar('producto_stock'),
                        'Producto_foto' => $productoUrl,
                    ];
                } else {
                    $data = [
                        'Categoria_id' => $this->request->getVar('categoria_id'),
                        'Producto_nombre' => $this->request->getVar('producto_nombre'),
                        'Producto_descripcion' => $this->request->getVar('producto_descripcion'),
                        'Producto_precio' => $this->request->getVar('producto_precio'),
                        'Producto_stock' => $this->request->getVar('producto_stock'),
                    ];
                }

                $_SESSION['success'] = 2;
                $producto->UpdateProducto($data, $producto_id);
                return redirect()->to(base_url('/listar_producto'));
            } else {
                return redirect()->to(base_url('/editar_producto/' . $producto_id))->withInput();
            }
        } else {
            return redirect()->to(base_url('/iniciar_sesion'));
        }
    }

    public function deleteProducto($producto_id = null)
    {
        if (session('rol_id') == 1 || session('rol_id') == 4) {
            $producto = new ProductoModel();

            $_SESSION['success'] = 3;
            $producto->ChangeState($producto_id);
            return redirect()->to(base_url('/listar_producto'));
        } else {
            return redirect()->to(base_url('/iniciar_sesion'));
        }
    }
}
