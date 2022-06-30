<?php 
namespace App\Models;

use App\Database\Migrations\Usuario;
use CodeIgniter\Model;

class OrdenModel extends Model{
    protected $table      = 'orden';
    protected $primaryKey = 'Orden_id';
    protected $allowedFields = [
        'Usuario_id',
        'Orden_Fecha',
        'Orden_cantidad_productos',
        'Orden_estado'
    ];

    public function GetAllOrdenForNextDay($fecha)
    {
        $orden = $this->db->table('orden');
        $orden->select('Orden_id, Orden_fecha, Orden_cantidad_productos, Orden_estado');
        $orden->where('Orden_fecha =', $fecha);
        $orden->where('Orden_estado =', 1);
        return $orden->get()->getResultArray();
    }

    public function GetAllOrdenForDate()
    {
        $orden = $this->db->table('orden as o');
        $orden->select('*');
        $orden->join('usuario as u', 'o.Usuario_id = u.Usuario_id');
        $orden->where('YEARWEEK(Orden_Fecha, 1) =', date('YW', strtotime(date('Y-m-d'))));
        $orden->orderBy('Orden_Fecha', 'DESC');

        return $orden->get()->getResultArray();
    }
    public function ChangeState($data)
    {
        $orden = $this->db->table('orden');
        $estado = ['Orden_estado' => 2];

        $orden->where('Orden_id', $data);
        $orden->update($estado);
    }
}