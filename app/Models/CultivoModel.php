<?php 
namespace App\Models;

use CodeIgniter\Model;

class CultivoModel extends Model{
    protected $table      = 'cultivo';
    protected $primaryKey = 'Cultivo_id';
    protected $allowedFields = [
        'Usuario_id',
        'Tipo_id',
        'Cultivo_apodo',
        'Cultivo_imagen',
        'Cultivo_alarma',
        'Cultivo_estado'
    ];

    // SELECT tc.Tipo_nombre, COUNT(c.Tipo_id) AS Tipo_cultivo FROM cultivo AS c INNER JOIN tipo_cultivo AS tc 
    //  c.Tipo_id = tc.Tipo_id WHERE c.Cultivo_estado = 1 GROUP BY c.Tipo_id DESC
    public function GetAllCultivoPorTipo()
    {
       $cultivo = $this->db->table('cultivo AS c');
       $cultivo->select('tc.Tipo_nombre, COUNT(c.Tipo_id) AS Tipo_cultivo');
       $cultivo->join('tipo_cultivo AS tc', 'c.Tipo_id = tc.Tipo_id');
       $cultivo->where('c.Cultivo_estado =', 1);
       $cultivo->groupBy('c.Tipo_id', 'DESC');
       return $cultivo->get()->getResultArray();
    }
}