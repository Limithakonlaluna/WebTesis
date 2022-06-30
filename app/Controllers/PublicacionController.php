<?php

namespace App\Controllers;

use App\Models\PublicacionModel;
use CodeIgniter\Controller;

class PublicacionController extends BaseController
{
    public function savePublicacion()
    {
        if (session('rol_id') == 3) {
            if ($this->validate('publicacion')) {
                $publicacion = new PublicacionModel();

                $data['Usuario_id'] = session('usuario_id');
                $data['Publicacion_nombre'] = $this->request->getVar('publicacion_nombre');
                $data['Publicacion_descripcion'] = $this->request->getVar('publicacion_descripcion');

                $publicacionFoto = $this->request->getFile('publicacion_imagen');
                $publicacionUrl = null;

                if ($publicacionFoto->isValid()) {
                    $publicacionNombre = $publicacionFoto->getName();
                    $publicacionFoto->move(ROOTPATH . 'public/uploads/publicaciones', $publicacionNombre);
                    $publicacionUrl = $publicacionNombre;
                    $data['Publicacion_imagen'] = $publicacionUrl;
                }

                $data['Publicacion_estado'] = 1;

                $publicacion->SavePublicacion($data);
                return redirect()->to(base_url('/usuario_inicio'));
            } else {
                return redirect()->to(base_url('/usuario_inicio'))->withInput();
            }
        } else {
            return redirect()->to(base_url('/iniciar_sesion'));
        }
    }
    
    public function listPublicacion()
    {
        if (session('rol_id') == 3 || session('rol_id') == 1) {
            $publicacion = new PublicacionModel();

            $data['titulo'] = 'Listar Instalaciones';
            $data['publicaciones'] = $publicacion->GetAllPublicacion();

            return view('publicacion/listarPublicacion', $data);
        } else {
            return redirect()->to(base_url('/iniciar_sesion'));
        }
    }

    public function verPublicacion($publicacion_id = null)
    {
        if (session('rol_id') == 3 || session('rol_id') == 1) {
            $publicacion = new PublicacionModel();

            $data['titulo'] = 'Listar Publicaciones';
            $data['publicaciones'] = $publicacion->GetAllPublicacion();
            $data['datosPublicacion'] = $publicacion->GetAllPublicacionForId($publicacion_id);

            session();
            $validation = \Config\Services::validation();
            $data['errores'] = $validation;

            return view('publicacion/listarPublicacion', $data);
        } else {
            return redirect()->to(base_url('/iniciar_sesion'));
        }
    }
    
    public function verMisPublicacion()
    {
        if (session('rol_id') == 3 || session('rol_id') == 1) {
            $publicacion = new PublicacionModel();

            $data['titulo'] = 'Listar Publicaciones';
            $data['publicaciones'] = $publicacion->GetAllMyPublicacion();

            session();
            $validation = \Config\Services::validation();
            $data['errores'] = $validation;

            return view('publicacion/ver_mis_publicacion', $data);
        } else {
            return redirect()->to(base_url('/iniciar_sesion'));
        }
    }
    public function editPublicacion($publicacion_id = null)
    {
        if (session('rol_id') == 3) {
            $publicacion = new PublicacionModel();

            $data['titulo'] = 'Editar Publicacion';
            $data['publicacion'] = $publicacion->GetAllPublicacionForId($publicacion_id);

            session();
            $validation = \Config\Services::validation();
            $data['errores'] = $validation;

            return view('publicacion/editarPublicacion', $data);
        } else {
            return redirect()->to(base_url('/iniciar_sesion'));
        }
    }

    public function updatePublicacion()
    {
        if (session('rol_id') == 3) {
            $publicacion_id = $this->request->getVar('publicacion_id');
            if ($this->validate('publicacion')) {
                $publicacion = new PublicacionModel();

               
                $data['Publicacion_nombre'] = $this->request->getVar('publicacion_nombre');
                $data['Publicacion_descripcion'] = $this->request->getVar('publicacion_descripcion');
                
                $publicacionFoto = $this->request->getFile('publicacion_imagen');
                $publicacionUrl = null;

                if ($publicacionFoto->isValid()) {
                    $publicacionNombre = $publicacionFoto->getName();
                    $publicacionFoto->move(ROOTPATH . 'public/uploads/publicaciones', $publicacionNombre);
                    $publicacionUrl = $publicacionNombre;
                    $data['Publicacion_imagen'] = $publicacionUrl;
                }

                $_SESSION['success'] = 2;
                $publicacion->UpdatePublicacion($data, $publicacion_id);
                return redirect()->to(base_url('/ver_mis_publicacion'));
            } else {
                return redirect()->to(base_url('/editarPublicacion' . $publicacion_id))->withInput();
            }
        } else {
            return redirect()->to(base_url('/iniciar_sesion'));
        }
    }

    public function deletePublicacion($publicacion_id = null)
    {
        if (session('rol_id') == 3) {
            $publicacion = new PublicacionModel();
            $publicacion->DeletePublicacion($publicacion_id);
            return redirect()->to(base_url('/ver_mis_publicacion'));
        } else {
            return redirect()->to(base_url('/iniciar_sesion'));
        }
    }
}
