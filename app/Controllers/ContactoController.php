<?php 
namespace App\Controllers;

use App\Models\ContactoModel;
use App\Models\UsuarioModel;
use CodeIgniter\Controller;
use Psr\Log\AbstractLogger;

class ContactoController extends BaseController{
    // continuar con el crud para agregar nuevos contactos
    public function createContacto()
    {
        if (session('rol_id') == 1) {
            $usuario = new UsuarioModel();

            $data['titulo'] = 'Agregar Contacto';
            $data['usuarios'] = $usuario->GetAllTrabajadores();

            session();
            $validation = \Config\Services::validation();
            $data['errores'] = $validation;

            return view('contacto/crearContacto', $data);
        } else {
            return redirect()->to(base_url('/iniciar_sesion'));
        }
    }

    public function saveContacto()
    {
        if (session('rol_id') == 1) {
            if ($this->validate('contacto')) {
                $contacto = new ContactoModel();

                $data['Usuario_id'] = $this->request->getVar('usuario_id'); 
                $data['Contacto_nombre'] = $this->request->getVar('contacto_nombre'); 
                $data['Contacto_email'] = $this->request->getVar('contacto_email'); 
                $data['Contacto_telefono'] = $this->request->getVar('contacto_telefono'); 
                $data['Contacto_estado'] = 1; 

                $_SESSION['success'] = 1;
                $contacto->SaveContacto($data);
                return redirect()->to(base_url('/listar_contactos'));
            } else {
                return redirect()->to(base_url('/agregar_contactos'))->withInput();
            }
        } else {
            return redirect()->to(base_url('/iniciar_sesion'));
        }
    }

    public function listContacto()
    {
        if (session('rol_id') == 1) {
            $contacto = new ContactoModel();

            $data['titulo'] = 'Listar Contactos';
            $data['contacto'] = $contacto->GetAllContactos();

            session();
            $validation = \Config\Services::validation();
            $data['errores'] = $validation;

            if (session('success') != null) {
                switch (session('success')) {
                        // crear
                    case 1:
                        $data['mensaje'] = 'Contacto Creado Exitosamente!';
                        break;

                        // Editar
                    case 2:
                        $data['mensaje'] = 'Contacto Actualizado Exitosamente!';
                        break;

                        // Eliminar
                    case 3:
                        $data['mensaje'] = 'Contacto Eliminado Exitosamente!';
                        break;
                }
                unset($_SESSION['success']);
            }

            return view('contacto/listarContacto', $data);
        } else {
            return redirect()->to(base_url('/iniciar_sesion'));
        }
    }

    public function editContacto($contacto_id)
    {
        if (session('rol_id') == 1) {
            $contacto = new ContactoModel();
            $usuario = new UsuarioModel();

            $data['titulo'] = 'Listar Contactos';
            $data['contacto'] = $contacto->GetContactoForId($contacto_id);
            $data['usuarios'] = $usuario->GetAllTrabajadores();

            session();
            $validation = \Config\Services::validation();
            $data['errores'] = $validation;

            return view('contacto/editarContacto', $data);
        } else {
            return redirect()->to(base_url('/iniciar_sesion'));
        }
    }

    public function updateContacto()
    {
        if (session('rol_id') == 1) {
            $contacto_id = $this->request->getVar('contacto_id');
            if ($this->validate('contacto')) {
                $contacto = new ContactoModel();

                $data['Usuario_id'] = $this->request->getVar('usuario_id'); 
                $data['Contacto_nombre'] = $this->request->getVar('contacto_nombre'); 
                $data['Contacto_email'] = $this->request->getVar('contacto_email'); 
                $data['Contacto_telefono'] = $this->request->getVar('contacto_telefono');
                
                $_SESSION['success'] = 2;
                $contacto->UpdateContacto($data, $contacto_id);
                return redirect()->to(base_url('/listar_contactos'));
            } else {
                return redirect()->to(base_url('/editar_contactos/'.$contacto_id))->withInput();
            }
        } else {
            return redirect()->to(base_url('/iniciar_sesion'));
        }
    }

    public function deleteContacto($contacto_id = null)
    {
        if (session('rol_id') == 1) {
            $contacto = new ContactoModel();
            
            $_SESSION['success'] = 3;
            $contacto->ChangeState($contacto_id);
            return redirect()->to(base_url('/listar_contactos'));
        } else {
            return redirect()->to(base_url('/listar_contactos'));
        }
    }
}