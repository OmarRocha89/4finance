<!DOCTYPE html>
<html lang="en">
{{-- <html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"
    xmlns:o="urn:schemas-microsoft-com:office:office"> --}}


<head>
    <meta name="Viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <!--[if mso]>
<style type=”text/css”>
.fallback-text {
font-family: Arial, sans-serif;
}
</style>
<![endif]-->


    <!--iconos-->


    <style>
        p {
            margin-bottom: 0px;
            color: #839197;
            font-family: "source_sans_proregular", Helvetica, Arial, sans-serif;
            font-size: 15px;
            margin-top: 0px;
            padding-bottom: 0px;
            padding-top: 20px;
        }

        a,
        a[href] {
            color: #ef5e5a;
        }

        h1 {
            font-family: "source_sans_proregular", Helvetica, Arial, sans-serif;
            font-size: 19px;
            font-weight: bold;
            color: #000;
            margin-bottom: 10px;
        }

        .button {
            width: 200px;
            background-color: #ef5e5a;
            border-radius: 24px;
            font-size: 15px;
            line-height: 45px;
            text-align: center;
            padding: 10px 20px;
        }

        #btnActivar {
            font-weight: bold;
            color: #fff;
            background: #ef5e5a;
            border-radius: 30px;
            padding: 10px 20px;
            margin: 50px 0px;
            text-decoration: none;
            font-size: 16px;
            box-shadow: 0px 5px 16px rgba(199, 86, 95, 0.5);
            font-family: 'source_sans_proregular', Helvetica, Arial, sans-serif;
        }

        .boton {
            text-align: center;
            position: relative;
            float: lefT;
            /* width: 100%; */
            color: #fff;
            background-color: #28a745;
            border-color: #28a745;
            font-size: 16px;
            margin: 10px;
            text-decoration: none;
            font-family: "source_sans_proregular", Helvetica, Arial, sans-serif;
            line-height: 22px;
            height: 80px;
            display: flex;
            align-items: center;
        }

        /******************************************/
        body,
        html {
            font-family: "source_sans_proregular", Helvetica, Arial, sans-serif;
            margin: 0px;
        }

        .row-blanca {
            color: #000;
            padding: 5px 10px;
            font-size: 12px;
            margin-bottom: 10px;
        }

        .row-gris {
            color: #000;
            background: #d3dacf;
            padding: 5px 10px;
            font-size: 12px;
            margin-bottom: 10px;
            border-radius: 10px;
        }

        .row-verde {
            color: #000;
            background: #b8ce88;
            padding: 5px 10px;
            font-size: 12px;
            margin-bottom: 20px;
            border-radius: 10px;
        }

        p,
        tr,
        td {
            margin: 0px;
            padding: 0px;
        }

        .text-center {
            text-align: center;
        }

        tr {
            vertical-align: top;
        }

        .row-verde2 {
            color: #fff;
            background: #527d37;
            padding: 5px 10px;
            font-size: 12px;
            margin-bottom: 10px;
            border-radius: 10px;
        }

        table {
            border-collapse: collapse;
            border-spacing: 0;
        }

        .page-break {
            page-break-after: always;
        }

        @page {
            margin: 0cm 0cm;


        }

        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;


        }

 #footer .page:after { content: counter(page);   }
 




    </style>
</head>

