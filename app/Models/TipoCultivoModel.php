<?php 
namespace App\Models;

use CodeIgniter\Model;

class TipoCultivoModel extends Model{
    protected $table      = 'tipo_cultivo';
    protected $primaryKey = 'Tipo_id';
    protected $allowedFields = [
        'Tipo_nombre',
        'Tipo_estado'
    ];

    public function GetAllTipoCultivo(){ 
        $tipo_cultivo = $this->db->table('tipo_cultivo');
        $tipo_cultivo->select('Tipo_id, Tipo_nombre');
        $tipo_cultivo->where('Tipo_estado =', 1);
        return $tipo_cultivo->get()->getResultArray();
    }

    public function SaveTipoCultivo($data){ $this->insert($data); }

    public function CountTipoCultivo($tipo_id)
    {
        $tipoCultivo = $this->db->table('cultivo');
        $tipoCultivo->select('Count(Tipo_id)');
        $tipoCultivo->where('Tipo_id =', $tipo_id);
        return $tipoCultivo->get()->getResultArray();
    }

    public function GetTipoCultivoForId($tipo_id)
    {
        $tipo_cultivo = $this->db->table('tipo_cultivo');
        $tipo_cultivo->select('Tipo_id, Tipo_nombre');
        $tipo_cultivo->where('Tipo_id =', $tipo_id);
        return $tipo_cultivo->get()->getResultArray();
    }

    public function UpdateTipoCultivo($data, $tipo_id)
    {
        $usuario = $this->db->table('tipo_cultivo');
        $usuario->where('Tipo_id', $tipo_id);
        $usuario->update($data);
    }

    public function ChangeState($data)
    {
        $tipo_cultivo = $this->db->table('tipo_cultivo');
        $estado = ['Tipo_estado' => 0];

        $tipo_cultivo->where('Tipo_id', $data);
        $tipo_cultivo->update($estado);
    }
}