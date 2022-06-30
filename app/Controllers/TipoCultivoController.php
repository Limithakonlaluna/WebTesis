<?php

namespace App\Controllers;

use App\Models\TipoCultivoModel;
use CodeIgniter\Controller;

class TipoCultivoController extends BaseController
{
    public function listTipoCultivo()
    {
        if (session('rol_id') == 1) {
            $tipoCultivo = new TipoCultivoModel();

            $data['titulo'] = 'Listar tipo Cultivo';
            $data['tipo_cultivo'] = $tipoCultivo->GetAllTipoCultivo();

            session();
            $validation = \Config\Services::validation();
            $data['errores'] = $validation;

            if (session('success') != null) {
                switch (session('success')) {
                        // crear
                    case 1:
                        $data['mensaje'] = 'Tipo Cultivo Creado Exitosamente!';
                        break;

                        // Editar
                    case 2:
                        $data['mensaje'] = 'Tipo Cultivo Actualizado Exitosamente!';
                        break;

                        // Eliminar
                    case 3:
                        $data['mensaje'] = 'Tipo Cultivo Eliminado Exitosamente!';
                        break;
                }
                unset($_SESSION['success']);
            }

            return view('tipo_cultivo/listarTipoCultivo', $data);
        } else {
            return redirect()->to(base_url('/iniciar_sesion'));
        }
    }

    public function saveTipoCultivo()
    {
        if (session('rol_id') == 1) {
            if ($this->validate('tipoCultivo')) {
                $tipoCultivo = new TipoCultivoModel();
                $data = [
                    'Tipo_nombre' => $this->request->getVar('tipo_nombre'),
                    'Tipo_estado' => 1
                ];

                $_SESSION['success'] = 1;
                $tipoCultivo->saveTipoCultivo($data);
                return redirect()->to(base_url('/listar_tipo_cultivo'));
            } else {
                return redirect()->to(base_url('/listar_tipo_cultivo'))->withInput();
            }
        } else {
            return redirect()->to(base_url('/iniciar_sesion'));
        }
    }

    public function updateTipoCultivo()
    {
        if (session('rol_id') == 1) {
            $tipo_id = $this->request->getVar('tipo_id');
            if ($this->validate('tipoCultivo')) {
                $tipoCultivo = new TipoCultivoModel();
                $data = [
                    'Tipo_nombre' => $this->request->getVar('tipo_nombre'),
                ];

                $_SESSION['success'] = 2;
                $tipoCultivo->UpdateTipoCultivo($data, $tipo_id);
                return redirect()->to(base_url('/listar_tipo_cultivo'));
            } else {
                return redirect()->to(base_url('/editar_tipo_cultivo/' . $tipo_id))->withInput();
            }
        } else {
            return redirect()->to(base_url('/iniciar_sesion'));
        }
    }

    public function editTipoCultivo($tipo_id = null)
    {
        if (session('rol_id') == 1) {
            $tipoCultivo = new TipoCultivoModel();

            $data['titulo'] = 'Editar tipo Cultivo';
            $data['tipo_cultivo'] = $tipoCultivo->GetTipoCultivoForId($tipo_id);

            session();
            $validation = \Config\Services::validation();
            $data['errores'] = $validation;


            return view('tipo_cultivo/editarTipoCultivo', $data);
        } else {
            return redirect()->to(base_url('/iniciar_sesion'));
        }
    }

    public function deleteTipoCultivo($tipo_id = null)
    {
        if (session('rol_id') == 1) {
            $tipoCultivo = new TipoCultivoModel();

            $_SESSION['success'] = 3;
            $tipoCultivo->ChangeState($tipo_id);
            return redirect()->to(base_url('/listar_tipo_cultivo'));
        } else {
            return redirect()->to(base_url('/iniciar_sesion'));
        }
    }
}
