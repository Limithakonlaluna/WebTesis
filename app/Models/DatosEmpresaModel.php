<?php

namespace App\Models;

use CodeIgniter\Model;

class DatosEmpresaModel extends Model
{
    protected $table      = 'datos_de_la_empresa';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'Datos_id';
    protected $allowedFields = [
        'Usuario_id',
        'Datos_mision',
        'Datos_vision',
        'Datos_comentario'
    ];

    public function SaveDatosEmpresa($data)
    {
        $this->insert($data);
    }

    public function GetAllDatosEmpresa()
    {
        $datosEmpresa = $this->db->table('datos_de_la_empresa AS de');
        $datosEmpresa->select('de.Datos_id, de.Datos_mision, de.Datos_vision, de.Datos_comentario');
        return $datosEmpresa->get()->getResultArray();
    }
    public function GetAllDatosEmpresaForId($datos_id)
    {
        $datosEmpresa = $this->db->table('datos_de_la_empresa AS de');
        $datosEmpresa->select('de.Datos_id, de.Datos_mision, de.Datos_vision, de.Datos_comentario');
        $datosEmpresa-> where('de.Datos_id =', $datos_id);
        return $datosEmpresa->get()->getResultArray();
    }
    public function UpdateDatosEmpresa($data, $datos_id)
    {
        $datosEmpresa = $this->db->table('datos_de_la_empresa');
        $datosEmpresa->where('Datos_id', $datos_id);
        $datosEmpresa->update($data);
    }
}
