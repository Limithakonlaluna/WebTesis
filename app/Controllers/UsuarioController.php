<?php

namespace App\Controllers;

use App\Models\HorarioUsuarioModel;
use App\Models\RolModel;
use App\Models\UsuarioModel;
use CodeIgniter\Controller;

class UsuarioController extends BaseController
{

    public function index()
    {
        switch (session('rol_id')) {
            case 1: //administrador
                $data['titulo'] = 'Inicio Administrador';
                return view('index/inicio_administrador', $data);
                break;

            case 3: //trabajador
                $data['titulo'] = 'Inicio Trabajador';

                session();
                $validation = \Config\Services::validation();
                $data['errores'] = $validation;

                return view('index/inicio_trabajador', $data);
                break;
            case 4: //trabajador bodega
                $data['titulo'] = 'Inicio Administrador';
                return view('index/inicio_trabajador_bodega', $data);
                break;
        }
    }

    public function createUsuario()
    {
        if (session('rol_id') == 1) {
            $rol = new RolModel();

            $data['titulo'] = 'Agregar Usuarios';
            $data['roles'] = $rol->GetAllRol();

            session();
            $validation = \Config\Services::validation();
            $data['errores'] = $validation;

            return view('usuario/crearUsuario', $data);
        } else {
            return redirect()->to(base_url('/iniciar_sesion'));
        }
    }

    public function saveUsuario()
    {
        if (session('rol_id') == 1) {
            if ($this->validate('usuario')) {
                $usuario = new UsuarioModel();
                $data = [
                    'Rol_id' => $this->request->getVar('rol_id'),
                    'Horario_id' => null,
                    'Usuario_nombre' => $this->request->getVar('usuario_nombre'),
                    'Usuario_correo' => $this->request->getVar('usuario_correo'),
                    'Usuario_contrasena' => password_hash(trim($this->request->getVar('usuario_contrasena2')), PASSWORD_DEFAULT),
                    'Usuario_direccion' => $this->request->getVar('usuario_direccion'),
                    'Usuario_telefono' => $this->request->getVar('usuario_telefono'),
                    'Usuario_estado' => 1
                ];

                if ($data['Rol_id'] == 3 || $data['Rol_id'] == 4 ){
                    $data['Horario_id'] = 1;
                }



                $usuarioFoto = $this->request->getFile('usuario_foto');
                $usuarioUrl = null;

                if ($usuarioFoto->isValid()) {
                    $usuarioNombre = $usuarioFoto->getName();
                    $usuarioFoto->move(ROOTPATH . 'public/uploads/trabajadores', $usuarioNombre);
                    $usuarioUrl = $usuarioNombre;
                    $data['Usuario_foto'] = $usuarioUrl;
                }

                $_SESSION['success'] = 1;
                $usuario->SaveUsuario($data);
                return redirect()->to(base_url('/listar_usuario'));
            }
            return redirect()->back()->withInput();
        } else {
            return redirect()->to(base_url('/iniciar_sesion'));
        }
    }

    public function listUsuario()
    {
        if (session('rol_id') == 1) {
            $usuario = new UsuarioModel();

            $data['titulo'] = 'Lista de Usuarios';
            $data['usuarios'] = $usuario->GetAllUsuarios();

            if (session('success') != null) {
                switch (session('success')) {
                        // crear
                    case 1:
                        $data['mensaje'] = 'Usuario Creado Exitosamente!';
                        break;

                        // Editar
                    case 2:
                        $data['mensaje'] = 'Usuario Actualizado Exitosamente!';
                        break;

                        // Eliminar
                    case 3:
                        $data['mensaje'] = 'Usuario Eliminado Exitosamente!';
                        break;
                }
                unset($_SESSION['success']);
            }

            return view('usuario/listarUsuario', $data);
        } else {
            return redirect()->to(base_url('/iniciar_sesion'));
        }
    }

    public function editUsuario($usuario_id = null)
    {
        if (session('rol_id') == 1) {
            $usuario = new UsuarioModel();
            $rol = new RolModel();
            $horarioUsuario = new HorarioUsuarioModel();

            $rol_usuario = $usuario->GetRolForUsuarioId($usuario_id);

            $data['roles'] = $rol->GetAllRol(); 
            $data['horarios'] = $horarioUsuario->GetAllHorarios();

            if ($rol_usuario[0]['Rol_id'] == 1 || $rol_usuario[0]['Rol_id'] == 3 || $rol_usuario[0]['Rol_id'] == 4) {
                $data['usuario'] = $usuario->GetUsuarioForId($usuario_id);
            } else if ($rol_usuario[0]['Rol_id'] == 2) {
                $data['usuario'] = $usuario->GetUsuarioCliente($usuario_id);
            }

            session();
            $validation = \Config\Services::validation();
            $data['errores'] = $validation;

            return view('usuario/editarUsuario', $data);
        } else {
            return redirect()->to(base_url('/iniciar_sesion'));
        }
    }

    public function updateUsuario()
    {
        if (session('rol_id') == 1) {
            $usuario_id = $this->request->getVar('usuario_id');
            if ($this->validate('trabajador')) {
                $usuario = new UsuarioModel();

                $data['Rol_id'] = $this->request->getVar('rol_id');

                if ($this->request->getVar('horario_id') != 0) {
                    $data['Horario_id'] = $this->request->getVar('horario_id');
                }

                $data['Usuario_nombre'] = $this->request->getVar('usuario_nombre');
                $data['Usuario_correo'] = $this->request->getVar('usuario_correo');
                $data['Usuario_contrasena'] = password_hash(trim($this->request->getVar('usuario_contrasena2')), PASSWORD_DEFAULT);
                $data['Usuario_direccion'] = $this->request->getVar('usuario_direccion');
                $data['Usuario_telefono'] = $this->request->getVar('usuario_telefono');
                
                $usuarioFoto = $this->request->getFile('usuario_foto');
                $usuarioUrl = null;

                if ($data['Rol_id'] == 3 || $data['Rol_id'] == 4 ){
                    $data['Horario_id'] = 1;
                }

                if ($usuarioFoto->isValid()) {
                    $usuarioNombre = $usuarioFoto->getName();
                    $usuarioFoto->move(ROOTPATH . 'public/uploads/trabajadores', $usuarioNombre);
                    $usuarioUrl = $usuarioNombre;
                    $data['Usuario_foto'] = $usuarioUrl;
                }

                $_SESSION['success'] = 2;
                $usuario->UpdateUsuario($data, $usuario_id);
                return redirect()->to(base_url('/listar_usuario'));
            } else {
                return redirect()->to(base_url('/editar_usuario/' . $usuario_id))->withInput();
            }
        } else {
            return redirect()->to(base_url('/iniciar_sesion'));
        }
    }

    public function deleteUsuario($usuario_id = null)
    {
        if (session('rol_id') == 1) {
            $usuario = new UsuarioModel();

            $_SESSION['success'] = 3;
            $usuario->ChangeState($usuario_id);
            return redirect()->to(base_url('/listar_usuario'));
        } else {
            return redirect()->to(base_url('/iniciar_sesion'));
        }
    }

    public function verDatos()
    {
        if (session('rol_id') == 1 || session('rol_id') == 3 || session('rol_id') == 4) {
            $usuario = new UsuarioModel();

            $data['titulo'] = 'Ver Datos';
            $data['datos'] = $usuario->GetUsuarioForId(session('usuario_id'));

            return view('usuario/verDatos', $data);
        } else {
            return redirect()->to(base_url('/iniciar_sesion'));
        }
    }
}
