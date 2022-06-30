<?php 
namespace App\Models;

use CodeIgniter\Model;

class CategoriaProductoModel extends Model{
    protected $table      = 'categoria_producto';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'Categoria_id';
    protected $allowedFields = [
        'Categoria_nombre',
        'Categoria_estado'
    ];

    public function GetAllCategoriaProducto(){ 
        $categoria = $this->db->table('categoria_producto');
        $categoria->select('Categoria_id, Categoria_nombre');
        $categoria->where('Categoria_estado =', 1);
        return $categoria->get()->getResultArray();
    }
    public function SaveCategoriaProducto($data){ $this->insert($data); }
    
    public function GetCategoriaProductoForId($categoria_id)
    {        
        $categoria = $this->db->table('categoria_producto');
        $categoria->select('Categoria_id, Categoria_nombre');
        $categoria->where('Categoria_id =', $categoria_id);
        return $categoria->get()->getResultArray();
    }

    public function UpdateCategoriaProducto($data, $categoria_id)
    {
        $categoria = $this->db->table('categoria_producto');
        $categoria->where('Categoria_id', $categoria_id);
        $categoria->update($data);
    }

    public function ChangeState($data)
    {
        $categoria = $this->db->table('categoria_producto');
        $estado = ['categoria_estado' => 0];

        $categoria->where('Categoria_id', $data);
        $categoria->update($estado);
    }
}