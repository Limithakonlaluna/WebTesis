<?php

namespace App\Controllers;

use App\Models\CategoriaProductoModel;
use CodeIgniter\Controller;

class CategoriaProductoController extends BaseController
{
    public function createCategoriaProducto()
    {
        if (session('rol_id') == 1) {
            
            $data['titulo'] = 'Lista de Categoria Productos';
            
            session();
            $validation = \Config\Services::validation();
            $data['errores'] = $validation;

            return view('categoria_producto/crearCategoriaProducto', $data);
        } else {
            return redirect()->to(base_url('/iniciar_sesion'));
        }
    }

    public function saveCategoriaProducto()
    {
        if (session('rol_id') == 1) {
            if ($this->validate('categoriaProducto')) {
                $categoriaProducto = new CategoriaProductoModel();
    
                $data = [
                    'Categoria_nombre' => $this->request->getVar('categoria_nombre'),
                    'Categoria_estado' => 1
                ];
    
                $categoriaProducto->SaveCategoriaProducto($data);
                return redirect()->to(base_url('/listar_categoria_producto'));
            } else {
                return redirect()->to(base_url('/listar_categoria_producto'))->withInput();
            }
        } else {
            return redirect()->to(base_url('/iniciar_sesion'));
        }
    }


    public function listCategoriaProducto()
    {
        if (session('rol_id') == 1) {
            $categoriaProducto = new CategoriaProductoModel();
    
            $data['titulo'] = 'Lista de Categoria Productos';
            $data['categorias'] = $categoriaProducto->GetAllCategoriaProducto();

            session();
            $validation = \Config\Services::validation();
            $data['errores'] = $validation;

            return view('categoria_producto/listCategoriaProducto', $data);
        } else {
            return redirect()->to(base_url('/iniciar_sesion'));
        }
    }

    public function updateCategoriaProducto()
    {
        if (session('rol_id') == 1) {
            $categoria_id = $this->request->getVar('categoria_id');
            if ($this->validate('categoriaProducto')) {
                $categoriaProducto = new CategoriaProductoModel();
                $data = [
                    'Categoria_nombre' => $this->request->getVar('categoria_nombre')
                ];
                $categoriaProducto->updateCategoriaProducto($data, $categoria_id);
                return redirect()->to(base_url('/listar_categoria_producto'));
            } else {
                return redirect()->to(base_url('/listar_categoria_producto/'.$categoria_id))->withInput();
            }
        } else {
            return redirect()->to(base_url('/iniciar_sesion'));
        }
    }

    public function deleteCategoriaProducto($categoria_id)
    {
        if (session('rol_id') == 1) {
            $categoriaProducto = new CategoriaProductoModel();
            $categoriaProducto->ChangeState($categoria_id);
            return redirect()->to(base_url('/listar_categoria_producto'));
        } else {
            return redirect()->to(base_url('/iniciar_sesion'));
        }

    }
}
