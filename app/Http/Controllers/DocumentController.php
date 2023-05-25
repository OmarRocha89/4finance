<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;

use Carbon\Carbon;
use PDF;

class DocumentController extends Controller
{
    public function document(){

        $file = file(public_path("docs/cuenta.txt"));
        $data = $movment = [];
 
        foreach($file as $key => $line) {
            switch (Str::substr($line,0,2)) {
                case '01':
                    $subproducto = Str::substr($line, 2, 10);
                    $fechaCorte = Str::substr($line, 12, 8);
                    $numeroEstadoCuenta = Str::substr($line, 20, 6);
                    
                    // echo '01 --> '.$subproducto.' --- '.$fechaCorte.' --- '.$numeroEstadoCuenta.'<br>';
                    break;
                case '02':
                    $nombre = Str::substr($line, 2, 30);
                    $apellido1 = Str::substr($line, 32, 30);
                    $apellido2 = Str::substr($line, 62, 30);
                    $calle = Str::substr($line, 92, 50);
                    $numeroExterior = Str::substr($line, 142, 20);
                    $numeroInterior = Str::substr($line, 162, 20);
                    $colonia = Str::substr($line, 182, 50);
                    $delMunicipio = Str::substr($line, 232, 50);
                    $estado = Str::substr($line, 282, 30);
                    $cp = Str::substr($line, 312, 5);
                    // echo '02 --> '.$nombre.' --- '.$apellido1.' --- '.$apellido2.' --- '.$calle.' --- '.$numeroExterior.' --- '.$numeroInterior.' --- '.$colonia.' --- '.$delMunicipio.' --- '.$estado.' --- '.$cp.'<br>';
                    break;
                case '03':
                    $rfc = Str::substr($line, 2, 13);
                    $fechaLimitePago = Str::substr($line, 15, 8);
                    $pagoMinimoRequerido = implode(".", str_split(Str::substr($line, 23, 10),8));
                    $pagoNoGenerarIntereses = implode(".", str_split(Str::substr($line, 33, 10),8));
                    $saldoAnterior = implode(".", str_split(Str::substr($line, 43, 10),8));
                    $comprasDisposiciones = implode(".", str_split(Str::substr($line, 53, 10),8));
                    $comisionesCobradas = implode(".", str_split(Str::substr($line, 63, 10),8));
                    $interesesCargados = implode(".", str_split(Str::substr($line, 73, 10),8));
                    $iva = implode(".", str_split(Str::substr($line, 83, 10),8)); 
                    $pagosRembolsosDevoluciones = implode(".", str_split(Str::substr($line, 93, 10),8)); 
                    $saldoCorte = implode(".", str_split(Str::substr($line, 103, 10),8)); 
                    $saldoTotal = implode(".", str_split(Str::substr($line, 113, 10),8)); 
                    $tasaInteresOrdinariaAnual = implode(".", str_split(Str::substr($line, 123, 4),2)); 
                    $tasaInteresOrdinariaPeriodo = implode(".", str_split(Str::substr($line, 127, 4),2)); 
                    $tasaInteresMoratoriaAnual = implode(".", str_split(Str::substr($line, 131, 4),2)); 
                    $numeroTarjeta = Str::substr($line, 139, 16); 
                    $limiteCredito = implode(".", str_split(Str::substr($line, 155, 9),7)); 
                    $creditoDisponible = implode(".", str_split(Str::substr($line, 164, 10),8)); 
                    $mesesSaldarCuenta = Str::substr($line, 174, 3); 
                    $fechaInicioPeriodo = Str::substr($line, 177, 3); 
                    $fechaFinPeriodo = Str::substr($line, 185, 8); 
                    $filler1 = Str::substr($line, 193, 1);
                    $medioAccesoExterno = Str::substr($line, 194, 50);                     
                    $interesesReales = implode(".", str_split(Str::substr($line, 244, 10),8)); 
                    $ivaInteresesReales = implode(".", str_split(Str::substr($line, 254, 10),8)); 
                    $ivaTotal = implode(".", str_split(Str::substr($line, 264, 10),8)); 
                    $filler2 = Str::substr($line, 274, 10); 
                    $montoBaseCalculoInteres = implode(".", str_split(Str::substr($line, 284, 10),8)); 
                    $montoPagosPeriodicos = implode(".", str_split(Str::substr($line, 294, 10),8)); 
                    $montoCargosObjetados = implode(".", str_split(Str::substr($line, 304, 10),8)); 
                    $cuentaCacao = Str::substr($line, 314, 16); 
                    $clabe = Str::substr($line, 330, 18); 
                    // echo $cuentaCacao.'---';
                    // echo '03 --> '.$rfc.' --- '.$fechaLimitePago.' --- '.$pagoMinimoRequerido.' --- '.$pagoNoGenerarIntereses.' --- '.$saldoAnterior.' --- '.$comprasDisposiciones.' --- '.$comisionesCobradas.' --- '.$interesesCargados.' --- '.$iva.' --- '.$pagosRembolsosDevoluciones.' --- '.$saldoCorte.' --- '.$saldoTotal.' --- '.$tasaInteresOrdinariaAnual.' --- '.$tasaInteresOrdinariaPeriodo.' --- '.$tasaInteresMoratoriaAnual.' --- '.$numeroTarjeta.' --- '.$limiteCredito.' --- '.$creditoDisponible.' --- '.$mesesSaldarCuenta.' --- '.$fechaInicioPeriodo.' --- '.$fechaFinPeriodo.' --- '.$filler1.' --- '.$medioAccesoExterno.' --- '.$interesesReales.' --- '.$ivaInteresesReales.' --- '.$ivaTotal.' --- '.$filler2.' --- '.$montoBaseCalculoInteres.' --- '.$montoPagosPeriodicos.' --- '.$montoCargosObjetados.' --- '.$cuentaCacao.' --- '.$clabe.' --- '.'<br>';
                    break;
                case '04':
                    $fechaOperacion = Str::substr($line, 2, 8);
                    $fechaAplicacion = Str::substr($line, 10, 8);
                    $descripcion = Str::substr($line, 18, 100);
                    $rfcComercio = Str::substr($line, 118, 12);
                    $poblacion = Str::substr($line, 131, 50);
                    $monedaExtranjera = Str::substr($line, 181, 3);
                    $montoDivisaExtranjera = implode(".", str_split(Str::substr($line, 184, 10), 8));
                    $pesos = implode(".", str_split(Str::substr($line, 194, 10),8));
                    $filler3 = Str::substr($line, 204, 1);
                    $claveMovimiento = Str::substr($line, 205, 10);
                    $idMovimiento = Str::substr($line, 215, 10);

                    $movment[] = [
                        'fechaOperacion'=>$fechaOperacion,
                        'fechaAplicacion'=>$fechaAplicacion,
                        'descripcion'=>$descripcion,
                        'rfcComercio'=>$rfcComercio,
                        'poblacion'=>$poblacion,
                        'monedaExtranjera'=>$monedaExtranjera,
                        'montoDivisaExtranjera'=>$montoDivisaExtranjera,
                        'pesos'=>$pesos,
                        'filler3'=>$filler3,
                        'claveMovimiento'=>$claveMovimiento,
                        'idMovimiento'=>$idMovimiento,
                    ];
                    // echo '04 --> '.$fechaOperacion.' --- '.$fechaAplicacion.' --- '.$descripcion.' --- '.$rfcComercio.' --- '.$poblacion.' --- '.$monedaExtranjera.' --- '.$montoDivisaExtranjera.' --- '.$pesos.' --- '.$filler2.' --- '.$claveMovimiento.' --- '.$idMovimiento.'<br>';
                    break;
                case '05':
                    $numeroRegistrosOperaciones = Str::substr($line, 2, 3);

                    $data[] = [
                        // 01
                        'subproducto'=>$subproducto,
                        'fechaCorte'=>$fechaCorte,
                        'numeroEstadoCuenta'=>$numeroEstadoCuenta,
                        // 02
                        'nombre'=>$nombre,
                        'apellido1'=>$apellido1,
                        'apellido2'=>$apellido2,
                        'calle'=>$calle,
                        'numeroExterior'=>$numeroExterior,
                        'numeroInterior'=>$numeroInterior,
                        'colonia'=>$colonia,
                        'delMunicipio'=>$delMunicipio,
                        'estado'=>$estado,
                        'cp'=>$cp,
                        // 03
                        'rfc'=>$rfc,
                        'fechaLimitePago'=>$fechaLimitePago,
                        'pagoMinimoRequerido'=>$pagoMinimoRequerido,
                        'pagoNoGenerarIntereses'=>$pagoNoGenerarIntereses,
                        'saldoAnterior'=>$saldoAnterior,
                        'comprasDisposiciones'=>$comprasDisposiciones,
                        'comisionesCobradas'=>$comisionesCobradas,
                        'interesesCargados'=>$interesesCargados,
                        'iva'=>$iva,
                        'pagosRembolsosDevoluciones'=>$pagosRembolsosDevoluciones,
                        'saldoCorte'=>$saldoCorte,
                        'saldoTotal'=>$saldoTotal,
                        'tasaInteresOrdinariaAnual'=>$tasaInteresOrdinariaAnual,
                        'tasaInteresOrdinariaPeriodo'=>$tasaInteresOrdinariaPeriodo,
                        'tasaInteresMoratoriaAnual'=>$tasaInteresMoratoriaAnual,
                        'numeroTarjeta'=>$numeroTarjeta,
                        'limiteCredito'=>$limiteCredito,
                        'creditoDisponible'=>$creditoDisponible,
                        'mesesSaldarCuenta'=>$mesesSaldarCuenta,
                        'fechaInicioPeriodo'=>$fechaInicioPeriodo,
                        'fechaFinPeriodo'=>$fechaFinPeriodo,
                        'filler1'=>$filler1,
                        'medioAccesoExterno'=>$medioAccesoExterno,
                        'interesesReales'=>$interesesReales,
                        'ivaInteresesReales'=>$ivaInteresesReales,
                        'ivaTotal'=>$ivaTotal,
                        'filler2'=>$filler2,
                        'montoBaseCalculoInteres'=>$montoBaseCalculoInteres,
                        'montoPagosPeriodicos'=>$montoPagosPeriodicos,
                        'montoCargosObjetados'=>$montoCargosObjetados,
                        'cuentaCacao'=>$cuentaCacao,
                        'clabe'=>$clabe,
                        // 04
                        'movimientos'=>count($movment)>0?$movment:null,
                        // 05
                        'numeroRegistrosOperaciones'=>$numeroRegistrosOperaciones
                    ]; 

                    if(count($movment)>0){
                        unset($movment);
                        $movment = [];
                    }

                    break;                     
            }   
        }

        $today = Carbon::now()->format('Ymd');
        return $data;
        foreach ($data as $key => $item) {
            $filename = Str::slug($item['nombre'].' '.$item['apellido1'].' '.$item['apellido2']).'.pdf';
            $pdfOutput = PDF::loadView('pdf', $item)->output();
            Storage::disk('public')->put($today.'/'.$filename, $pdfOutput);
            echo 'Realizado: '.$item['nombre'].'<br>';
        }
    }

