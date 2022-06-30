<?php

namespace App\Models;

use CodeIgniter\Model;

class InstalacionModel extends Model
{
    protected $table      = 'instalacion';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'Instalacion_id';
    protected $allowedFields = [
        'Usuario_id',
        'Orden_id',
        'Instalacion_estado',
    ];

    public function saveInstalacion($data)
    {
        $this->insert($data);
    }

    public function GetInstalacionForId($instalacion_id)
    {
        $fecha = date('Y-m-d');

        $instalacion = $this->db->table('instalacion AS i');
        $instalacion->select('i.Instalacion_id, t.Usuario_nombre AS Tecnico, c.Usuario_nombre AS Cliente, 
            c.Usuario_direccion, c.Usuario_telefono, o.Orden_fecha');
        $instalacion->join('usuario AS t', 'i.Usuario_id = t.Usuario_id');
        $instalacion->join('orden AS o', 'i.Orden_id = o.Orden_id');
        $instalacion->join('usuario AS c', 'o.Usuario_id = c.Usuario_id');
        $instalacion->where('i.Instalacion_id =', $instalacion_id);
       
        $instalacion->where('o.Orden_fecha =', $fecha);
        return $instalacion->get()->getResultArray();
    }

    public function GetAllInstalacion()
    {
        $fecha = date('Y-m-d');

        $instalacion = $this->db->table('instalacion AS i');
        $instalacion->select('i.Instalacion_id');
        $instalacion->join('orden AS o', 'i.Orden_id = o.Orden_id');
        $instalacion->where('o.Orden_fecha =', $fecha);
        $instalacion->where('i.Instalacion_estado =', 1 );
        return $instalacion->get()->getResultArray();
    }

    public function UpdateTecnico($instalacion_id, $data)
    {
        $instalacion = $this->db->table('instalacion');
        $instalacion->where('Instalacion_id', $instalacion_id);
        $instalacion->update($data);
    }

    // SELECT i.Instalacion_estado FROM instalacion AS i INNER JOIN orden AS o ON i.Orden_id = o.Orden_id 
    // WHERE o.Orden_Fecha BETWEEN '2021-06-01' AND '2021-11-16'
    public function GetAllInstalacionPorEstado()
    {
        $fecha = date('Y-m-d');
        $fecha_inicio = date('Y-m-d', strtotime('-3 month', strtotime($fecha)));

        $instalacion = $this->db->table('instalacion AS i');
        $instalacion->select('i.Instalacion_estado');
        $instalacion->join('orden AS o', 'i.Orden_id = o.Orden_id');
        $instalacion->where('o.Orden_fecha >=', $fecha_inicio);
        $instalacion->where('o.Orden_fecha <=', $fecha);
        return $instalacion->get()->getResultArray();
    }

    public function GetAllInstalacionForTrabajador(){
        $fecha = date('Y-m-d');
        $instalacion = $this->db->table('instalacion AS i');
        $instalacion->select(' t.Usuario_nombre AS Tecnico, c.Usuario_nombre AS Cliente, c.Usuario_direccion, c.Usuario_telefono, o.Orden_cantidad_productos, p.Producto_nombre');
        $instalacion->join('usuario AS t', 'i.Usuario_id = t.Usuario_id');
        $instalacion->join('orden AS o', 'i.Orden_id = o.Orden_id');
        $instalacion->join('usuario AS c', 'o.Usuario_id = c.Usuario_id');
        $instalacion->join('detalle_orden AS do', 'do.Orden_id = o.Orden_id');
        $instalacion->join('producto AS p', 'do.Producto_id = p.Producto_id');
        $instalacion->where('i.Instalacion_estado =', 1 );
        $instalacion->where('o.Orden_fecha =', $fecha);
        return $instalacion->get()->getResultArray();

    }
}
