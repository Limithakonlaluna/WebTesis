<?php 
namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model{
    protected $table      = 'usuario';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'Usuario_id';
    protected $allowedFields = [
        'Rol_id',
        'Horario_id',
        'Usuario_nombre',
        'Usuario_correo',
        'Usuario_contrasena',
        'Usuario_direccion',
        'Usuario_telefono',
        'Usuario_estado',
        'Usuario_foto'
    ];

    public function SaveUsuario($data){ $this->insert($data); }
    
    public function GetUsuario($correo)
    {
        $usuario = $this->db->table('usuario');
        $usuario->where($correo);
        return $usuario->get()->getResultArray();
    }
    
    public function GetUsuarioForId($usuario_id)
    {
        $usuario = $this->db->table('usuario AS u');
        $usuario->select('u.Usuario_id, u.Usuario_nombre, u.Usuario_correo, u.Usuario_direccion, u.Usuario_telefono, u.Usuario_foto, u.Rol_id, u.Horario_id, ru.Rol_nombre, hu.Horario_inicio, hu.Horario_fin');
        $usuario->join('rol_usuario AS ru', 'ru.Rol_id = u.Rol_id');
        $usuario->join('horario_usuario AS hu', 'hu.Horario_id = u.Horario_id');
        $usuario->where('u.Usuario_id =', $usuario_id);
        return $usuario->get()->getResultArray();
    }

    public function GetUsuarioCliente($usuario_id)
    {
        $usuario = $this->db->table('usuario AS u');
        $usuario->select('u.Usuario_id, u.Usuario_nombre, u.Usuario_correo, u.Usuario_direccion, u.Usuario_telefono, u.Rol_id, ru.Rol_nombre');
        $usuario->join('rol_usuario AS ru', 'ru.Rol_id = u.Rol_id');
        $usuario->where('u.Usuario_id =', $usuario_id);
        return $usuario->get()->getResultArray();
    }

    public function GetAllUsuarios()
    {
        $usuario = $this->db->table('usuario');
        $usuario->select('Usuario_id, Usuario_nombre, Usuario_correo, Usuario_direccion, Usuario_telefono, Usuario_foto, Rol_nombre');
        $usuario->join('rol_usuario', 'rol_usuario.Rol_id = usuario.Rol_id');
        $usuario->where('Usuario_estado =', 1);
        return $usuario->get()->getResultArray();
    }

    public function GetAllTrabajadores()
    {
        $usuario = $this->db->table('usuario');
        $usuario->select('Usuario_id, Usuario_nombre');
        $usuario->where('Usuario_estado =', 1);
        $usuario->where('Rol_id =', 3);
        return $usuario->get()->getResultArray();
    }

    public function GetAllTrabajadoresDisponibles()
    {
        $usuario = $this->db->table('usuario AS u');
        $usuario->select('u.Usuario_id, u.Usuario_nombre');
        $usuario->join('instalacion AS i', 'i.Usuario_id = u.Usuario_id');
        $usuario->join('orden AS o', 'i.Orden_id = o.Orden_id');
        $usuario->where('u.Usuario_estado =', 1);
        $usuario->where('u.Rol_id =', 3);
        $usuario->groupBy('u.Usuario_id', 'DESC');
        $usuario->having('COUNT(u.Usuario_id) < 8');
        return $usuario->get()->getResultArray();
    }

    public function UpdateUsuario($data, $usuario_id)
    {
        $usuario = $this->db->table('usuario');
        $usuario->where('Usuario_id', $usuario_id);
        $usuario->update($data);
    }

    public function UpdateHorarioUsuario($data, $usuario_id)
    {
        $usuario = $this->db->table('usuario');
        $usuario->where('Usuario_id', $usuario_id);
        $usuario->update($data);
    }

    public function ChangeState($data)
    {
        $usuario = $this->db->table('usuario');
        $estado = ['Usuario_estado' => 0];

        $usuario->where('Usuario_id', $data);
        $usuario->update($estado);
    }

    public function GetRolForUsuarioId($usuario_id)
    {
        $usuario = $this->db->table('usuario AS u');
        $usuario->select('u.Rol_id');
        $usuario->where('u.Usuario_id =', $usuario_id);
        return $usuario->get()->getResultArray();
    }
}