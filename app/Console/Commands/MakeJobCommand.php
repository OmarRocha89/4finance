<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Carbon\Carbon;
use PDF;
use App\Models\DatosTarjetahabiente;
use App\Models\InfoCorte;
use App\Models\InfoEstadosCuenta;
use App\Models\InfoOperaciones;
use Illuminate\Support\Facades\File;


class MakeJobCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:Clasica';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crea pdf de archivo txt';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */

     

     
    public function handle()
    {

      //$day = Carbon::now()->format('dmY');
      //$fileName = "EstadoDeCuenta__4FINANCE_CRE00551_".$day;
      //echo $fileName;
      //exit();


      $fileName ="EstadoDeCuenta__4 FINANCE_CRE00551_06052023";

      $fileIsMissing = Storage::disk('sftp')->missing('archivos/Credito_Files/Layout_Edo_Cta/Clasica/'.$fileName.'.txt');
      if ($fileIsMissing ) {
        
        echo "NO Existe";
        exit();

      }else{
        
        $contents = Storage::disk('sftp')->get('archivos/Credito_Files/Layout_Edo_Cta/Clasica/'.$fileName.'.txt');
        Storage::disk('docs')->put($fileName.'.txt',$contents);
        echo "conectado";
        //exit();

      }




           $file = file(public_path("docs/".$fileName.".txt"));
       // $file = file(public_path("docs/EstadoDeCuenta__4 FINANCE_CRE00551_06042023_Clasica.txt"));

        
        //echo $file;
        //exit();

        $data = $movment = [];
        $items = [];

        $count = 0;
        $comisiones = 0;
        $totalTimbrar = 0;

        $date = Carbon::now();

        //$date = Carbon::parse('2023-05-05');

        $mesActual = $date->format('m');
        $yActual = $date->format('Y');

        if ( $mesActual == '01'){

        //remplaza la fecha en date
        $mesAnterior = $date->firstOfMonth()->subMonth()->format('m');
        $yAnterior = $date->format('Y');

        }else{

        //remplaza la fecha en date
        $yAnterior = $date->format('Y');
        $mesAnterior = $date->firstOfMonth()->subMonth()->format('m');


        }


        //echo $mesAnterior ;
        //echo $mesActual ;
        //echo $date;
        //exit();

        $response = Http::get('https://www.banxico.org.mx/SieAPIRest/service/v1/series/SP68257/datos/'.$yAnterior.'-'.$mesAnterior.'-06/'.$yActual.'-'.$mesActual.'-05?token=80ec867d5e915e6385b8216aaf288520c58185819a64ec19843f97d261f75bd3');

        foreach($response['bmx']['series'][0]['datos'] as $key => $item){
            if ($key === array_key_first($response['bmx']['series'][0]['datos'])) {
                
                $udi1 = $item['dato'];
                //echo 'First date '.$udi1;
            }
        
            if ($key === array_key_last($response['bmx']['series'][0]['datos'])) {
                $udi2 = $item['dato'];
               //echo 'Last date '.$item['dato'];
            }
        }


        //echo $udi1 ;
        //echo $udi2;
        //exit();

        foreach($file as $key => $line) {


            switch (Str::substr($line,0,2)) {
                case '01':
                    $subproducto = Str::substr($line, 2, 10);
                    $fechaCorte = Str::substr($line, 12, 8);
                    $numeroEstadoCuenta = Str::substr($line, 20, 6);
                    
                
                    echo '01';
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


                    echo '02';
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
                    $saldoCorte = trim(implode(".", str_split(Str::substr($line, 103, 10),8))); 
                    $saldoTotal1 = Str::substr($line, 113, 10);
                    $tasaInteresOrdinariaAnual = implode(".", str_split(Str::substr($line, 123, 4),2)); 
                    $tasaInteresOrdinariaPeriodo = implode(".", str_split(Str::substr($line, 127, 4),2)); 
                    $tasaInteresMoratoriaAnual = implode(".", str_split(Str::substr($line, 131, 4),2)); 
                    $tasaInteresMoratoriaPeriodo = implode(".", str_split(Str::substr($line, 136, 4),2)); 
                    
                    $numeroTarjeta = Str::substr($line, 139, 16); 
                    $limiteCredito = implode(".", str_split(Str::substr($line, 155, 9),7)); 
                    $creditoDisponible = implode(".", str_split(Str::substr($line, 164, 10),8)); 
                    $mesesSaldarCuenta = Str::substr($line, 174, 3); 
                    $fechaInicioPeriodo = Str::substr($line, 177, 3); 
                    $fechaFinPeriodo = Str::substr($line, 185, 8); 
                    $filler1 = Str::substr($line, 193, 1);
                    $medioAccesoExterno = trim(Str::substr($line, 194, 50));                     
                    $interesesReales = implode(".", str_split(Str::substr($line, 244, 10),8)); 
                    $ivaInteresesReales = implode(".", str_split(Str::substr($line, 254, 10),8)); 
                    $ivaTotal = implode(".", str_split(Str::substr($line, 264, 10),8)); 
                    $filler2 = Str::substr($line, 274, 10); 
                    $montoBaseCalculoInteres = implode(".", str_split(Str::substr($line, 284, 10),8)); 
                    $montoPagosPeriodicos = implode(".", str_split(Str::substr($line, 294, 10),8)); 
                    $montoCargosObjetados = implode(".", str_split(Str::substr($line, 304, 10),8)); 
                    $cuentaCacao = Str::substr($line, 314, 16); 
                    $clabe = Str::substr($line, 330, 18); 


                    $inflacion2 = ($udi2/$udi1)-1;
                    $inflacion = round($inflacion2,7);
                    
                   
                    //exit();

                    //$saldoTotal1 = " 000487845";

                    $saldoTotal2 = trim($saldoTotal1);

                    if ( $saldoTotal2 > 000000000){

                      $saldoTotal3 = implode(".", str_split($saldoTotal2,7));

                      $saldoTotal = ltrim($saldoTotal3,0);

                    }else{
                      
                      $saldoTotal3 = implode(".", str_split($saldoTotal2,7));

                      $saldoTotal= $saldoTotal3;
                    }
                   // echo  $tasaInteresOrdinariaAnual;
                    //exit();

                    //$tazaMensual = 1.35/12;

           
                    $tazaMensualPorcentaje = ($tasaInteresOrdinariaAnual*10)/12;
                    $tazaMensual = $tazaMensualPorcentaje/100;

                    //echo $inflacion;
                    //exit();


                    $tazaGravable = round($tazaMensual-$inflacion,5);
                    $tazaExcento = round($tazaMensual-$tazaGravable,5);
                    

                    $interesTotal= round($saldoTotal*$tazaMensual,2);
                    $interesGravable= round($saldoTotal * $tazaGravable,2);



                    if ( $interesGravable < 0.0){
                      $interesExcento = 0;
              

                    }else{
                      $interesExcento= round($saldoTotal * $tazaExcento,2);
                  
                    }

                   // echo $interesExcento;
                   // exit();

                    $ivaCausado= round($interesGravable * 0.16,2);

                    //$totalTimbrar2 = $interesGravable+$interesExcento+$ivaCausado;

                    //echo $totalTimbrar2;
                    //exit();
                

                    /*************************INTERESES******************************* */
                    if ( $interesGravable > 0.0){

                       $IvaInteresG = round($interesGravable*0.16,2);

                          $items[] = [
                            "ProductCode"=> "84121500",
                          // "IdentificationNumber"=> "EDL",
                            "Description"=> "Interes Gravable",
                            "Unit"=> "NO APLICA",
                            "UnitCode"=> "E48",
                            "UnitPrice"=> $interesGravable,
                            "Quantity"=> 1.0,
                            "Subtotal"=> $interesGravable,
                            "TaxObject"=> "02",
                            "Taxes"=> [
                              [
                                "Total"=> $IvaInteresG,
                                "Name"=> "IVA",
                                "Base"=> $interesGravable,
                                "Rate"=> 0.16,
                                "IsRetention"=> false
                              ]
                            ],
                            "Total"=> round($interesGravable + $IvaInteresG,2)
                          ];

                          $totalTimbrar =  round($interesGravable + $IvaInteresG,2);
                      }
                      


                      if ( $interesExcento > 0.0){

                        //$IvaInteresE = round($interesExcento*0.16,2);
                        $IvaInteresE = 0;

                          $items[] = [
                            "ProductCode"=> "84121500",
                          // "IdentificationNumber"=> "EDL",
                            "Description"=> "Interes Exento",
                            "Unit"=> "NO APLICA",
                            "UnitCode"=> "E48",
                            "UnitPrice"=> $interesExcento,
                            "Quantity"=> 1.0,
                            "Subtotal"=> $interesExcento,
                            "TaxObject"=> "02",
                            "Taxes"=> [
                              [
                                "Total"=> $IvaInteresE,
                                "Name"=> "IVA",
                                "Base"=> $interesExcento,
                                "Rate"=> 0,
                                "IsRetention"=> false
                              ]
                            ],
                            "Total"=> round($interesExcento,2)
                          ];

                          $totalTimbrar =  $totalTimbrar + round($interesExcento,2);

                        }

                    $clienteNuevo = new DatosTarjetahabiente;

                    $clienteNuevo->NoCliente = $medioAccesoExterno;
                    $clienteNuevo->numeroEstadoCuenta = $numeroEstadoCuenta; 
                    $clienteNuevo->nombre = $nombre;
                    $clienteNuevo->apellido1 = $apellido1;
                    $clienteNuevo->apellido2 = $apellido2;
                    $clienteNuevo->calle = $calle;
                    $clienteNuevo->numeroExterior = $numeroExterior;
                    $clienteNuevo->numeroInterior = $numeroInterior;
                    $clienteNuevo->colonia = $colonia;
                    $clienteNuevo->delMunicipio = $delMunicipio;
                    $clienteNuevo->estado = $estado;
                    $clienteNuevo->cp = $cp;
                    $clienteNuevo->save();

                    
                    $infoCorte = new InfoCorte;   

                    $infoCorte->NoCliente = $medioAccesoExterno;
                    $infoCorte->numeroEstadoCuenta = $numeroEstadoCuenta; 
                    $infoCorte->rfc=$rfc;
                    $infoCorte->fechaLimitePago=$fechaLimitePago;
                    $infoCorte->pagoMinimoRequerido=$pagoMinimoRequerido;
                    $infoCorte->pagoNoGenerarIntereses=$pagoNoGenerarIntereses;
                    $infoCorte->saldoAnterior=$saldoAnterior;
                    $infoCorte->comprasDisposiciones=$comprasDisposiciones;
                    $infoCorte->comisionesCobradas=$comisionesCobradas;
                    $infoCorte->interesesCargados=$interesesCargados;
                    $infoCorte->iva=$iva;
                    $infoCorte->pagosRembolsosDevoluciones=$pagosRembolsosDevoluciones;
                    $infoCorte->saldoCorte=$saldoCorte;
                    $infoCorte->saldoTotal=$saldoTotal;
                    $infoCorte->tasaInteresOrdinariaAnual=$tasaInteresOrdinariaAnual;
                    $infoCorte->tasaInteresOrdinariaPeriodo=$tasaInteresOrdinariaPeriodo;
                    $infoCorte->tasaInteresMoratoriaAnual=$tasaInteresMoratoriaAnual;
                    $infoCorte->tasaInteresMoratoriaPeriodo=$tasaInteresMoratoriaPeriodo;
                    $infoCorte->numeroTarjeta=$numeroTarjeta;
                    $infoCorte->limiteCredito=$limiteCredito;
                    $infoCorte->creditoDisponible=$creditoDisponible;
                    $infoCorte->mesesSaldarCuenta=$mesesSaldarCuenta;
                    $infoCorte->fechaInicioPeriodo=$fechaInicioPeriodo;
                    $infoCorte->fechaFinPeriodo=$fechaFinPeriodo;
                    $infoCorte->medioAccesoExterno=$medioAccesoExterno;                  
                    $infoCorte->interesesReales=$interesesReales;
                    $infoCorte->ivaInteresesReales=$ivaInteresesReales;
                    $infoCorte->ivaTotal=$ivaTotal;
                    $infoCorte->montoBaseCalculoInteres=$montoBaseCalculoInteres;
                    $infoCorte->montoPagosPeriodicos=$montoPagosPeriodicos;
                    $infoCorte->montoCargosObjetados=$montoCargosObjetados;
                    $infoCorte->cuentaCacao=$cuentaCacao;
                    $infoCorte->clabe=$clabe;
                    $infoCorte->inflacion=$inflacion;
                    $infoCorte->tazaGravable=$tazaGravable;
                    $infoCorte->tazaExcento=$tazaExcento;
                    $infoCorte->interesTotal=$interesTotal;
                    $infoCorte->interesGravable=$interesGravable;
                    $infoCorte->interesExcento=$interesExcento;
                    $infoCorte->ivaCausado=$ivaCausado;
                    $infoCorte->totalTimbrar=$totalTimbrar;

                    $infoCorte->save();

                    //echo "03";
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
                    $pesos2 = trim(implode(".", str_split(Str::substr($line, 194, 10),8)));
                    $pesos = ltrim($pesos2,0);
                    $filler3 = Str::substr($line, 204, 1);
                    $claveMovimiento1 = Str::substr($line, 205, 10);
                    $claveMovimiento = trim($claveMovimiento1);
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

      
                      
                   /*    switch ($claveMovimiento) {
                
               
                        case 'REP4F':

                            $comisiones += $pesos;
                            
                        break;
   

                       case 'CREDITO81':

                        $comisiones += $pesos;
                        
                       break;
                       case 'CREDITO82':

                        $comisiones += $pesos;
                        
                       break;
                       case 'CREDITO08':

                        $comisiones += $pesos;
                        
                       break;

                        }
*/
                        //echo $comisiones;
                        //exit();


   /*******************************************COMISIONES******************************************************** */

                      switch ($claveMovimiento) {
                        case 'PB117':

                          $items[] = [
                            "ProductCode"=> "84121500",
                            // "IdentificationNumber"=> "EDL",
                             "Description"=> "Retiro en ATM",
                             "Unit"=> "NO APLICA",
                             "UnitCode"=> "E48",
                             "UnitPrice"=> 112.04,
                             "Quantity"=> 1.0,
                             "Subtotal"=> 112.04,
                             "TaxObject"=> "02",
                              "Taxes"=> [
                               [
                                 "Total"=> 17.92,
                                 "Name"=> "IVA",
                                 "Base"=> 112.04,
                                 "Rate"=> 0.16,
                                 "IsRetention"=> false
                               ]
                             ],
                             "Total"=> 129.97
                            ];
                            
                            $totalTimbrar =  $totalTimbrar + 129.97;

                         break;
                        case 'COMANUAL':

                          $items[] = [
                            "ProductCode"=> "84121500",
                            // "IdentificationNumber"=> "EDL",
                             "Description"=> "Comision Anual Titular",
                             "Unit"=> "NO APLICA",
                             "UnitCode"=> "E48",
                             "UnitPrice"=> $pesos,
                             "Quantity"=> 1.0,
                             "Subtotal"=> $pesos,
                             "TaxObject"=> "02",
                              "Taxes"=> [
                               [
                                 "Total"=> round($pesos*0.16,2),
                                 "Name"=> "IVA",
                                 "Base"=> $pesos,
                                 "Rate"=> 0.16,
                                 "IsRetention"=> false
                               ]
                             ],
                             "Total"=> round($pesos + round($pesos*0.16,2),2)
                            ];
                            
                            $totalTimbrar =  $totalTimbrar + $pesos + round($pesos*0.16,2);

                            break;
/*
                        case 'IVACOMAN':
                          # code...
                          $items[] = [
                            "ProductCode"=> "84121500",
                            // "IdentificationNumber"=> "EDL",
                             "Description"=> "IVA Comision Anual Titular",
                             "Unit"=> "NO APLICA",
                             "UnitCode"=> "E48",
                             "UnitPrice"=> $pesos,
                             "Quantity"=> 1.0,
                             "Subtotal"=> $pesos,
                             "TaxObject"=> "02",
                              "Taxes"=> [
                               [
                                 "Total"=> 0,
                                 "Name"=> "IVA",
                                 "Base"=> $pesos,
                                 "Rate"=> 0,
                                 "IsRetention"=> false
                               ]
                             ],
                             "Total"=> $pesos
                            ];

                          break;
*/
                          case 'INTORD':

                            $items[] = [
                              "ProductCode"=> "84121500",
                             // "IdentificationNumber"=> "EDL",
                              "Description"=> "Interes Ordinarios",
                              "Unit"=> "NO APLICA",
                              "UnitCode"=> "E48",
                              "UnitPrice"=> $pesos,
                              "Quantity"=> 1.0,
                              "Subtotal"=> $pesos,
                              "TaxObject"=> "02",
                               "Taxes"=> [
                                [
                                  "Total"=> round($pesos*0.16,2),
                                  "Name"=> "IVA",
                                  "Base"=> $pesos,
                                  "Rate"=> 0.16,
                                  "IsRetention"=> false
                                ]
                              ],
                              "Total"=> round($pesos + round($pesos*0.16,2),2)
                            ];
    
                            $totalTimbrar =  $totalTimbrar + $pesos + round($pesos*0.16,2);
                            
                          break;
/*
                          case 'IVAINTORD':

                          $items[] = [
                          "ProductCode"=> "84121500",
                         // "IdentificationNumber"=> "EDL",
                          "Description"=> "IVA de Interes Ordinarios",
                          "Unit"=> "NO APLICA",
                          "UnitCode"=> "E48",
                          "UnitPrice"=> $pesos,
                          "Quantity"=> 1.0,
                          "Subtotal"=> $pesos,
                          "TaxObject"=> "02",
                           "Taxes"=> [
                            [
                              "Total"=> 0,
                              "Name"=> "IVA",
                              "Base"=> $pesos,
                              "Rate"=> 0,
                              "IsRetention"=> false
                            ]
                          ],
                          "Total"=> $pesos
                        ];

                          break;
*/
                          case 'INTMOR':

                            $items[] = [
                              "ProductCode"=> "84121500",
                             // "IdentificationNumber"=> "EDL",
                              "Description"=> "Interes Moratorio",
                              "Unit"=> "NO APLICA",
                              "UnitCode"=> "E48",
                              "UnitPrice"=> $pesos,
                              "Quantity"=> 1.0,
                              "Subtotal"=> $pesos,
                              "TaxObject"=> "02",
                               "Taxes"=> [
                                [
                                  "Total"=> round($pesos*0.16,2),
                                  "Name"=> "IVA",
                                  "Base"=> $pesos,
                                  "Rate"=> 0.16,
                                  "IsRetention"=> false
                                ]
                              ],
                              "Total"=> round ($pesos + round($pesos*0.16,2),2)
                            ];
    
                            $totalTimbrar =  $totalTimbrar + $pesos + round($pesos*0.16,2);

                           break;
/*
                          case 'IVAINTMOR':

                            $items[] = [
                            "ProductCode"=> "84121500",
                           // "IdentificationNumber"=> "EDL",
                            "Description"=> "IVA de Interes Moratorio",
                            "Unit"=> "NO APLICA",
                            "UnitCode"=> "E48",
                            "UnitPrice"=> $pesos,
                            "Quantity"=> 1.0,
                            "Subtotal"=> $pesos,
                            "TaxObject"=> "02",
                             "Taxes"=> [
                              [
                                "Total"=> 0,
                                "Name"=> "IVA",
                                "Base"=> $pesos,
                                "Rate"=> 0,
                                "IsRetention"=> false
                              ]
                            ],
                            "Total"=> $pesos
                          ];
  
                            break;
*/
                            case 'CREDITO28':

                              $items[] = [
                                "ProductCode"=> "84121500",
                               // "IdentificationNumber"=> "EDL",
                                "Description"=> "Gastos de Cobranza",
                                "Unit"=> "NO APLICA",
                                "UnitCode"=> "E48",
                                "UnitPrice"=> $pesos,
                                "Quantity"=> 1.0,
                                "Subtotal"=> $pesos,
                                "TaxObject"=> "02",
                                 "Taxes"=> [
                                  [
                                    "Total"=> round($pesos*0.16,2),
                                    "Name"=> "IVA",
                                    "Base"=> $pesos,
                                    "Rate"=> 0.16,
                                    "IsRetention"=> false
                                  ]
                                ],
                                "Total"=> round($pesos + round($pesos*0.16,2),2)
                              ];
      
                              $totalTimbrar =  $totalTimbrar + $pesos + round($pesos*0.16,2);

                             break;
                    
/*
                            case 'CREDITO29':

                              $items[] = [
                              "ProductCode"=> "84121500",
                             // "IdentificationNumber"=> "EDL",
                              "Description"=> "IVA de Gastos de Cobranza",
                              "Unit"=> "NO APLICA",
                              "UnitCode"=> "E48",
                              "UnitPrice"=> $pesos,
                              "Quantity"=> 1.0,
                              "Subtotal"=> $pesos,
                              "TaxObject"=> "02",
                               "Taxes"=> [
                                [
                                  "Total"=> 0,
                                  "Name"=> "IVA",
                                  "Base"=> $pesos,
                                  "Rate"=> 0,
                                  "IsRetention"=> false
                                ]
                              ],
                              "Total"=> $pesos
                            ];
    
                              break;


                              
                            case 'CREDITO82':

                              $items[] = [
                              "ProductCode"=> "84121500",
                             // "IdentificationNumber"=> "EDL",
                              "Description"=> "IVA Comisión",
                              "Unit"=> "NO APLICA",
                              "UnitCode"=> "E48",
                              "UnitPrice"=> $pesos,
                              "Quantity"=> 1.0,
                              "Subtotal"=> $pesos,
                              "TaxObject"=> "02",
                               "Taxes"=> [
                                [
                                  "Total"=> 0,
                                  "Name"=> "IVA",
                                  "Base"=> $pesos,
                                  "Rate"=> 0,
                                  "IsRetention"=> false
                                ]
                              ],
                              "Total"=> $pesos
                            ];
    
                              break;
*/
                      
                      }
               
                      $infoCorte = new InfoOperaciones;  
  
                      $infoCorte->NoCliente = $medioAccesoExterno;
                      $infoCorte->numeroEstadoCuenta = $numeroEstadoCuenta; 
                      $infoCorte->fechaOperacion=$fechaOperacion;
                      $infoCorte->fechaAplicacion=$fechaAplicacion;
                      $infoCorte->descripcion=$descripcion;
                      $infoCorte->rfcComercio=$rfcComercio;
                      $infoCorte->poblacion=$poblacion;
                      $infoCorte->monedaExtranjera=$monedaExtranjera;
                      $infoCorte->montoDivisaExtranjera=$montoDivisaExtranjera;
                      $infoCorte->pesos=$pesos;
                      $infoCorte->claveMovimiento=$claveMovimiento;
                      $infoCorte->idMovimiento=$idMovimiento;
                      $infoCorte->comisiones=$comisiones;
                      $infoCorte->save();
                  
                      echo "04";
                    // echo '04 --> '.$fechaOperacion.' --- '.$fechaAplicacion.' --- '.$descripcion.' --- '.$rfcComercio.' --- '.$poblacion.' --- '.$monedaExtranjera.' --- '.$montoDivisaExtranjera.' --- '.$pesos.' --- '.$filler2.' --- '.$claveMovimiento.' --- '.$idMovimiento.'<br>';
                    break;
                case '05':
                    $numeroRegistrosOperaciones = Str::substr($line, 2, 3);
                    

                   /* $totalTimbrar3 = $totalTimbrar1;
                    $totalTimbrar = round($totalTimbrar3,2);
                    
                    if ( ( $totalTimbrar < 0.00 )|| ($totalTimbrar === 0.00)){
                      $totalTimbrar = 0.5;
                    }*/

                      // echo $totalTimbrar;
                       // exit();
                    

                  //echo $totalTimbrar;
                   //exit();

                 /*  $items[] = [
                    "ProductCode"=> "84121500",
                    // "IdentificationNumber"=> "EDL",
                     "Description"=> "Servicios de facturación",
                     "Unit"=> "NO APLICA",
                     "UnitCode"=> "E48",
                     "UnitPrice"=> $totalTimbrar,
                     "Quantity"=> 1.0,
                     "Subtotal"=> $totalTimbrar,
                     "TaxObject"=> "02",
                      "Taxes"=> [
                       [
                         "Total"=> 0,
                         "Name"=> "IVA",
                         "Base"=> $totalTimbrar,
                         "Rate"=> 0,
                         "IsRetention"=> false
                       ]
                     ],
                     "Total"=> $totalTimbrar

                    ];
*/
                    


                      if ( empty($items) ){

                        $items[] = [
                          "ProductCode"=> "84121500",
                          // "IdentificationNumber"=> "EDL",
                           "Description"=> "Servicios de facturación",
                           "Unit"=> "NO APLICA",
                           "UnitCode"=> "E48",
                           "UnitPrice"=> 0.5,
                           "Quantity"=> 1.0,
                           "Subtotal"=> 0.5,
                           "TaxObject"=> "02",
                            "Taxes"=> [
                             [
                               "Total"=> 0,
                               "Name"=> "IVA",
                               "Base"=> 0.5,
                               "Rate"=> 0,
                               "IsRetention"=> false
                             ]
                           ],
                           "Total"=> 0.5
      
                          ];

                          $totalTimbrar = 0.5;

                      }



                      //print $totalTimbrar;
                      //exit();
       
/*

                      $facturama = new \Facturama\Client('omarRocha19', '12345678');
                      $params=
                      [
                        "Currency"=> "MXN",
                        "ExpeditionPlace"=> "26015",
                        //"PaymentConditions"=> "Pago en una sola exhibición",
                        //"Folio"=> "100",
                        "CfdiType"=> "I",
                        "PaymentForm"=> "03",
                        "PaymentMethod"=> "PUE",
                       
                        "Receiver"=> [
                          "Rfc"=>"XAXX010101000",
                          "Name"=> 'PUBLICO GENERAL',
                          "CfdiUse"=> "S01",
                          "TaxZipCode"=> "26015",
                          "FiscalRegime"=>"616"
                        ],
                        "Items"=> $items
                       
                      ];*/
                      //CFDI 4.0 - Tipo Ingreso

                    /*  $facturama = new \Facturama\Client('4FINAN', 'FINMex44');
                      $params=
                      [
                        "Currency"=> "MXN",
                        "ExpeditionPlace"=> "03920",
                        //"PaymentConditions"=> "Pago en una sola exhibición",
                        //"Folio"=> "100",
                        "CfdiType"=> "I",
                        "PaymentForm"=> "03",
                        "PaymentMethod"=> "PUE",
                      
                        "Receiver"=> [
                          "Rfc"=>"XAXX010101000",
                          "Name"=> 'PUBLICO GENERAL',
                          "CfdiUse"=> "S01",
                          "TaxZipCode"=> "03920",
                          "FiscalRegime"=>"616"
                        ],
                        "Items"=> $items
                       
                      ];
*/
                   //  $result = $facturama->post('3/cfdis', $params);
                      
                      $items = [];

                     /*
                      $Uuid = $result->Complement->TaxStamp->Uuid;
                      $Date = $result->Complement->TaxStamp->Date;
                      $CfdiSign = $result->Complement->TaxStamp->CfdiSign;
                      $SatCertNumber = $result->Complement->TaxStamp->SatCertNumber;
                      $SatSign = $result->Complement->TaxStamp->SatSign;
                      $OriginalString = $result->OriginalString;
              

                      $today = Carbon::now()->format('Ymd');
                      $filename = Str::slug($Uuid.$nombre.$apellido1.$apellido2);
                     
                      $path = storage_path('public').'/'.$today.'/'.'qrcodes';

                      if (!File::exists($path)) {
                          Storage::makeDirectory('public/'.$today.'/'.'qrcodes', 0777);
                      }
                    

                    $QR = QrCode::format('svg')->size(700)->generate('https://verificacfdi.facturaelectronica.sat.gob.mx/default.aspx?id='.$Uuid.'&re=ROPO891119328&rr='.$rfc.'&tt='.$totalTimbrar.'&fe=DI7gWg==', storage_path('app/public').'/'.$today.'/'.'qrcodes/'.$filename.'.png');
                    $urlQr = storage_path('app/public').'/'.$today.'/'.'qrcodes/'.$filename.'.png';
            */

                    $infoEstado = new InfoEstadosCuenta;
                    $infoEstado->NoCliente = $medioAccesoExterno;
                    $infoEstado->numeroEstadoCuenta=$numeroEstadoCuenta;
                    $infoEstado->subproducto=$subproducto;
                    $infoEstado->fechaCorte=$fechaCorte;
                    $infoEstado->numeroRegistrosOperaciones=$numeroRegistrosOperaciones;
                    $infoEstado->totalTimbrar=$totalTimbrar;

                  /*  $infoEstado->Uuid =$Uuid;
                    $infoEstado->Date=$Date;
                    $infoEstado->CfdiSign=$CfdiSign;
                    $infoEstado->SatCertNumber=$SatCertNumber;
                    $infoEstado->SatSign=$SatSign;
                    $infoEstado->OriginalString=$OriginalString;
                    $infoEstado->urlQr=$urlQr;
                    */
                    $infoEstado->Uuid ='0';
                    $infoEstado->Date='0';
                    $infoEstado->CfdiSign='0';
                    $infoEstado->SatCertNumber='0';
                    $infoEstado->SatSign='0';
                    $infoEstado->OriginalString='0';
                    $infoEstado->urlQr='0';
                    
                    
                    $infoEstado->save();


                    
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
                        'numeroRegistrosOperaciones'=>$numeroRegistrosOperaciones,
                        'interesGravable'=> round($interesGravable,5),
                        'interesExcento'=>round($interesExcento,5),
                       /* 'QR' => $urlQr,
                        'Uuid' => $Uuid,
                        'Date' => $Date,
                        'CfdiSign' => $CfdiSign,
                        'SatCertNumber' => $SatCertNumber,
                        'SatSign' => $SatSign,
                        'OriginalString' => $OriginalString,*/
                    ]; 

                    if(count($movment)>0){
                        unset($movment);
                        $movment = [];
                    }
                    $count++;
                  
                 if ($count == 1) {
                        break 2;
                    }else{
                        break;
                    }
                    echo "05"; 
            }   
        }



       // $today = Carbon::now()->format('Ymd');
        $today = Carbon::now()->format('mY');
        $Producto ='clasica';

        foreach ($data as $key => $item) {
            $filename = Str::slug($item['medioAccesoExterno'].'_'.$today.'_'.$item['nombre'].'_'.$item['apellido1'].'_'.$item['apellido2']).'.pdf';
            echo 'crear archivo';
            $pdfOutput = PDF::loadView('pdfClasica', $item)->output();
            echo 'view pdf';
            Storage::disk('public')->put($Producto.'/'.$filename, $pdfOutput);
            //Storage::disk('s3')->put($filename, $pdfOutput);
            echo 'Realizado: '.$item['nombre'];
        }
    }
}
