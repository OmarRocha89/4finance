<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\DatosTarjetahabiente;
use App\Models\InfoCorte;
use App\Models\InfoEstadosCuenta;
use App\Models\InfoOperaciones;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Arr;

use App\Models\Acuses;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('home');
    }

    public function facturas()
    {

        return view('facturas');
    }

    public function vistaClientes()
    {

        return view('clientes');
    }
    public function vistaInfoClientes($id)
    {

        return view('datosClientes',['id'=>$id]);
    }
    public function vistaInfoOperaciones($id)
    {

        return view('operaciones',['id'=>$id]);
    }
    public function vistaInfoCorte($id)
    {

        return view('infoCorte',['id'=>$id]);
    }
 
     public function vistaAcuse($id){

        $str ="{'id':".$id."}";

        return view('acuse',['id'=>$id]);
     }

    /************************************* */

    public function datos($id)
    {

        $users = DatosTarjetahabiente::where('NoCliente', $id)->first();
        
        return response()->json($users, status:200);
    }


    public function datos2()
    {

        $users = DatosTarjetahabiente::all();
        
        return response()->json($users, status:200);
    }


    public function TodasFacturas()
{

    /* productivo
    $facturama = new \Facturama\Client('4FINAN', 'FINMex44');*/

    $facturama = new \Facturama\Client('omarRocha19', '12345678');
    
    $params = [
        'type' => 'issued',
        //'keyword' => 'Expresion en Software',
        'status' => 'all',
        'page'=>'0',
    ];
    $result = $facturama->get('/Cfdi', $params);

    /* CANCELAR FACTURAS MASIVAS
    $flowers = array();
    $i=0;

    foreach($result as $item) {

         if ($item->Status == 'active'){
                $i++;
            array_push($flowers, $item->Id);
         }
    }


    foreach($flowers as $item) {

      
        $CfdiId = $item;
        $id = $item;
        $params = [
            'type' => 'issued',
            'motive'=>'03',
            //'uuidReplacement'=>'null'
        ];
        
        $result = $facturama->delete('Cfdi/'.$CfdiId, $params);
        

        
        $acuse = new Acuses;  
        
        $acuse->idFactura = $id;
        $acuse->Status= $result->Status;
        $acuse->Message= $result->Message;
        $acuse->IsCancelable= $result->IsCancelable;
        $acuse->Uuid= $result->Uuid;
        $acuse->RequestDate= $result->RequestDate;
        $acuse->ExpirationDate= $result->ExpirationDate;
        $acuse->AcuseXmlBase64= $result->AcuseXmlBase64;
        $acuse->urlAcuse='';
        $acuse->CancelationDate= $result->CancelationDate;
        $acuse->save();

 
     }*/

    //printf('<pre>%s<pre>', var_export($result, true));

    return response()->json($result, status:200);

}


public function descargarFacturas($id){

    /* PRODUCTIVO
    $facturama = new \Facturama\Client('4FINAN', 'FINMex44');*/

    $facturama = new \Facturama\Client('omarRocha19', '12345678');

    $format = 'pdf';  //Formato del archivo a obtener(pdf,Xml,html)
$type = 'issued'; // Tipo de comprobante a obtener (payroll | received | issued)
//$id = 'OwMgofF7ZDEM60gerUXudw2'; // Identificador unico de la factura
$params = [];
$result = $facturama->get('cfdi/'.$format.'/'.$type.'/'.$id, $params);
//$myfile = fcreate('factura'.$id.'.'.$format);
$today = Carbon::now()->format('Ymd');

$path = storage_path('public').'/facturas'.'/'.$today;

if (!File::exists($path)) {
    Storage::makeDirectory('public/facturas/'.$today, 0777);
}

$myfile = fopen('../storage/app/public/facturas/'.$today.'/'.'factura-'.$id.'.'.$format, 'a+');
fwrite($myfile, base64_decode(end($result)));
fclose($myfile);

$urlFile= 'storage/facturas/'.$today.'/'.'factura-'.$id.'.pdf';
$headers = [
    'Content-Type' => 'application/pdf',
 ];
$nombre = 'factura-'.$id.'.pdf';
//Storage::disk('public')->put('facturas/'.$today, $myfile);

return response()->download($urlFile, $nombre, $headers);

}

public function cancelarFacturas($id){

    /*** PRODUCTIVO
     $facturama = new \Facturama\Client('4FINAN', 'FINMex44');*/

     $facturama = new \Facturama\Client('omarRocha19', '12345678');

    $CfdiId = $id;
$params = [
    'type' => 'issued',
    'motive'=>'03',
    //'uuidReplacement'=>'null'
];

$result = $facturama->delete('Cfdi/'.$CfdiId, $params);

$today = Carbon::now()->format('Ymd');

$path = storage_path('public').'/facturas'.'/'.$today.'/acuses';

if (!File::exists($path)) {
    Storage::makeDirectory('public/facturas/'.$today.'/acuses', 0777);
}

$myfile = fopen('../storage/app/public/facturas/'.$today.'/acuses'.'/'.'acuse-'.$id.'.pdf', 'a+');
fwrite($myfile, $result->AcuseXmlBase64);
fclose($myfile);

$urlFile= 'storage/facturas/'.$today.'/acuses'.'/'.'acuse-'.$id.'.pdf';

//Storage::disk('public')->put('facturas/'.$today, $myfile);


$acuse = new Acuses;  

$acuse->idFactura = $id;
$acuse->Status= $result->Status;
$acuse->Message= $result->Message;
$acuse->IsCancelable= $result->IsCancelable;
$acuse->Uuid= $result->Uuid;
$acuse->RequestDate= $result->RequestDate;
$acuse->ExpirationDate= $result->ExpirationDate;
$acuse->AcuseXmlBase64= $result->AcuseXmlBase64;
$acuse->urlAcuse= $urlFile;
$acuse->CancelationDate= $result->CancelationDate;
$acuse->save();

//printf('<pre>%s<pre>', var_export($result, true));

//return response()->json($result, status:200);

return view('facturas',['result'=>$result->Message]);


}


public function acuse($id)
{

 
    $users = Acuses::where('idFactura', $id)->first();
    
    return response()->json($users, status:200);
}


    public function estados()
    {

        $users = InfoEstadosCuenta::all();
        
        return response()->json($users, status:200);
    }




    public function infoCorte($id)
    {

        $users = InfoCorte::where('NoCliente', $id)->first();
        
        return response()->json($users, status:200);
    }

    public function infoOperaciones($id)
    {

        $users = infoOperaciones::where('NoCliente', $id)->get();
        
        return response()->json($users, status:200);
    }

}
