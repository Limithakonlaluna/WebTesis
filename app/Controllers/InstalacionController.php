<?php

namespace App\Controllers;

use App\Database\Migrations\Instalacion;
use App\Models\InstalacionModel;
use App\Models\OrdenModel;
use App\Models\UsuarioModel;
use PhpParser\Node\Stmt\Echo_;

class InstalacionController extends BaseController
{
    public function listInstalaciones()
    {
        if (session('rol_id') == 3 || session('rol_id') == 1) {
            $instalacion = new InstalacionModel();

            $data['titulo'] = 'Listar Instalaciones';
            $data['instalaciones'] = $instalacion->GetAllInstalacion();

            return view('instalacion/listarInstalacion', $data);
        } else {
            return redirect()->to(base_url('/iniciar_sesion'));
        }
    }

    public function verInstalacion($instalacion_id = null)
    {
        if (session('rol_id') == 3 || session('rol_id') == 1) {
            $instalacion = new InstalacionModel();

            $data['titulo'] = 'Listar Instalaciones';
            $data['instalaciones'] = $instalacion->GetAllInstalacion();
            $data['datosInstalacion'] = $instalacion->GetInstalacionForId($instalacion_id);

            session();
            $validation = \Config\Services::validation();
            $data['errores'] = $validation;

            return view('instalacion/listarInstalacion', $data);
        } else {
            return redirect()->to(base_url('/iniciar_sesion'));
        }
    }

    public function editInstalacion($instalacion_id = null)
    {
        if (session('rol_id') == 3) {
            $instalacion = new InstalacionModel();
            $usuario = new UsuarioModel();

            $data['titulo'] = 'Editar Instalacion';
            $data['instalaciones'] = $instalacion->GetAllInstalacion();
            $data['datosInstalacion'] = $instalacion->GetInstalacionForId($instalacion_id);
            $data['instalacionSeleccionada'] = $instalacion->GetInstalacionForId($instalacion_id);
            $data['tecnicos'] = $usuario->GetAllTrabajadoresDisponibles();

            session();
            $validation = \Config\Services::validation();
            $data['errores'] = $validation;

            return view('instalacion/listarInstalacion', $data);
        } else {
            return redirect()->to(base_url('/iniciar_sesion'));
        }
    }

    public function updateInstalacion()
    {
        if (session('rol_id') == 3) {
            $instalacion_id = $this->request->getVar('instalacion_id');
            if ($this->validate('tecnico')) {
                $instalacion = new InstalacionModel();
                $data['Usuario_id'] = $this->request->getVar('usuario_id');

                $instalacion->updateTecnico($instalacion_id, $data);
                return redirect()->to(base_url('/ver_instalacion/' . $instalacion_id));
            } else {
                return redirect()->to(base_url('/editar_instalacion/' . $instalacion_id))->withInput();
            }
        } else {
            return redirect()->to(base_url('/iniciar_sesion'));
        }
    }

    public function asignarInstalaciones()
    {
        if (session('rol_id') == 1 || session('rol_id') == 3) {
            $usuario = new UsuarioModel();
            $orden = new OrdenModel();
            $instalacion = new InstalacionModel();

            $arrayTrabajador = [];

            $fecha = date('Y-m-d');

            $ordenes = $orden->GetAllOrdenForNextDay($fecha);
            $trabajadores = $usuario->GetAllTrabajadores();

            for ($i = 0; $i < count($trabajadores); $i++) {
                $arrayTrabajador[$trabajadores[$i]['Usuario_id']] = 0;
            }

            for ($i = 0; $i < count($ordenes); $i++) {
                $data = [
                    'Usuario_id' => $trabajadores[rand(0, count($trabajadores) - 1)]['Usuario_id'],
                    'Orden_id' => $ordenes[$i]['Orden_id'],
                    'Instalacion_estado' => 1
                ];

                if ($arrayTrabajador[$data['Usuario_id']] < 8) {
                    $arrayTrabajador[$data['Usuario_id']] += 1;
                    $instalacion->saveInstalacion($data);
                    $orden->ChangeState($ordenes[$i]['Orden_id']);
                }
            }
            return redirect()->to(base_url('/listar_instalaciones'));
        } else {
            return redirect()->to(base_url('/iniciar_sesion'));
        }
    }

    public function verInstalacionSemana()
    {
        if (session('rol_id') == 3 || session('rol_id') == 1) {
            $orden = new OrdenModel();

            $data['titulo'] = 'Listar Instalaciones Semana';
            $data['ordenes'] = $orden->GetAllOrdenForDate();

            session();
            $validation = \Config\Services::validation();
            $data['errores'] = $validation;
          /*   echo'<pre>';
            echo var_dump( $data['ordenes']);
            echo '</pre>'; */
            return view('instalacion/listarInstalacionSemana', $data);
        } else {
            return redirect()->to(base_url('/iniciar_sesion'));
        }
    }

    public function imprimirInstalacionesdia(){

        if (session('rol_id') == 3) {

            $instalaciones = new InstalacionModel();
            $data['instalaciones'] = $instalaciones->GetAllInstalacionForTrabajador();

            $mpdf = new \Mpdf\Mpdf();
            $stylesheet = file_get_contents(base_url('/css/reportes.css'));

            $mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);

            $mpdf->WriteHTML('<div class="card">
            <div class="card-header">
                <h3 class="text-center">Instalaciones del dia</h3>
            </div>
            <div class="card-body">
                <table class="table" style="margin-top: -15px;">
                    <thead class="thead-dark">
                        <tr class="text-center">
                            <th scope="col">Trabajador</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Direccion</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Producto</th>
                            <th scope="col">Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>');
                foreach ($data['instalaciones'] as $instalacion) :
                    $mpdf->WriteHTML(' <tr class="text-center">
                    <th> ' . $instalacion['Tecnico'] . ' </th>
                    <th> ' . $instalacion['Cliente'] . ' </th>
                    <th> ' . $instalacion['Usuario_direccion'] . ' </th>
                    <th> ' . $instalacion['Usuario_telefono'] . ' </th>
                    <th> ' . $instalacion['Producto_nombre'] . ' </th>
                    <th> ' . $instalacion['Orden_cantidad_productos'] . '</th>
                </tr> ');
                endforeach;
                $mpdf->WriteHTML('  </tbody>
                    </table>
                </div>
            </div>');
    
    
                $mpdf->Output();
                return view('instalacion/listarInstalacion', $data);

        } else {
            return redirect()->to(base_url('/iniciar_sesion'));
        }
    }
}
