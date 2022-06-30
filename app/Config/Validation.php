<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
    //--------------------------------------------------------------------
    // Setup
    //--------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    public $usuario = [
        'usuario_nombre' => 'required|min_length[2]|max_length[254]|string',
        'usuario_correo' => 'required|max_length[254]|valid_email',
        'usuario_contrasena1' => 'permit_empty|min_length[8]|max_length[8]',
        'usuario_contrasena2' => 'permit_empty|matches[usuario_contrasena1]',
        'usuario_direccion' => 'required|min_length[2]|max_length[254]',
        'usuario_telefono' => 'required|max_length[12]|numeric',
        'rol_id' => 'required|is_natural_no_zero'
    ];
    
    public $trabajador = [
        'usuario_nombre' => 'required|min_length[2]|max_length[254]|string',
        'usuario_correo' => 'required|max_length[254]|valid_email',
        'usuario_contrasena1' => 'permit_empty|min_length[8]|max_length[8]',
        'usuario_contrasena2' => 'permit_empty|matches[usuario_contrasena1]',
        'usuario_direccion' => 'required|min_length[2]|max_length[254]',
        'usuario_telefono' => 'required|max_length[12]|numeric',
        'rol_id' => 'required|is_natural_no_zero',
        'horario_id' => 'permit_empty|is_natural_no_zero',
    ];

    public $producto = [
        'producto_nombre' => 'required|min_length[2]|max_length[254]|string',
        'producto_descripcion' => 'required|min_length[2]|max_length[254]|string',
        'producto_precio' => 'required|min_length[2]|max_length[254]|numeric',
        'producto_stock' => 'required|numeric',
        'categoria_id' => 'required|is_natural_no_zero'
    ];

    public $categoriaProducto = [
        'categoria_nombre' => 'required|min_length[2]|max_length[254]|string',
    ];

    public $horarioUsuario = [
        'horario_inicio' => 'required',
        'horario_fin' => 'required',
    ];

    public $horarioTrabajador = [
        'horario_id' => 'required|is_natural_no_zero',
        'usuario_id' => 'required|is_natural_no_zero',
    ];

    public $datosEmpresa = [
        'datos_mision' => 'required|min_length[2]|max_length[254]|string',
        'datos_vision' => 'required|min_length[2]|max_length[254]|string',
        'datos_comentario' => 'required|min_length[2]|max_length[254]|string'
    ];

    public $login = [
        'usuario_correo' => 'required|max_length[254]|valid_email',
        'usuario_contrasena' => 'required|min_length[8]|max_length[8]',
    ];

    public $tecnico = [
        'usuario_id' => 'required|is_natural_no_zero',
    ];

    public $tipoCultivo = [
        'tipo_nombre' => 'required|min_length[2]|max_length[254]|string',
    ];

    public $publicacion = [
        'publicacion_nombre' => 'required|min_length[2]|max_length[255]|string',
        'publicacion_descripcion' => 'required|min_length[2]|max_length[255]|string'
    ];

    public $contacto = [
        'contacto_nombre' => 'required|min_length[2]|max_length[254]|string',
        'usuario_id' => 'required|is_natural_no_zero',
        'contacto_email' => 'required|max_length[254]|valid_email',
        'contacto_telefono' => 'required|max_length[12]|numeric',
    ];

    //--------------------------------------------------------------------
    // Rules
    //--------------------------------------------------------------------
}
