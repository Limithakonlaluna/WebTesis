<?php 
namespace App\Models;

use CodeIgniter\Model;

class RolModel extends Model{
    protected $table      = 'rol_usuario';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'Rol_id';
    protected $allowedFields = [
        'Rol_nombre'
    ];

    public function GetAllRol()
    {
        return $this->orderBy('Rol_id', 'ASC')->findAll();
    }
}