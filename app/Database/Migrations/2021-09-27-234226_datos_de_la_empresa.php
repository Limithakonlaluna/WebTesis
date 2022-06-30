<?php 
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Datos_de_la_empresa extends Migration{
    public function up(){

        // Uncomment below if want config
        // $this->forge->addField([
        // 		'id'          		=> [
        // 				'type'           => 'INT',
        // 				'unsigned'       => TRUE,
        // 				'auto_increment' => TRUE
        // 		],
        // 		'title'       		=> [
        // 				'type'           => 'VARCHAR',
        // 				'constraint'     => '100',
        // 		],
        // ]);
        // $this->forge->addKey('id', TRUE);
        $this->forge->createTable('datos_de_la_empresa');
    }

    public function down(){
        $this->forge->dropTable('datos_de_la_empresa');
    }
}