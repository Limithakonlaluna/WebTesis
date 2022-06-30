<?php 
namespace App\Models;

use CodeIgniter\Model;

class HorarioUsuarioModel extends Model{
    protected $table      = 'horario_usuario';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'Horario_id';
    protected $allowedFields = [
        'Horario_inicio',
        'Horario_fin',
        'Horario_estado'
    ];

    public function SaveHorario($data){ $this->insert($data); }

    public function GetAllHorarios()
    {
        $horario = $this->db->table('horario_usuario');
        $horario->select('Horario_id, Horario_inicio, Horario_fin');
        $horario->where('Horario_estado =', 1);
        return $horario->get()->getResultArray();
    }

    public function GetHorarioForId($horario_id)
    {
        $horario = $this->db->table('horario_usuario');
        $horario->select('Horario_id, Horario_inicio, Horario_fin');
        $horario->where('Horario_estado =', 1);
        $horario->where('Horario_id =', $horario_id);
        return $horario->get()->getResultArray();
    }

    public function UpdateHorario($data, $horario_id)
    {
        $horario = $this->db->table('horario_usuario');
        $horario->where('Horario_id', $horario_id);
        $horario->update($data);
    }

    public function ChangeState($data)
    {
        $horario = $this->db->table('horario_usuario');
        $estado = ['Horario_estado' => 0];

        $horario->where('Horario_id', $data);
        $horario->update($estado);
    }
}