<body>


    <!--  <table style="background: #f2f2f2; width:100%; text-align:center; height:100%; table-layout: fixed;" width="100%" cellspacing="0" cellpadding="0" align="center">
        <tbody>
            <tr>
                <td>


                    <center>-->
    <table style=" font-size:9px;  padding:0px 0px; background: #fff; margin-top:10px; margin-bottom:0px; width:700px;"
        width="700" border="0" cellspacing="0" cellpadding="0" align="center">
        <tbody>

            <tr>

                <td style="padding:10px 20px 20px 20px; text-align: right;">
                    <p style="color:#000; font-size:18px; margin-bottom:0px; padding:0px;">Estado de Cuenta</p>
                    <p style="padding:0px; color:#000; font-size:12px;">Tarjeta de Crédito Clásica</p>
                 
                    
                </td>
            </tr>
            <tr style="background: #a6ce39;height:50px; ">
                <td style="padding:5px 10px 5px 10px; width:50%; text-align:right;">

                    <img src="{{public_path('img/logo.png')}}" height="25" alt="">

                </td>
            </tr>
            <tr>
                <td>
                    <table style="width:100%;" border="0" cellspacing="0" cellpadding="0" align="center">
                        <tbody>
                            <tr>
                                <td style="padding:20px 10px 0px 10px; width:50%;">

                                    <table style="width:100%;" border="0" cellspacing="0" cellpadding="0"
                                        align="center">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <p
                                                        style="color:#000; font-size:13px; font-weight: bold; margin-bottom:5px; padding:0px;">
                                                       
                                                    
                                                        {{ $nombre}} {{$apellido1}}  {{$apellido2}} 
                   
                    
                    

                                                   
                                                    
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p class="row-gris">Dirección del cliente</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p style="font-size:12px;" >{{ utf8_decode($calle)}} {{$numeroExterior}}  {{$numeroInterior}} </p>
                                                    <p style="font-size:12px;">{{utf8_decode($colonia) }}</p>
                                                    <p style="font-size:12px;">{{utf8_decode($delMunicipio)}},{{utf8_decode($estado)}}.{{$cp }}</p>
                                                    <p><br></p>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <p class="row-gris">Número de Cliente: {{ $medioAccesoExterno }}</p>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td>
                                                    <p class="row-verde">Número de Tarjeta: {{$numeroTarjeta}}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p class="row-gris">R.F.C.: {{$rfc}}</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>

                        

                                <td style="padding:20px 10px 0px 10px; width:50%;">

                                    <table style="width:100%;" border="0" cellspacing="0" cellpadding="0"
                                        align="center">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <p><br></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    
                                                   
                                                    @if ( \Carbon\Carbon::parse($fechaFinPeriodo)->format('m') == '01')
                                                        
                                                    <p class="row-verde">Periodo: 06/12/{{ \Carbon\Carbon::parse($fechaFinPeriodo)->format('Y')-1 }} al {{\Carbon\Carbon::parse($fechaFinPeriodo)->format('d/m/Y')}}  </p>

                                                    @else
                                                        <p class="row-verde">Periodo: 06/{{ (\Carbon\Carbon::parse($fechaFinPeriodo)->format('m'))-1 }}/{{ \Carbon\Carbon::parse($fechaFinPeriodo)->format('Y') }} al {{\Carbon\Carbon::parse($fechaFinPeriodo)->format('d/m/Y')}}  </p> 
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p><br></p>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <p class="row-verde">Fecha Limite de Pago: {{\Carbon\Carbon::parse($fechaLimitePago)->format('d/m/Y')}}</p>
                                                </td>

                                            </tr>


                                            <tr>
                                                <td>
                                                    <p class="row-gris">Pago para no generar intereses: $ {{number_format($pagoNoGenerarIntereses,2)}}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p class="row-verde">Pago Minimo Requerido: $ {{number_format($pagoMinimoRequerido,2)}}</p>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <p class="row-gris">Fecha de Corte: {{\Carbon\Carbon::parse($fechaCorte)->format('d/m/Y')}}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p class="row-verde">Días de Periodo: 29 días</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>



                        </tbody>
                    </table>

                </td>
            </tr>



            <tr>
                <td style="padding:0px 10px; width:100%;">
                    <p style="border-top:1px solid #28a745;"><br></p>
                </td>
            </tr>


            <tr>
                <td>
                    <table style="width:700px;" cellspacing="0" cellpadding="0" border="0" align="center">
                        <tbody>
                            <tr>

                                <td style="padding:0px 10px; width:330px;">

                                    <table style="width:100%; text-align:center;" border="0" cellspacing="0"
                                        cellpadding="0" align="center">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <table style="width:98%; padding:5px; font-size:14px;"
                                                        class="row-verde2 text-center" border="0" cellspacing="0"
                                                        cellpadding="0" align="center">
                                                        <tbody>
                                                            <tr>
                                                                <td>Información de Tarjeta</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table style="width:98%; padding:0px 3px;" class="row-blanca"
                                                        cellspacing="0" border="0" cellpadding="0" align="center">
                                                        <tbody>
                                                            <tr>
                                                                <td style="text-align:left; padding:5px;">CAT sin IVA
                                                                </td>
                                                                <td style="text-align:right;  padding:5px;">5817.20%</td>
                                                           
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table style="width:98%; padding:0px 3px;" class="row-gris"
                                                        border="0" cellspacing="0" cellpadding="0" align="center">
                                                        <tbody>
                                                            <tr>
                                                                <td style="text-align:left; padding:5px;">Tasa de
                                                                    Interés Anual Ordinaria</td>
                                                               <td style="text-align:right; padding:5px;">486%</td>
                                                            
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table style="width:98%; padding:0px 3px;" class="row-blanca"
                                                        border="0" cellspacing="0" cellpadding="0" align="center">
                                                        <tbody>
                                                            <tr>
                                                                <td style="text-align:left; padding:5px;">Tasa de
                                                                    Interés Mensual</td>
                                                                <td style="text-align:right;  padding:5px;">40.5%</td>
                                                                 
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table style="width:98%; padding:0px 3px;" class="row-gris"
                                                        border="0" cellspacing="0" cellpadding="0" align="center">
                                                        <tbody>
                                                            <tr>
                                                                <td style="text-align:left; padding:5px;">Intereses
                                                                    Gravados</td>
                                                                <td style="text-align:right;  padding:5px;">{{  round($interesGravable*0.01,2) }} %</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table style="width:98%; padding:0px 3px;" class="row-blanca"
                                                        border="0" cellspacing="0" cellpadding="0" align="center">
                                                        <tbody>
                                                            <tr>
                                                                <td style="text-align:left; padding:5px;">Interes
                                                                    Exentos</td>
                                                                <td style="text-align:right;  padding:5px;">{{ round($interesExcento*0.01,2) }} %</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </td>



                                <td style="padding:0px 10px; width:330px;">

                                    <table style="width:100%;" border="0" cellspacing="0" cellpadding="0"
                                        align="center">
                                        <tbody>
                                            <tr>
                                                <td>

                                                    <table style="width:98%; padding:5px; font-size:14px;"
                                                        class="row-verde2 text-center" border="0" cellspacing="0"
                                                        cellpadding="0" align="center">
                                                        <tbody>
                                                            <tr>
                                                                <td>Información de Crédito</td>

                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table style="width:98%; padding:0px 3px;" class="row-gris"
                                                        border="0" cellspacing="0" cellpadding="0" align="center">
                                                        <tbody>
                                                            <tr>
                                                                <td style="text-align:left; padding:5px;">Limite de
                                                                    Crédito</td>
                                                                <td style="text-align:right;  padding:5px;">$ {{number_format($limiteCredito,2)}}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table style="width:98%; padding:0px 3px;" class="row-blanca"
                                                        border="0" cellspacing="0" cellpadding="0" align="center">
                                                        <tbody>
                                                            <tr>
                                                                <td style="text-align:left; padding:5px;">Crédito
                                                                    disponible</td>
                                                                <td style="text-align:right;  padding:5px;">$ {{number_format($creditoDisponible,2)}}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table style="width:98%; padding:0px 3px;" class="row-gris"
                                                        border="0" cellspacing="0" cellpadding="0" align="center">
                                                        <tbody>
                                                            <tr>
                                                                <td style="text-align:left; padding:5px;">Saldo Vencido
                                                                </td>
                                                                <td style="text-align:right;  padding:5px;">$ {{ number_format($saldoAnterior,2) }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table style="width:98%; padding:0px 3px;" class="row-blanca"
                                                        border="0" cellspacing="0" cellpadding="0" align="center">
                                                        <tbody>
                                                            <tr>
                                                                <td style="text-align:left; padding:5px;">Saldo al Corte
                                                                </td>
                                                                <td style="text-align:right;  padding:5px;">$ {{ number_format($saldoCorte,2) }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>


                                        </tbody>
                                    </table>
                                </td>
                            </tr>



                        </tbody>
                    </table>

                </td>
            </tr>


            <tr>
                <td style="padding:0px 10px; width:100%;">
                    <p style="border-top:1px solid #28a745;"><br></p>
                </td>
            </tr>
            <tr>
                <td>
                    <table style="width:700px; margin-top:0px;" cellspacing="0" cellpadding="0" border="0"
                        align="center">
                        <tbody>
                            <tr>
                                <td style="padding:0px 10px; width:330px;">

                                    <table style="width:100%;" cellspacing="0" cellpadding="0" align="center">
                                        <tbody>
                                            <tr>
                                                <td>

                                                    <table style="width:98%; padding:5px; font-size:14px;"
                                                        class="row-verde2 text-center" border="0" cellspacing="0"
                                                        cellpadding="0" align="center">
                                                        <tbody>
                                                            <tr>
                                                                <td>Comisiones</td>

                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table style="width:98%; padding:0px 3px;" class="row-blanca"
                                                        cellspacing="0" cellpadding="0" align="center">
                                                        <tbody>
                                                            <tr>
                                                                <td style="text-align:left; padding:5px;">Anualidad</td>
                                                               
                                                                <td style="text-align:right;  padding:5px;">$0</td>-->
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table style="width:98%; padding:0px 3px;" class="row-gris"
                                                        cellspacing="0" cellpadding="0" align="center">
                                                        <tbody>
                                                            <tr>
                                                                <td style="text-align:left; padding:5px;">Cómision cobradas</td>
                                                                <td style="text-align:right; padding:5px;">$ {{ number_format($comisionesCobradas,2)}}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table style="width:98%; padding:0px 3px;" class="row-blanca"
                                                        cellspacing="0" cellpadding="0" align="center">
                                                        <tbody>
                                                            <tr>
                                                                <td style="text-align:left; padding:5px;">Gastos de
                                                                    Cobranza</td>
                                                                <td style="text-align:right; padding:5px;">$0.00</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table style="width:98%; padding:0px 3px;" class="row-gris"
                                                        cellspacing="0" cellpadding="0" align="center">
                                                        <tbody>
                                                            <tr>
                                                                <td style="text-align:left; padding:5px;">Comisión por
                                                                    reposición</td>
                                                                <td style="text-align:right; padding:5px;">$174MXN (IVA Incluido)</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table style="width:98%; padding:0px 3px;" class="row-blanca"
                                                        cellspacing="0" cellpadding="0" align="center">
                                                        <tbody>
                                                            <tr>
                                                                <td style="text-align:left; padding:5px;">Comisión por
                                                                    aclaración <br> improcedente</td>
                                                                <td style="text-align:right; padding:5px;">$200MXN ( Más IVA)</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </td>

                                <td style="padding:0px 10px; width:330px;">

                                    <table style="width:100%;" cellspacing="0" cellpadding="0" align="center">
                                        <tbody>
                                            <tr>
                                                <td>


                                                    <table style="width:98%; padding:5px; font-size:14px;"
                                                        class="row-verde2 text-center" border="0" cellspacing="0"
                                                        cellpadding="0" align="center">
                                                        <tbody>
                                                            <tr>
                                                                <td>Resumen de Saldo</td>

                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table style="width:98%; padding:0px 3px;" class="row-verde"
                                                        cellspacing="0" cellpadding="0" align="center">
                                                        <tbody>
                                                            <tr>
                                                                <td style="text-align:left; padding:5px;">Saldo Inicial
                                                                    del Periodo</td>
                                                                <td style="text-align:right; padding:5px;">$ {{ number_format($saldoAnterior,2) }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table style="width:98%; padding:0px 3px;" class="row-blanca"
                                                        cellspacing="0" cellpadding="0" align="center">
                                                        <tbody>
                                                            <tr>
                                                                <td style="text-align:left; padding:5px;">Pagos / Devoluciones </td>
                                                                <td style="text-align:right; padding:5px;">$ {{  number_format($pagosRembolsosDevoluciones,2) }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table style="width:98%; padding:0px 3px;" class="row-gris"
                                                        cellspacing="0" cellpadding="0" align="center">
                                                        <tbody>
                                                            <tr>
                                                                <td style="text-align:left; padding:5px;">Cargos</td>
                                                                <td style="text-align:right; padding:5px;">$ {{  number_format($comprasDisposiciones,2) }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <!--  <tr>
                                              <td>
                                                    <table style="width:98%; padding:0px 3px;" class="row-blanca"
                                                        cellspacing="0" cellpadding="0" align="center">
                                                        <tbody>
                                                            <tr>
                                                                <td style="text-align:left; padding:5px;">Compras</td>
                                                                <td style="text-align:right; padding:5px;">$[*]%</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>-->
                                            <tr>
                                                <td>
                                                    <table style="width:98%; padding:0px 3px;" class="row-gris"
                                                        cellspacing="0" cellpadding="0" align="center">
                                                        <tbody>
                                                            <tr>
                                                                <td style="text-align:left; padding:5px;">Intereses</td>
                                                                <td style="text-align:right; padding:5px;">$ {{  number_format($interesesCargados,2) }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table style="width:98%; padding:0px 3px;" class="row-blanca"
                                                        cellspacing="0" cellpadding="0" align="center">
                                                        <tbody>
                                                            <tr>
                                                                <td style="text-align:left; padding:5px;">Comisiones
                                                                </td>
                                                                <td style="text-align:right; padding:5px;">$ {{  number_format($comisionesCobradas,2) }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table style="width:98%; padding:0px 3px;" class="row-blanca"
                                                        cellspacing="0" cellpadding="0" align="center">
                                                        <tbody>
                                                            <tr>
                                                                <td style="text-align:left; padding:5px;">Impuestos</td>
                                                                <td style="text-align:right; padding:5px;">$ {{  number_format($iva,2) }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table style="width:98%; padding:0px 3px;" class="row-verde"
                                                        cellspacing="0" cellpadding="0" align="center">
                                                        <tbody>
                                                            <tr>
                                                                <td style="text-align:left; padding:5px;">Saldo nuevo al
                                                                    corte</td>
                                                                <td style="text-align:right; padding:5px;">$ {{  number_format($saldoCorte,2) }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>


                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
            </tr>



        </tbody>
    </table>

    <footer >
        <table id="footer" style="padding:0px; background: #fff; margin-top:0px; margin-bottom:0px; width:700px;" width="700"
            border="0" cellspacing="0" cellpadding="0" align="center">
            <tbody>
                <tr style="vertical-align:center;" >
                    <td style="padding:10px; width:250px;">

                        <p style="font-size:10px; color:#000;">
                            4finance, S.A. de C.V., SOFOM E.N.R. Asturias 39, Col. Insurgentes Mixcoac, C.P. 03920,
                            Benito Juárez, Ciudad de México.
                          
                        </p>
                        
                    </td>
                    <td style="padding:20px 10px; text-align:center;" > 
                     <p style="font-size:10px; color:#000;" class="page">Página </p>


                    </td>

                    <td style="padding:10px;text-align:right;">
                        <img src="{{public_path('img/logo_4finance.svg')}}" height="25" alt="">
                    </td>
                </tr>
            </tbody>
        </table>
    </footer>

    <div class="page-break"></div>



    <table style="width:700px;" cellspacing="0" cellpadding="0" align="center">
        <tbody>

            <tr>
                <td>
                    <table style="width:700px; font-size:12px; margin-top:50px; margin-bottom:50px;" cellspacing="0"
                        cellpadding="0" align="center">
                        <tbody>
                            <tr>
                                <td colspan="4">

                                    <table style="width:98%; padding:5px; font-size:14px;"
                                        class="row-verde2 text-center" border="0" cellspacing="0" cellpadding="0"
                                        align="center">
                                        <tbody>
                                            <tr>
                                                <td>Detalle de Operaciones</td>

                                            </tr>
                                        </tbody>
                                    </table>

                                </td>
                            </tr>
                            <tr>
                                <th style="padding:5px; font-size:14px;" class="text-center">Fecha</th>
                                <th style="padding:5px; font-size:14px;" class="text-center">Concepto</th>
                                <th style="padding:5px; font-size:14px;" class="text-center">Tipo de Cambio</th>
                                <th style="padding:5px; font-size:14px;" class="text-center">
                                    Importe
                                    <table style="text-align:center; width:100%;" >
                                        <tbody >
                                            <tr>
                                                <td style="padding:5px; font-size:12px; text-align:center;" class="text-center">Cargos</td>
                                                <td style="padding:5px; font-size:12px;text-align:center;" class="text-center">Abonos</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </th>
                                
                            </tr>
                            @if ($movimientos!=null)
                            @foreach ($movimientos as $item)
                            <tr>
                                <td style="padding:5px; font-size:12px;" class="text-center">
                                    {{\Carbon\Carbon::parse($item['fechaOperacion'])->format('d/m/Y')}}
                                </td>
                                <td style="padding:5px; font-size:12px;" class="text-center">
                                    {{$item['descripcion']}}
                                </td>
                                <td style="padding:5px; font-size:12px;" class="text-center">
                                    MXN
                                </td>
                                {{--<td style="padding:5px; font-size:14px;" >
                                                $ {{  (int)($item['pesos']) }}</td>--}}

                                <td>
                                    <table class="text-center" colspan="2" style="width:100%;">
                                        <tbody>


                                            <tr>
                                               @switch($item['claveMovimiento'])
                                                   @case('PB46')
                                                   @case('PB48')
                                                   @case('PB49')
                                                   @case('PB34')
                                                   @case('PB35')
                                                   @case('PB43')
                                                   @case('PB78')
                                                   @case('PB117')
                                                   @case('PB121')
                                                   @case('CREDITO13')
                                                   @case('CREDITO14')
                                                   @case('CREDITO28')
                                                   @case('CREDITO29')
                                                   @case('PB51R')
                                                   @case('PB123R')
                                                   @case('PB88R')
                                                   @case('COMANUAL') 
                                                   @case('IVACOMAN')
                                                   @case('INTORD')
                                                   @case('IVAINTORD') 
                                                   @case('INTMOR')
                                                   @case('IVAINTMOR')
                                                    <td style="padding:5px; font-size:12px; text-align:center; width:80px;" colspan="1">${{ round($item['pesos'],2) }} </td>
                                                    <td style="padding:5px; font-size:12px; text-align:center; width:80px;" colspan="1"><br></td>  
                                                       @break
                                                   @case('PT')
                                                   @case('UA') 
                                                   @case('PB46R')  
                                                   @case('PB48R') 
                                                   @case('PB49R')  
                                                   @case('PB34R') 
                                                   @case('PB35R')  
                                                   @case('PB43R')  
                                                   @case('PB78R')  
                                                   @case('PB117R')  
                                                   @case('PB121R')  
                                                   @case('PB80')  
                                                   @case('PB51') 
                                                   @case('PB123') 
                                                   @case('PB88') 
                                                   @case('PARADEVINT')
                                                   @case('CREDITO03')
                                                     <td style="padding:5px; font-size:12px; text-align:center; width:80px;" colspan="1"><br></td>
                                                     <td style="padding:5px; font-size:12px;text-align:center; width:80px;" colspan="1">${{ round($item['pesos'],2)}}</td>
                                                       @break
                                                   @default
                                                   <td style="padding:5px; font-size:12px; text-align:center; width:80px;" colspan="1">{{$item['claveMovimiento']}}</td>
                                                   <td style="padding:5px; font-size:12px; text-align:center; width:80px;" colspan="1">${{ round($item['pesos'],2)}}</td> 
                                               @endswitch 
                                                  
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>                                
                            @endforeach
                             
                            @endif

                        </tbody>
                    </table>
                </td>
            </tr>



            <tr>
                <td>

                    <table style="width:700px;" cellspacing="0" cellpadding="0" align="center">
                        <tbody>
                            <tr>
                                <td>

                                    <p style="border-top:1px solid #28a745;"><br></p>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>


            <tr>
                <td>

                    <table style="width:700px;" cellspacing="0" cellpadding="0" align="center">
                        <tbody>
                            <tr>
                                <td>
                                    <p style="font-size:14px;" class="row-verde2 text-center">Mensajes
                                        Importantes</p>
                                    <p class="text-center" style="font-size:12px; color:#000;">
                                        "Al ser tu crédito de tasa variable, los intereses pueden
                                        aumentar."; <br>
                                        "Incumplir tus obligaciones te puede generar comisiones e
                                        intereses moratorios."; <br>
                                        "Contratar créditos por arriba de tu capacidad de pago puede
                                        afectar tu historial crediticio."; <br>
                                        "Pagar sólo el mínimo aumenta el tiempo de pago y el costo de la
                                        deuda." <br>

                                    </p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>



           {{-- <tr>
                <td>
                    <table style="width:700px; margin-top:50px;" cellspacing="0" cellpadding="0" align="center">
                        <tbody>
                            <tr>
                                <td>

                                    <p style="font-size:14px;" class="row-verde text-center">Formas de
                                        Pago</p>
                                    <p style="font-size:12px; color:#000;padding:5px 10px;">Te invitamos
                                        a efectuar tus pagos en:</p>
                                    <table width="590" cellspacing="10" cellpadding="0" align="center">
                                        <tbody>
                                            <tr>
                                                <td colspan="2">[*]</td>
                                                <td colspan="2">[*]</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">[*]</td>
                                                <td colspan="2">[*]</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">[*]</td>
                                                <td colspan="2">[*]</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </td>
                            </tr>
                        </tbody>
                    </table>

                </td>
            </tr> --}}

        </tbody>
    </table>

    <div class="page-break"></div>
    <table style="padding:0px 0px; background: #fff; margin-top: 30px; margin-bottom: 30px; width:700px;" width="700"
        border="0" cellspacing="0" cellpadding="0" align="center">
        <tbody>
            <tr>
                <td>
                    <table style="width:700px; margin-top:50px; margin-bottom:50px;" cellspacing="0" cellpadding="0"
                        align="center">
                        <tbody>
                            <tr>
                                <td>

                                    <p class="row-verde text-center" style="font-size:14px;">
                                        Recomendaciones</p>

                                    <table style="width:100%;" cellspacing="0" cellpadding="0" align="center">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <p style="font-size: 12px; color:#000;">1. Conserva
                                                        el comprobante de tu operación de pago, para
                                                        futuras aclaraciones.</p>
                                                    <br>
                                                    <p style="font-size: 12px; color:#000;">2. Te
                                                        recomendamos hacer tu pago por el monto exacto
                                                        de tu adeudo, evita pagar saldo de más.</p>
                                                </td>
                                                <td>
                                                    <p style="font-size: 12px; color:#000;">3. Realiza
                                                        tus pagos antes de tu fecha límite de pago</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </td>
                            </tr>
                        </tbody>
                    </table>

                </td>
            </tr>


            <tr>
                <td>

                    <table style="width:700px;  margin-bottom:0px;" cellspacing="0" cellpadding="0" align="center">
                        <tbody>
                            <tr>
                                <td>

                                    <p style="font-size:14px;" class="row-verde text-center">Línea Vivus
                                        Card</p>

                                    <p style="font-size:12px; color:#000;">Vivus Card cuenta con el
                                        Centro de Atención Telefónica y está a tu disposición de lunes a
                                        viernes de 8:00 a 17:00 horas o los sábados de 08:00 a 14:00
                                        horas para apoyarte con cualquier asunto relacionado con tu
                                        tarjeta como:</p>
                                    <ul style="font-size:12px; color:#000;">
                                        <li>Aclaraciones </li>
                                        <li>Reporte por robo o extravío</li>
                                        <li>Consulta de saldos y movimientos</li>

                                    </ul>
                                    <p style="font-size:12px; color:#000;">Es importante mencionar que,
                                        cuentas con 90 días naturales a partir de tu fecha de corte para
                                        reportar un cargo que no reconozcas en tu estado de cuenta.</p>
                                    <br>
                                    <p style="font-size:12px; color:#000;">4FINANCE, S.A. de C.V. SOFOM
                                        E.N.R. recibe las consultas, reclamaciones o aclaraciones, en su
                                        Unidad Especializada de Atención a Usuarios, ubicada en Asturias
                                        39, Col. Insurgentes Mixcoac, C.P. 03920, Benito Juárez, Ciudad
                                        de México, Alcaldía: Benito Juarez y por correo electrónico <a href="mailto:info@vivuscard.com.mx">info@vivuscard.com.mx</a>
                                        o al teléfono <a href="tel:015590147777">(01 55) 9014 7777</a>. En el caso de no obtener una
                                        respuesta satisfactoria, podrá acudir a la Comisión Nacional
                                        para la Protección y Defensa de los Usuarios de Servicios
                                        Financieros CONDUSEF al teléfono 55 53 400 999 a nivel nacional
                                        o bien consultar su página electrónica en
                                        <a href="https://www.condusef.gob.mx">https://www.condusef.gob.mx</a></p>
                                </td>
                            </tr>

                            <tr>
                                <td>

                                    <table
                                        style="border:1px solid #ccc; width:650px; margin-top:30px; margin-bottom:30px; padding:10px;"
                                        colspan="4" cellspacing="0" cellpadding="10" align="center">
                                        <tbody>
                                            <tr>
                                                <td colspan="1" style="padding:5px;">
                                                    <p style="font-size: 12px; color:#000;">
                                                        <strong>RFC</strong>
                                                    </p>
                                                </td>
                                                <td colspan="3" style="padding:5px;">
                                                    <p style="font-size: 12px; color:#000;">Registro
                                                        Federal de Contribuyentes </p>
                                                </td>
                                                <td colspan="1" style="padding:5px;">
                                                    <p style="font-size: 12px; color:#000;">
                                                        <strong>MSI</strong>
                                                    </p>
                                                </td>
                                                <td colspan="3" style="padding:5px;">
                                                    <p style="font-size: 12px; color:#000;">Meses sin
                                                        Interéses </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="1" style="padding:5px;">
                                                    <p style="font-size: 12px; color:#000;">
                                                        <strong>MXN</strong>
                                                    </p>
                                                </td>
                                                <td colspan="3" style="padding:5px;">
                                                    <p style="font-size: 12px; color:#000;">Moneda
                                                        Nacional </p>
                                                </td>
                                                <td colspan="1" style="padding:5px;">
                                                    <p style="font-size: 12px; color:#000;">
                                                        <strong>CONDV </strong>
                                                    </p>
                                                </td>
                                                <td colspan="3" style="padding:5px;">
                                                    <p style="font-size: 12px; color:#000;">Conveniencia
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="1" style="padding:5px;">
                                                    <p style="font-size: 12px; color:#000;">
                                                        <strong>IVA</strong>
                                                    </p>
                                                </td>
                                                <td colspan="3" style="padding:5px;">
                                                    <p style="font-size: 12px; color:#000;">Impuesto al
                                                        Valor Agregado </p>
                                                </td>
                                                <td colspan="1" style="padding:5px;">
                                                    <p style="font-size: 12px; color:#000;"><strong>CFDI
                                                        </strong></p>
                                                </td>
                                                <td colspan="3" style="padding:5px;">
                                                    <p style="font-size: 12px; color:#000;">Comprobante
                                                        Fiscal Digital</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="1" style="padding:5px;">
                                                    <p style="font-size: 12px; color:#000;">
                                                        <strong>SAT</strong>
                                                    </p>
                                                </td>
                                                <td colspan="3" style="padding:5px;">
                                                    <p style="font-size: 12px; color:#000;">Servicio de
                                                        Administración Tributaria</p>
                                                </td>
                                                <td colspan="1" style="padding:5px;">
                                                    <p style="font-size: 12px; color:#000;"><strong>CR
                                                        </strong></p>
                                                </td>
                                                <td colspan="3" style="padding:5px;">
                                                    <p style="font-size: 12px; color:#000;">Abono</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>

            <tr>
                <td>

                    <p style="border-top:1px solid #28a745;"><br></p>

                </td>
            </tr>

            <tr>
                <td>

                    <table style="width:700px;" cellspacing="0" cellpadding="0" align="center">
                        <tbody>

                            <tr>
                                <td style="padding:0px 10px; width:330px;">
                                    <p style="font-size: 12px; color:#000;">
                                        <strong> PAGO MÍNIMO</strong> Importe de pago mínimo, más
                                        sobregiro y saldos vencidos que presenta tu cuenta.
                                    </p>
                                    <br>
                                    <p style="font-size: 12px; color:#000;">
                                        <strong> PAGO PARA NO GENERAR INTERESES</strong> Importe del
                                        pago mínimo, más la parte sin intereses.
                                    </p>
                                </td>
                                <td style="padding:0px 10px; width:330px;">
                                    <p style="font-size: 12px; color:#000;">
                                        El aviso de privacidad puede ser verificado en
                                        <br> <br>
                                        www.vivuscard.com.mx

                                    </p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>

        </tbody>
    </table>
{{----esto si va 
    <div class="page-break"></div>

    <table style="padding:10px; background: #fff; margin-top: 30px; margin-bottom: 30px; width:700px;" width="700"
        border="1" bordercolor="#fff" cellspacing="0" cellpadding="0" align="center">

        <tbody>
            <tr class="row-gris">
                <td style="padding:10px;font-size:11px;">Versión CFDI</td>
                <td style="padding:10px;font-size:11px;">No. de serie del certificado SAT</td>
                <td style="padding:10px;font-size:11px;">RFC del receptor</td>
                <td style="padding:10px;font-size:11px;">Método de Pago</td>
            </tr>
            <tr>
                <td style="padding:10px; font-size:10px;">4</td>
                <td style="padding:10px;font-size:10px;">{{$SatCertNumber}}</td>
                <td style="padding:10px;font-size:10px;">{{$rfc}} XA XX010101000</td>
                <td style="padding:10px;font-size:10px;">PUE - Pago en una sola exhibición</td>
            </tr>
            <tr class="row-gris">
                <td style="padding:10px;font-size:11px;">RFC de la emisión </td>
                <td style="padding:10px;font-size:11px;">RFC del proveedor de certificación</td>
                <td style="padding:10px;font-size:11px;">Moneda</td>
                <td style="padding:10px;font-size:11px;">Forma de Pago</td>
            </tr>
            <tr>
                <td style="padding:10px;font-size:10px;">FIN1507223Z8</td>
                <td style="padding:10px;font-size:10px;">{{$rfc}} XA XX010101000</td>
                <td style="padding:10px;font-size:10px;">MXN</td>
                <td style="padding:10px;font-size:10px;">03 - Transferencia electrónica de fondos</td>
            </tr>

            <tr class="row-gris">
                <td style="padding:10px;font-size:11px;">Régimen Fiscal </td>
                <td style="padding:10px;font-size:11px;">Lugar de emisión </td>
                <td style="padding:10px;font-size:11px;">Unidad de Medida</td>
                <td style="padding:10px;font-size:11px;">Tipo de Comprobante</td>
            </tr>
            <tr>
                <td style="padding:10px;font-size:10px;">601-General de Ley Personas Morales</td>
                <td style="padding:10px;font-size:10px;">Asturias 39 COL. Insurgentes Mixcoac, C.P. 03920, Benito Juarez, Ciudad de Mexico, México</td>
                <td style="padding:10px;font-size:10px;">E48-Unidad de Servicio</td>
                <td style="padding:10px;font-size:10px;"><br></td>
            </tr>
            <tr class="row-gris">
                <td style="padding:10px;font-size:11px;">Folio Fiscal </td>
                <td style="padding:10px;font-size:11px;">Fecha y Hora de Certificación </td>
                <td style="padding:10px;font-size:11px;">Clave de Producto/Servicio</td>
                <td style="padding:10px;font-size:11px;">Uso de CFDI</td>
            </tr>
            <tr>
                <td style="padding:10px;font-size:10px;">{{ $Uuid}}</td>
                <td style="padding:10px;font-size:10px;">{{$Date}} </td>
                <td style="padding:10px;font-size:10px;">84121500</td>
                <td style="padding:10px;font-size:10px;">P01 - Por definir</td>
            </tr>


        </tbody>
    </table>
--}}

{{-- no va
    <table
        style="font-size:12px; border-color:#000; padding:10px; background: #fff; margin-top:0px; margin-bottom: 30px; width:700px;"
        width="700" border="1" cellspacing="0" cellpadding="0" align="center">
        <tbody>
            <tr>
                <th style="padding:10px;">Cantidad</th>
                <th style="padding:10px;">Unidad de Medida</th>
                <th style="padding:10px;">Descripción del servicio</th>
                <th style="padding:10px;">Importe</th>
                <th style="padding:10px;">Descuentos o Bonificaciones</th>
                <th style="padding:10px;">Tasa</th>
                <th style="padding:10px;">IVA</th>
                <th style="padding:10px;">Total</th>
            </tr>
            <tr>
                <td style="padding:10px;font-size:12px;"><br></td>
                <td style="padding:10px;font-size:12px;"><br></td>
                <td style="padding:10px;font-size:12px;">Servicios de facturación</td>
                <td style="padding:10px;font-size:12px;"><br></td>
                <td style="padding:10px;font-size:12px;"><br></td>
                <td style="padding:10px;font-size:12px;"><br></td>
                <td style="padding:10px;font-size:12px;">$ {{$ivaTotal}}</td>
                <td style="padding:10px;font-size:12px;">$ {{$saldoTotal}}</td>
            </tr>
        </tbody>
    </table>
--}}
{{-- esta si va
    <table
        style="font-size:12px; border-color:#000; padding:10px; background: #fff; margin-top:0px; margin-bottom: 0px; width:700px;"
        width="700" border="0" cellspacing="0" cellpadding="0" align="center">
        <tbody>
            <tr>
                <td>

                    <p style="border-top:1px solid #28a745;"><br></p>

                </td>
            </tr>
        </tbody>
    </table>

    <table
        style="font-size:12px; border-color:#000; padding:10px; background: #fff; margin-top:0px; margin-bottom: 30px; width:700px;"
        width="700" border="0" cellspacing="0" cellpadding="0" align="center" col='2'>
        <tbody>
            <tr>
                <td style="padding:0px 10px 10px 10px; width:150px; " width="150" col='1'>

                    <img src="{{ $QR }}" style="margin:0px 15px 10px 15px; width:130px;" />
                    
                    <br>
                    <p style="font-size:10px; color:#000;">Este documento es una
                        representación impresa
                        de un CFDI
                    </p>
                </td>
                <td col='1' style=" width:450px;" width="450" >

                    <table style="font-size:12px; color:#000; font-size:9px; width:450px;" width="450" border="1" cellspacing="0" cellpadding="0" align="center">
                        <tbody>
                            <tr  >
                                <td style="padding:10px; border:1px solid #000;  overflow-wrap: break-word; width:450px; ">
                                <p style=" color:#000; font-size:11px; " >Sello digital del CFDI:</p>
                                <div style="color:#000; font-size:9px; width:100%; overflow-wrap: break-word; width:450px;" > {{ $CfdiSign }}</div> 
                                </td>
                            </tr>
                            <tr>
                                <td style="padding:10px; border:1px solid #000;  overflow-wrap: break-word; width:450px; ">
                                <p style="color:#000; font-size:11px;" >Sello digital del SAT:</p>
                                <div style="color:#000; font-size:9px; width:100%; overflow-wrap: break-word; width:450px;" > {{$SatSign}}</div> 
                                </td>
                            </tr>
                            <tr>
                                <td style="padding:10px; border:1px solid #000;  overflow-wrap: break-word; width:450px;">
                                <p style="color:#000; font-size:11px;" > Cadena Original del complemento de certificación digital del SAT:</p>
                                <div style="color:#000; font-size:9px; width:100%; overflow-wrap: break-word; width:450px;" >  {{$OriginalString}}</div> 
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>

--}}

    <!-- no va
                </td>
            </tr>
        </tbody>
    </table>-->



</body>

</html>
