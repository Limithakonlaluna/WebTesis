<?php

namespace App\Controllers;

use App\Models\HorarioUsuarioModel;
use CodeIgniter\Controller;

class HorarioController extends BaseController
{
    public function listHorario()
    {
        if (session('rol_id') == 1) {
            $horario = new HorarioUsuarioModel();

            $data['titulo'] = 'Lista de Horarios';
            $data['horarios'] = $horario->GetAllHorarios();

            session();
            $validation = \Config\Services::validation();
            $data['errores'] = $validation;

            return view('horario/listarHorario', $data);
        } else {
            return redirect()->to(base_url('/iniciar_sesion'));
        }
    }

    public function saveHorario()
    {
        if (session('rol_id') == 1) {
            if ($this->validate('horarioUsuario')) {
                $horarioUsuario = new HorarioUsuarioModel();
                $data = [
                    'Horario_inicio' => $this->request->getVar('horario_inicio'),
                    'Horario_fin' => $this->request->getVar('horario_fin'),
                    'Horario_estado' => 1
                ];

                $horarioUsuario->SaveHorario($data);
                return redirect()->to(base_url('/listar_horario'));
            } else {
                return redirect()->to(base_url('/listar_horario'))->withInput();
            }
        } else {
            return redirect()->to(base_url('/iniciar_sesion'));
        }
    }

    public function editHorario($Horario_id = null)
    {
        if (session('rol_id') == 1) {
            $horarioUsuario = new HorarioUsuarioModel();

            $data['titulo'] = 'Editar Horario';
            $data['horario'] = $horarioUsuario->GetHorarioForId($Horario_id);

            session();
            $validation = \Config\Services::validation();
            $data['errores'] = $validation;

            return view('horario/editarHorario', $data);
        } else {
            return redirect()->to(base_url('/iniciar_sesion'));
        }
    }

    public function updateHorario()
    {
        if (session('rol_id') == 1) {
            $horario_id = $this->request->getVar('horario_id');
            if ($this->validate('horarioUsuario')) {
                $horarioUsuario = new HorarioUsuarioModel();

                $data = [
                    'Horario_inicio' => $this->request->getVar('horario_inicio'),
                    'Horario_fin' => $this->request->getVar('horario_fin'),
                ];

                $horarioUsuario->UpdateHorario($data, $horario_id);
                return redirect()->to(base_url('/listar_horario'));
            } else {
                return redirect()->to(base_url('/editar_horario/' . $horario_id))->withInput();
            }
        } else {
            return redirect()->to(base_url('/iniciar_sesion'));
        }
    }

    public function deleteHorario($horario_id = null)
    {
        if (session('rol_id') == 1) {
            $horarioUsuario = new HorarioUsuarioModel();
            $horarioUsuario->ChangeState($horario_id);
            return redirect()->to(base_url('/listar_horario'));
        } else {
            return redirect()->to(base_url('/iniciar_sesion'));
        }
    }
}
