<?php

namespace App\Controllers;

use App\Database\Migrations\Usuario;
use App\Models\CategoriaProductoModel;
use App\Models\ContactoModel;
use App\Models\DatosEmpresaModel;
use App\Models\HorarioUsuarioModel;
use App\Models\InstalacionModel;
use App\Models\OrdenModel;
use App\Models\ProductoModel;
use App\Models\RolModel;
use App\Models\TipoCultivoModel;
use App\Models\UsuarioModel;

class Home extends BaseController
{
    public function index()
    {
        if (session('estado') == 1) {
            return redirect()->to(base_url('/usuario_inicio'));
        }
        return view('index/inicio_pagina');
    }

    public function iniciar_sesion()
    {
        if (session('estado') == 1) {
            return redirect()->to(base_url('/usuario_inicio'));
        } else {
            $data['titulo'] = 'Iniciar Sesion';

            session();
            $validation = \Config\Services::validation();
            $data['errores'] = $validation;

            return view('login', $data);
        }
    }

    public function quienes_somos()
    {
        $datosEmpresa = new DatosEmpresaModel();

        $data['titulo'] = 'Quienes Somos';
        $data['datos'] = $datosEmpresa->GetAllDatosEmpresa();

        return view('quienes_somos', $data);
    }

    public function contactanos()
    {
        $contacto = new ContactoModel();

        $data['titulo'] = 'Contactanos';
        $data['contacto'] = $contacto->GetAllContactos();

        return view('contactanos', $data);
    }

    public function app_movil()
    {
        $data['titulo'] = 'Descarga la aplicacion Movil!';
        return view('app_movil', $data);
    }

    public function login()
    {
        if ($this->validate('login')) {
            $usuario = new UsuarioModel();
            $correo = trim($this->request->getVar('usuario_correo'));
            $pass = trim($this->request->getVar('usuario_contrasena'));

            $datosUsuario = $usuario->GetUsuario(['Usuario_correo' => $correo]);
            if (count($datosUsuario) > 0 && password_verify($pass, $datosUsuario[0]['Usuario_contrasena'])) {
                $data = [
                    'usuario_id' => $datosUsuario[0]['Usuario_id'],
                    'usuario_nombre' => $datosUsuario[0]['Usuario_nombre'],
                    'rol_id' => $datosUsuario[0]['Rol_id'],
                    'estado' => 1
                ];
                $session = session();
                $session->set($data);

                return redirect()->to(base_url('/usuario_inicio'));
            } else {
                return redirect()->to(base_url('/iniciar_sesion'));
            }
        } else {
            return redirect()->to(base_url('/iniciar_sesion'))->withInput();
        }
    }

    public function test()
    {
        $rol = new RolModel();
        $usuario = new UsuarioModel();
        $categoriaProducto = new CategoriaProductoModel();
        $producto = new ProductoModel();
        $horarioUsuario = new HorarioUsuarioModel();
        $instalacion = new InstalacionModel();
        $tipoCultivo = new TipoCultivoModel();

        $data['roles'] = $rol->GetAllRol();
        $data['usuarios'] = $usuario->GetAllUsuarios();
        $data['categorias'] = $categoriaProducto->GetAllCategoriaProducto();
        $data['productos'] = $producto->GetAllProductos();
        $data['trabajadores'] = $usuario->GetAllTrabajadores();
        $data['horarios'] = $horarioUsuario->GetAllHorarios();
        $data['instalaciones'] = $instalacion->GetAllInstalacion();
        $data['tipo_cultivos'] = $tipoCultivo->GetAllTipoCultivo();

        $validation = \Config\Services::validation();

        if ($validation != null) {
            $data['errores'] = $validation;
        }

        return view('test', $data);
    }

    public function createDatosEmpresa()
    {
        if (session('rol_id') == 1) {
            $datosEmpresa = new DatosEmpresaModel();
            $datos = $datosEmpresa->GetAllDatosEmpresa();

            if (count($datos) > 0) {

                return redirect()->to(base_url('/editar_datos_empresa/' . $datos[0]['Datos_id']));
            } else {
                $data['titulo'] = 'Datos Empresa';
                session();
                $validation = \Config\Services::validation();
                $data['errores'] = $validation;

                return view('datos_empresa/crearDatosEmpresa', $data);
            }
        } else {
            return redirect()->to(base_url('/iniciar_sesion'));
        }
    }


    public function saveDatosEmpresa()
    {
        if (session('rol_id') == 1) {

            if ($this->validate('datosEmpresa')) {
                $datosEmpresa = new DatosEmpresaModel();
                $data = [
                    'Usuario_id' => session('usuario_id'),
                    'Datos_mision' => $this->request->getVar('datos_mision'),
                    'Datos_vision' => $this->request->getVar('datos_vision'),
                    'Datos_comentario' => $this->request->getVar('datos_comentario')
                ];

                $datosEmpresa->saveDatosEmpresa($data);
                return redirect()->to(base_url('/usuario_inicio'));
            } else {
                return redirect()->to(base_url('/crear_datos_empresa'))->withInput();
            }
        } else {
            return redirect()->to(base_url('/usuario_inicio'));
        }
    }
    public function editDatosEmpresa($datos_id = null)
    {
        if (session('rol_id') == 1) {

            $datosEmpresa = new DatosEmpresaModel();

            $data['titulo'] = 'Editar Datos Empresa';
            $data['Datos'] = $datosEmpresa->GetAllDatosEmpresaForId($datos_id);

            session();
            $validation = \Config\Services::validation();
            $data['errores'] = $validation;

            return view('datos_empresa/editarDatosEmpresa', $data);
        } else {
            return redirect()->to(base_url('/iniciar_sesion'));
        }
    }


    public function updateDatosEmpresa()
    {
        if (session('rol_id') == 1) {
            $datos_id = $this->request->getVar('datos_id');
            if ($this->validate('datosEmpresa')) {
                $datosEmpresa = new DatosEmpresaModel();
                $data = [
                    'Usuario_id' => session('usuario_id'),
                    'Datos_mision' => $this->request->getVar('datos_mision'),
                    'Datos_vision' => $this->request->getVar('datos_vision'),
                    'Datos_comentario' => $this->request->getVar('datos_comentario')
                ];
                $datosEmpresa->UpdateDatosEmpresa($data, $datos_id);
                return redirect()->to(base_url('/usuario_inicio/'));
            } else {
                return redirect()->to(base_url('/editar_contactos/' . $datos_id))->withInput();
            }
        } else {
            return redirect()->to(base_url('/usuario_inicio'));
        }
    }

    public function exit()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('/'));
    }
}
