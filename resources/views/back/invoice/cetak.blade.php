<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{$judul}}</title>

        {{-- <link href="{{ asset('front/css/styles.css') }}" rel="stylesheet" type="text/css" /> --}}
        <!--begin::Global Theme Styles -->
        {{-- <link href="{{ asset('assets/partners/base/partners.bundle.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/demo/default/base/style.bundle.css') }}" rel="stylesheet" type="text/css" /> --}}
        <!--end::Global Theme Styles -->
        {{-- <link rel="stylesheet" href="https://code.jquery.com/jquery-3.3.1.js"> --}}
        {{-- <link href="{{ asset('assets/partners/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
        type="text/css" /> --}}
        {{-- https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css --}}
        {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.css"/> --}}
        {{-- <link href="{{asset('assets/partners/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet"
        type="text/css" /> --}}
        {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css}}">
        {{-- <link href="{{ asset('assets/partners/base/partners.bundle.css') }}" rel="stylesheet" type="text/css" /> --}}
        {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> --}}
    
        {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script> --}}
    
        {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> --}}
        {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/usm/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> --}}
        {{-- <style type="text/css">
            p{
              font-family: sans-serif;
              line-height: 1.75em;
              font-size:   1rem ;
            }
            i { 
              font-family: sans;
              color: orange;
            }
          </style> --}}
        <style>
            body {
                font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
                color: #333;
                text-align: left;
                font-size: 8pt;
                margin: 0;
                margin-top: 5em;
                margin-bottom: 7em;
            }
    
            .page-break {
                page-break-after: always;
            }
    
            .container {
                margin: 0 auto;
                margin-top: 100px;
                margin-bottom: 50px;
                padding: 40px;
                width: 960px;
                height: auto;
                background-color: #fff;
            }

            .row {
                padding: 12px;
                /* margin : 15px; */
            }
    
            .caption {
                font-size: 28px;
                margin-bottom: 15px;
            }
    
            .separator {
                margin-top: 30px;
            }
    
            #table {
                /* padding-top: 3rem; */
                /* border: 1px solid #333; */
                border-collapse: collapse;
                margin: 0 auto;
                width: 100%;
                /* margin-top: 30px; */
            }
            /* .row {
                padding: 40px;
                margin: 10;
                width: 100%;
            }
             */
             
            #table td, #table th {
            border: 1px solid #ddd;
            padding: 12px;
            }

                        
            #table tr:nth-child(even){background-color: #f2f2f2;}

            #table tr:hover {background-color: #ddd;}

            #table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
            }

            thead {
                background-color: rgb(225, 224, 219);
                color: rgb(0, 0, 0);
                font-size: 12px;
                text-transform: uppercase;
                letter-spacing: 2%;
                /* margin: 10px;
                padding: 14px; */
            }
    
            header {
                position: fixed;
                top: 0cm;
                left: 0cm;
                right: 0cm;
                height: 3cm;
            }
    
            footer {
                position: fixed;
                bottom: 0cm;
                left: 0cm;
                right: 0cm;
                height: 2cm;
            }
    
            .p {
                text-align: "justify";
                margin:15px;
            }

            .img {
                /* width: 100px; */
                height: 30px;
                margin-left: 15px;
            }
         
    
        </style>
    
    </head>
    
