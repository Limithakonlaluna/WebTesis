<?php 
namespace App\Models;

use CodeIgniter\Model;

class ProductoModel extends Model{
    protected $table      = 'producto';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'Producto_id';
    protected $allowedFields = [
        'Categoria_id',
        'Producto_nombre',
        'Producto_descripcion',
        'Producto_precio',
        'Producto_estado',
        'Producto_stock',
        'Producto_foto'
    ];

    public function SaveProducto($data){ $this->insert($data); }

    public function GetAllProductos()
    {
        $producto = $this->db->table('producto AS p');
        $producto->select('p.Producto_id, p.Producto_nombre, p.Producto_descripcion,
            p.Producto_precio, p.Producto_stock, p.Producto_foto, cp.Categoria_nombre');
        $producto->join('categoria_producto AS cp', 'cp.Categoria_id = p.Categoria_id');
        $producto->where('p.Producto_estado =', 1);
        $producto->where('cp.Categoria_estado =', 1);

        return $producto->get()->getResultArray();
    }

    public function GetProductoForId($producto_id)
    {
        $producto = $this->db->table('producto');
        $producto->select('Producto_id, Producto_nombre, Producto_descripcion, Producto_precio, 
            Producto_stock, Producto_foto, categoria_producto.Categoria_id, categoria_producto.Categoria_nombre');
        $producto->join('categoria_producto', 'categoria_producto.Categoria_id = producto.Categoria_id');
        $producto->where('Producto_id =', $producto_id);
        return $producto->get()->getResultArray();
    }

    public function getAllProductosForCategoria($filtro)
    {
        $producto = $this->db->table('producto AS p');
        $producto->select('p.Producto_id, p.Producto_nombre, p.Producto_descripcion,
            p.Producto_precio, p.Producto_stock, p.Producto_foto, Categoria_nombre');
        $producto->join('categoria_producto AS cp', 'p.Categoria_id = cp.Categoria_id');
        $producto->where('p.Producto_estado =', 1);
        $producto->where('p.Categoria_id =', $filtro);
        return $producto->get()->getResultArray();
    }

    public function GetAllProductosPorTipo()
    {
        $producto = $this->db->table('producto AS p');
        $producto->select('cp.Categoria_nombre, COUNT(p.Categoria_id) AS Categoria_id');
        $producto->join('categoria_producto AS cp', 'p.Categoria_id = cp.Categoria_id');
        $producto->where('p.Producto_estado =', 1);
        $producto->groupBy('p.Categoria_id', 'DESC');
        return $producto->get()->getResultArray();
    }

    public function UpdateProducto($data, $producto_id)
    {
        $producto = $this->db->table('producto');
        $producto->where('Producto_id', $producto_id);
        $producto->update($data);
    }

    public function CountProductos($producto_id)
    {
        $producto = $this->db->table('producto');
        $producto->select('Count(Categoria_id)');
        $producto->where('Categoria_id =', $producto_id);
        return $producto->get()->getResultArray();
    }

    public function ChangeState($data)
    {
        $producto = $this->db->table('producto');
        $estado = ['Producto_estado' => 0];

        $producto->where('Producto_id', $data);
        $producto->update($estado);
    }
}