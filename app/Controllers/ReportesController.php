<?php

namespace App\Controllers;

use App\Models\CultivoModel;
use App\Models\InstalacionModel;
use App\Models\ProductoModel;

class ReportesController extends BaseController
{
    public function generarReportes()
    {
        if (session('rol_id') == 1) {
            $cultivo = new CultivoModel();
            $producto = new ProductoModel();
            $instalaciones = new InstalacionModel();

            $data['titulo'] = 'Reportes';
            $data['cultivos'] = $cultivo->GetAllCultivoPorTipo();
            $data['productos'] = $producto->GetAllProductosPorTipo();
            $data['instalaciones'] = $instalaciones->GetAllInstalacionPorEstado();

            return view('reporte/listaReportes', $data);
        } else {
            return redirect()->to(base_url('/iniciar_sesion'));
        }
    }

    public function imprimirCultivos()
    {
        if (session('rol_id') == 1) {
            $cultivo = new CultivoModel();
            $data['cultivos'] = $cultivo->GetAllCultivoPorTipo();
            $mpdf = new \Mpdf\Mpdf();
            $stylesheet = file_get_contents(base_url('/css/reportes.css'));

            $mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);

            $mpdf->WriteHTML('<div class="card">
        <div class="card-header">
            <h3 class="text-center">Tipo de Cultivo Mas Ocupado</h3>
        </div>
        <div class="card-body">
            <table class="table" style="margin-top: -15px;">
                <thead class="thead-dark">
                    <tr class="text-center">
                        <th scope="col">Nombre</th>
                        <th scope="col">Cantidad</th>
                    </tr>
                </thead>
                <tbody>');
            foreach ($data['cultivos'] as $cultivo) :
                $mpdf->WriteHTML(' <tr class="text-center">
                <th> ' . $cultivo['Tipo_nombre'] . ' </th>
                <td> ' . $cultivo['Tipo_cultivo'] . '</td>
            </tr> ');
            endforeach;
            $mpdf->WriteHTML('  </tbody>
                </table>
            </div>
        </div>');


            $mpdf->Output();



            return view('reporte/listaReportes', $data);
        } else {
            return redirect()->to(base_url('/iniciar_sesion'));
        }
    }
    public function imprimirProductos()
    {

        if (session('rol_id') == 1) {
            $producto = new ProductoModel();
            $data['productos'] = $producto->GetAllProductosPorTipo();



            $mpdf = new \Mpdf\Mpdf();
            $stylesheet = file_get_contents(base_url('/css/reportes.css'));

            $mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);

            $mpdf->WriteHTML('<div class="card">
        <div class="card-header">
            <h3 class="text-center">Producto mas Vendido</h3>
        </div>
        <div class="card-body">
            <table class="table" style="margin-top: -15px;">
                <thead class="thead-dark">
                    <tr class="text-center">
                        <th scope="col">Nombre</th>
                        <th scope="col">Cantidad</th>
                    </tr>
                </thead>
                <tbody>');
            foreach ($data['productos'] as $producto) :
                $mpdf->WriteHTML(' <tr class="text-center">
                <th> ' . $producto['Categoria_nombre'] . ' </th>
                <td> ' . $producto['Categoria_id'] . '</td>
            </tr> ');
            endforeach;
            $mpdf->WriteHTML('  </tbody>
                </table>
            </div>
        </div>');


            $mpdf->Output();
            return view('reporte/listaReportes', $data);
        } else {
            return redirect()->to(base_url('/iniciar_sesion'));
        }
    }
    public function imprimirInstalaciones()
    {

        if (session('rol_id') == 1) {
            $instalaciones = new InstalacionModel();
            $data['instalaciones'] = $instalaciones->GetAllInstalacionPorEstado();

            $mpdf = new \Mpdf\Mpdf();
            $stylesheet = file_get_contents(base_url('/css/reportes.css'));

            $mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
            $contador = 1;
            $mpdf->WriteHTML(' <div class="card">
            <div class="card-header">
                <h3 class="text-center">Instalaciones Últimos 3 Meses</h3>
            </div>
            <div class="card-body">
                <table class="table" style="margin-top: -15px;">
                    <thead class="thead-dark">
                        <tr class="text-center">
                            <th scope="col">Nombre</th>
                            <th scope="col">Estado</th>
                        </tr>
                    </thead>
                    <tbody>');

            foreach ($data['instalaciones'] as $instalacion) :
                $mpdf->WriteHTML('<tr class="text-center">');
                $mpdf->WriteHTML('<th>Instalacion #' . $contador . '
                </th>');
                $mpdf->WriteHTML('<td>');
                if ($instalacion['Instalacion_estado'] == 2) {
                    $mpdf->WriteHTML('Completada');
                } else if ($instalacion['Instalacion_estado'] == 1) {
                    $mpdf->WriteHTML('En Proceso');
                   
                } else {
                    $mpdf->WriteHTML('Cancelada');
                    
                }
                $mpdf->WriteHTML('</td>');
                $mpdf->WriteHTML('</tr>');
                $contador++;
            endforeach;
            $mpdf->WriteHTML('</tbody>
            </table>
        </div>
    </div>');


            $mpdf->Output();



            return view('reporte/listaReportes', $data);
        } else {
            return redirect()->to(base_url('/iniciar_sesion'));
        }
    }
}