<body>
    <div id="container">
    
    <div class="row">
        {{-- <h1 style="text-align: center"><strong style="text-transform: uppercase;">{{$judul}}</strong></h1> --}}
        
        {{-- <header> --}}
            {{-- <p style="text-align: right; font-size: 8pt"> --}}
                {{-- <img src="" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt=""> --}}
                <img src="{{ public_path('data_file/'.$generals->image) }}" class="img" alt="">
            {{-- </p> --}}
        {{-- </header> --}}
        <hr>
        <div class="separator">
            <table class="table">
                <tbody>
                    <tr>
                        <td style="vertical-align : top;text-align:left;">
                            <strong style="text-transform: uppercase; font-size:14px">Invoice : <br> </strong>
                            <strong style="text-transform: uppercase; font-size:11px">   {{ $invoices->no_invoice }}  </strong>  <br> 
                            <span> Tanggal : {{ date("d/m/Y", strtotime($invoices->tgl_invoice)) }} </span> <br>
                            <span>No PO : {{ $invoices->no_po }}</span>
                        </td>
                        <td style="vertical-align : top;text-align:left;">
                            <strong style="text-transform: uppercase; font-size:14px">From :</strong> <br>
                            {{-- <hr> --}}
                            <strong style="text-transform: uppercase"> {{ $generals->title }}</strong><br>
                            {{ $generals->alamat }}<br>
                            {{ $generals->email }}<br>
                            {{ $generals->phone }}
                        </td>
                        {{-- <td>partner : </td> --}}
                        <td  style="vertical-align : top;text-align:left;">
                            <strong style="text-transform: uppercase; font-size:14px">To :</strong> <br>
                        {{-- <hr> --}}
                            <strong style="text-transform: uppercase"> {{ $invoices->partner->nama_perusahaan }}, {{ $invoices->partner->badan->title }} </strong><br>
                            {{ $invoices->partner->alamat }} <br>
                            {{ $invoices->partner->email }}<br>
                            {{ $invoices->partner->telp }}<br>
                            {{-- {{ $invoices->partner->bank->name }} <br>
                            {{ $invoices->partner->no_rek }} <br>
                            {{ $invoices->partner->pemilik_rek }} --}}
                        </td>
                        {{-- <td width="50px"></td> --}}
                    
                    </tr>
                </tbody>
               
                   
                  
              
                </table>
             
                <div class="separator">      
                <table class="table">
                <thead>
                    <tr>
                        <th width="10px" style="vertical-align : middle;text-align:center; ">#</th>
                        <th width="400px" colspan="4" style="vertical-align : middle;text-align:center;text-transform: uppercase">Deskripsi</th>
                        <th width="10px" style="vertical-align : middle;text-align:center;text-transform: uppercase ">Qty</th>
                        <th width="140px" style="vertical-align : middle;text-align:center;text-transform: uppercase">Harga</th>
                        <th width="140px" style="vertical-align : middle;text-align:center;text-transform: uppercase">Jumlah</th>
                    </tr>
                </thead>
                @php
                $no = 1 ;
                $subtotal = 0;
                $subjumlah = 0;
                $total = 0;
                $ppn = 0;
                $diskon = 0;
                @endphp
                <tbody>
                    @foreach ($invoices->invoicedetail as $item)
                    @php
                    $jumlah = $item->qty*$item->harga ;
                    $subjumlah += $jumlah ;
                    $subtotal = $subjumlah - $invoices->diskon;
                    // $ppn = $subtotal * 10/100;
                    $total = $subtotal + $invoices->lainnya ;

                    @endphp
                    <tr>
                        <td style="vertical-align : middle;text-align:center;">{{$no++}}</td>
                        <td colspan="4" style="vertical-align : middle;text-align:left;">
                            {{ $item->deskripsi }}</td>
                        <td style="vertical-align : middle;text-align:center;">{{ $item->qty }}</td>
                        <td style="vertical-align : middle;text-align:right;">{{ number_format($item->harga)  }}</td>
                        <td style="vertical-align : middle;text-align:right;">{{ number_format($jumlah)  }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="7" style="vertical-align : middle;text-align:right;">Sub Jumlah</td>
                        <td style="vertical-align : middle;text-align:right;">{{ number_format($subjumlah) }}</td>
                    </tr>
                    @if($invoices->diskon)
                    <tr>
                        <td colspan="7" style="vertical-align : middle;text-align:right;">Diskon</td>
                        <td style="vertical-align : middle;text-align:right;">{{ number_format($invoices->diskon)  }}</td>
                    </tr>
                    <tr>
                        <td colspan="7" style="vertical-align : middle;text-align:right;">Sub Total</td>
                        <td style="vertical-align : middle;text-align:right;">{{ number_format($subtotal) }}</td>
                    </tr>
                    @endif
                   
                    {{-- @if($invoices->biaya_kirim)
                    <tr>                        
                        <td colspan="7" style="vertical-align : middle;text-align:right;">Biaya Kirim</td>
                        <td style="vertical-align : middle;text-align:right;">{{ $invoices->biaya_kirim) }}
                        </td>
                    </tr>
                    @endif --}}
                    @if($invoices->lainnya)
                    <tr>
                        <td>Lainnya</td>
                        <td style="vertical-align : middle;text-align:right;">{{ number_format($invoices->lainnya)  }}
                        </td>
                    </tr>
                    @endif
                    <tr>
                        <td colspan="7" style="vertical-align : middle;text-align:right;"><strong>TOTAL</strong> </td>
                        <td style="vertical-align : middle;text-align:right;">
                            <strong>{{ number_format($total)  }}</strong></td>
                    </tr>
                    {{-- <tr>
                        <td colspan="8" style="vertical-align : middle;text-align:left;"><strong>Terbilang :</strong>
                            <br><span style="text-transform: capitalize"><i>
                                    {{ terbilang($invoices->total) . " Rupiah" }}</span> </i> </td>
                        
                    </tr> --}}
                 
                    {{-- <tr>
                        <td colspan="6" style="vertical-align : middle;text-align:left;">
                            Catatan : {{ $invoices->deskripsi }}
                    </td>
                    </tr> --}}
                </tfoot>
            </table>
        </div>
        <div class="separator">  
            <table class="table">
                <tbody>
                        {{-- <tr>
                            <td>Terbilang : <i>{{ terbilang($invoices->total) . " rupiah" }}</i> </td>                          
                        </tr>    --}}
                        <tr>
                            <td>Catatan : <br>
                                @if ($invoices->catatan)
                                <span> - {{ $invoices->catatan }}</span> <br>
                                @endif
                           <span> - Harga exclude ppn</span> <br>
                            <span> - Pembayaran dapat dilakukan melalui transfer ke rekening berikut : </span>  <br>
                                @foreach ($accountbanks as $item)
                                  * {{ $item->bank->nama_bank }}
                                     {{ $item->no_rek }} 
                                        {{ $item->pemilik }}   <br>  
                                @endforeach
                            </td>                          
                        </tr>                       
                </tbody>
            </table>
                {{-- <div class="row">
                    <span>Terbilang : {{ terbilang($invoices->total) . "rupiah" }}</span> <br>
                <span>Catatan : {{ $invoices->deskripsi }}</span>
            </div> --}}
    </div>
    </div>

    {{-- <hr> --}}

  
            
            {{-- <div class="col-md-6">
                <div class="row">
                <div class="m-stack__demo-item">
                    {{ $invoices->partner->namaperusahaan }}, {{ $invoices->partner->badanusaha->kode }}
                    <br><br><br><br><br>
                    ________________________
                </div>
            </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                <div class=" m-stack__demo-item">
                   
                    {{ $invoices->preference->nama_perusahaan }}
                    <br><br><br><br><br>
                    {{ $invoices->bod->jabatan }}
                </div>
            </div>
            </div> --}}
         

         {{-- <div class="row">
             <p> <span style="text-transform:underline"> Terbilang : <i>{{ terbilang($invoices->total) . " rupiah" }}</i> </span></p>
             <p>Catatan : <br>
                {{ $invoices->catatan }}
            </p>
           <img class="img" src="{{ public_path('data_file/'.$generals->image) }}">
            
    </div> --}}
    </div>
    </div>



    </div>


    <script src="{{ asset('back/assets/partners/base/partners.bundle.js') }}" type="text/javascript"></script>
    <script src="{{ asset('back/assets/demo/default/base/scripts.bundle.js') }}" type="text/javascript"></script>
    <!--end::Global Theme Bundle -->

</body>
</html>