    public function api(Request $request){
        $response = Http::get('https://www.banxico.org.mx/SieAPIRest/service/v1/series/SP68257/datos/2022-09-05/2022-10-06?token=80ec867d5e915e6385b8216aaf288520c58185819a64ec19843f97d261f75bd3');
        // return $response['bmx']['series'][0];
        foreach($response['bmx']['series'][0]['datos'] as $key => $item){
            if ($key === array_key_first($response['bmx']['series'][0]['datos'])) {
                echo 'First date '.$item['fecha'];
            }
        
            if ($key === array_key_last($response['bmx']['series'][0]['datos'])) {
                echo 'Last date '.$item['fecha'];
            }
        }

        if ($request->session()->has('token')) {
            $client = Http::withToken(session('token'))
                                ->withBody(
                                    '{
                                        "idCustomer": 1319206 
                                    }','application/json'
                                )->post(env('TEKDFI_URL').'/api/ClientSummary/ClientSummaryByCustomer');
            if ($client->status()==401) {
                $token = Http::withBody(
                    '{
                        "username": "'.env('TEKDFI_USERNAME').'",
                        "password": "'.env('TEKDFI_PASSWORD').'"
                    }','application/json'
                )->post(env('TEKDFI_URL').'/api/Security/RequestToken');
                if ($token->successful()) {
                    session(['token' => $token['token']]);
                    $client = Http::withToken(session('token'))
                                    ->withBody(
                                        '{
                                            "idCustomer": 1319206 
                                        }','application/json'
                                    )->post(env('TEKDFI_URL').'/api/ClientSummary/ClientSummaryByCustomer');
                    return $client;             
                }
            }else{
                return $client;
            }
        }else{
            $token = Http::withBody(
                '{
                    "username": "'.env('TEKDFI_USERNAME').'",
                    "password": "'.env('TEKDFI_PASSWORD').'"
                }','application/json'
            )->post(env('TEKDFI_URL').'/api/Security/RequestToken');
            if ($token->successful()) {
                session(['token' => $token['token']]);
                $client = Http::withToken(session('token'))
                                ->withBody(
                                    '{
                                        "idCustomer": 1319206 
                                    }','application/json'
                                )->post(env('TEKDFI_URL').'/api/ClientSummary/ClientSummaryByCustomer');
                return $client;             
            }
        }
    }
}
