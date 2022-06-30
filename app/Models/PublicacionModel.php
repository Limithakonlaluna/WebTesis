<?php

namespace App\Models;

use CodeIgniter\Model;

class PublicacionModel extends Model
{
    protected $table      = 'publicacion';
    protected $primaryKey = 'publicacion_id';
    protected $allowedFields = [
        'Usuario_id',
        'Publicacion_nombre',
        'Publicacion_descripcion',
        'Publicacion_imagen',
        'Publicacion_estado'
    ];

    public function SavePublicacion($data)
    {
        $this->insert($data);
    }
    public function GetAllPublicacion()
    {
        $publicacion = $this->db->table('publicacion AS p');
        $publicacion->select('p.Publicacion_id, p.Publicacion_nombre, p.Publicacion_descripcion, p.Publicacion_imagen, u.Usuario_nombre, u.Usuario_id ');
        $publicacion->join('usuario AS u', 'p.Usuario_id = u.Usuario_id');
        $publicacion->where('p.Publicacion_estado =', 1);

        return $publicacion->get()->getResultArray();
    }
    public function GetAllPublicacionForId($publicacion_id)
    {
        $fecha = date('Y-m-d');

        $publicacion = $this->db->table('publicacion AS p');
        $publicacion->select('u.Rol_id, p.Publicacion_id, p.Publicacion_nombre, p.Publicacion_descripcion, p.Publicacion_imagen, u.Usuario_nombre, u.Usuario_id, ru.Rol_nombre ');
        $publicacion->join('usuario AS u', 'p.Usuario_id = u.Usuario_id');
        $publicacion->join('rol_usuario AS ru', 'u.Rol_id = ru.Rol_id');
        $publicacion->where('p.Publicacion_estado =', 1);
        $publicacion->where('p.Publicacion_id =', $publicacion_id);

        return $publicacion->get()->getResultArray();
    }

    public function GetAllMyPublicacion()
    {
        $publicacion = $this->db->table('publicacion AS p');
        $publicacion->select('p.Publicacion_id, p.Publicacion_nombre, p.Publicacion_descripcion, p.Publicacion_imagen, u.Usuario_nombre, u.Rol_id, r.Rol_nombre, u.Usuario_id ');
        $publicacion->join('usuario AS u', 'p.Usuario_id = u.Usuario_id');
        $publicacion->join('rol_usuario AS r', 'u.Rol_id = r.Rol_id');
        $publicacion->where('p.Publicacion_estado =', 1);
        $publicacion->where('u.Rol_id =', 3);

        return $publicacion->get()->getResultArray();
    }
    public function UpdatePublicacion($data, $publicacion_id)
    {
        $publicacion = $this->db->table('publicacion');
        $publicacion->where('Publicacion_id', $publicacion_id);
        $publicacion->update($data);
    }

    public function DeletePublicacion($data)
    {
        $publicacion = $this->db->table('publicacion');
        $estado = ['Publicacion_estado' => 0];

        $publicacion->where('Publicacion_id', $data);
        $publicacion->update($estado);
    }
}
