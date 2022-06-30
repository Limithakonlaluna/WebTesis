<?php 
namespace App\Models;

use CodeIgniter\Model;

class ContactoModel extends Model{
    protected $table      = 'contacto';
    protected $primaryKey = 'Contacto_id';
    protected $allowedFields = [
        'Usuario_id',
        'Contacto_nombre',
        'Contacto_email',
        'Contacto_telefono',
        'Contacto_estado'
    ];

    public function SaveContacto($data)
    {
        $this->insert($data);
    }

    public function UpdateContacto($data, $contacto_id)
    {
        $contacto = $this->db->table('contacto');
        $contacto->where('Contacto_id', $contacto_id);
        $contacto->update($data);
    }

    public function ChangeState($data)
    {
        $contacto = $this->db->table('contacto');
        $estado = ['Contacto_estado' => 0];

        $contacto->where('Contacto_id', $data);
        $contacto->update($estado);
    }

    public function GetAllContactos()
    {
        $contacto = $this->db->table('contacto AS c');
        $contacto->select('c.Contacto_id, c.Contacto_nombre, c.Contacto_email, c.Contacto_telefono, u.Usuario_nombre');
        $contacto->join('usuario AS u', 'c.Usuario_id = u.Usuario_id');
        $contacto->where('c.Contacto_estado', 1);
        return $contacto->get()->getResultArray();
    }

    public function GetContactoForId($contacto_id)
    {
        $contacto = $this->db->table('contacto AS c');
        $contacto->select('c.Contacto_id, c.Contacto_nombre, c.Contacto_email, c.Contacto_telefono, c.Usuario_id,u.Usuario_nombre');
        $contacto->join('usuario AS u', 'c.Usuario_id = u.Usuario_id');
        $contacto->where('c.Contacto_id =', $contacto_id);
        $contacto->where('c.Contacto_estado', 1);
        return $contacto->get()->getResultArray();
    }
}