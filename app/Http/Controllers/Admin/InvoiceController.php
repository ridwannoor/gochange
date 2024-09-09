<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\General;
use App\Models\Accountbank;
use App\Models\Invoice;
use App\Models\Badan;
use App\Models\Partner;
use App\Models\Ppn;
use App\Models\Invoiceheader;
use App\Models\Invoicedetail;
use Session;
use PDF;
use Carbon\Carbon;
    use Maatwebsite\Excel\Concerns\FromCollection;
    use Maatwebsite\Excel\Concerns\ToModel;
    use Maatwebsite\Excel\Concerns\WithHeadingRow;

class InvoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function GenerateNumber(){
        $AWAL = 'ATH-INV';
        // karna array dimulai dari 0 maka kita tambah di awal data kosong
        // bisa juga mulai dari "1"=>"I"
        $bulanRomawi = array("", "I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
        $noUrutAkhir = Invoiceheader::WhereYear('created_at', Carbon::now()->year)->count();
        $no = 1;
        if($noUrutAkhir) {
            $noUrutAkhir = sprintf("%03s", abs($noUrutAkhir + 1)). '/' . $AWAL .'/' . $bulanRomawi[date('n')] .'/' . date('Y');
        }
        else {
            $noUrutAkhir = sprintf("%03s", $no). '/' . $AWAL .'/' . $bulanRomawi[date('n')] .'/' . date('Y');
        }
        
        return $noUrutAkhir;
    }

    public function index()
    {
        $judul = 'Invoice';
        $generals = General::find(1);
        $invoices = Invoiceheader::with('ppn')->get();
        $partners = Partner::with('badan')->get();
        return view('back.invoice.index', compact('judul', 'generals', 'invoices', 'partners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $noUrutAkhir = $this->GenerateNumber(); 
        $judul = 'Invoice Create';
        $ppns = Ppn::all();
        $generals = General::find(1);
        $badans = Badan::all();
        $partners = Partner::with('badan')->get();
        return view('back.invoice.create', compact('judul', 'generals', 'ppns', 'badans', 'partners', 'noUrutAkhir'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->no_invoice ; 
        $spons = Invoiceheader::where('no_invoice',$name)->first();

        if ($spons) {           
            return redirect('/admin/invoice/create')->with('message','Data Sudah Ada');
            
        }
        else{          
                $invoices = new Invoiceheader();
                $invoices->no_invoice = $request->no_invoice;
                $invoices->tgl_invoice = $request->tgl_invoice;
                $invoices->no_po = $request->no_po;
                $invoices->partner_id = $request->partner_id;
              
                $invoices->perihal = $request->perihal;     
                $invoices->diskon = $request->diskon;
                // $invoices->ppn = $request->ppn; 
                $invoices->lainnya = $request->lainnya;         
                $invoices->save();  
                
                if ($invoices) {
                    foreach ($request->deskripsi as $key => $v) {
                            $data =Invoicedetail::Insert( array(
                                'invoiceheader_id'=>$invoices->id,
                                'deskripsi'=>$v,
                                'qty'=>$request->qty [$key],
                                'harga'=>$request->harga [$key],
                                'ppn_id'=>$request->ppn_id [$key]
                            ));
                        }

                return redirect()->route('invoice.detail', ['id' => $invoices->id]);  
                }
        }   
    }

    public function detail($id)
    {
       
        $judul = "Invoice Detail";
        $invoices = Invoiceheader::with('invoicedetail')->find($id);
        $partners = Partner::with('badan')->get();
        $generals = General::first();
        return view('back.invoice.createdetail', compact('judul', 'invoices', 'partners', 'generals'));
    
    }

    public function storedetail(Request $request)
    {
               
                $invoices = Invoiceheader::where('id','=', $request->id)->first();
                $invoices->no_invoice = $request->no_invoice;
                $invoices->tgl_invoice = $request->tgl_invoice;
                $invoices->no_po = $request->no_po;
                $invoices->partner_id = $request->partner_id;              
                $invoices->perihal = $request->perihal;     
                $invoices->diskon = $request->diskon;
                // $invoices->ppn = $request->ppn; 
                $invoices->lainnya = $request->lainnya;         
                $invoices->save();  
                
                $id = $request->id;
                $dodet = $invoices::with(['invoicedetail'])->find($id);        
                $dodet->update($request->toArray());
                $dodet->invoicedetail()->delete();
                // $dodet->pofiles()->delete();

                if ($invoices) {
                    foreach ($request->deskripsi as $key => $v) {
                            $data =Invoicedetail::Insert( array(
                                'invoiceheader_id'=>$invoices->id,
                                'deskripsi'=>$v,
                                'qty'=>$request->qty [$key],
                                'harga'=>$request->harga [$key],
                                'ppn_id'=>$request->ppn_id [$key]
                            ));
                        }

                return redirect('/admin/invoice')->with('message', 'data berhasil di simpan');  
                }
       
    }

    public function updatedetail(Request $request)
    {
               
                $invoices = Invoiceheader::where('id','=', $request->id)->first();
                $invoices->no_invoice = $request->no_invoice;
                $invoices->tgl_invoice = $request->tgl_invoice;
                $invoices->no_po = $request->no_po;
                $invoices->partner_id = $request->partner_id;
                $invoices->perihal = $request->perihal;     
                $invoices->diskon = $request->diskon;
              
                // $invoices->ppn = $request->ppn; 
                $invoices->lainnya = $request->lainnya;         
                $invoices->save();  
                
                $id = $request->id;
                $dodet = $invoices::with(['invoicedetail'])->find($id);        
                $dodet->update($request->toArray());
                $dodet->invoicedetail()->delete();
                // $dodet->pofiles()->delete();

                if ($invoices) {
                    foreach ($request->deskripsi as $key => $v) {
                            $data =Invoicedetail::Insert( array(
                                'invoiceheader_id'=>$invoices->id,
                                'deskripsi'=>$v,
                                'qty'=>$request->qty [$key],
                                'harga'=>$request->harga [$key],
                                'ppn_id'=>$request->ppn_id [$key]
                            ));
                        }

                return redirect('/admin/invoice')->with('message', 'data berhasil di update');  
                }
       
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $judul = 'Invoice Show';
        $generals = General::first();
        $invoices = Invoiceheader::find($id);
        $badans = Badan::all();
        return view('back.invoice.show', compact('judul', 'generals', 'badans', 'invoices'));//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $judul = 'Invoice Edit';
        $generals = General::find(1);
        $invoices = Invoiceheader::find($id);
        $partners = Partner::with('badan')->get();
        return view('back.invoice.edit', compact('judul', 'generals', 'partners', 'invoices'));
    }

    public function editdetail($id)
    {
       
        $judul = "Invoice Detail";
        $invoices = Invoiceheader::with('invoicedetail')->find($id);
        $partners = Partner::with('badan')->get();
        $generals = General::first();
        return view('back.invoice.editdetail', compact('judul', 'invoices', 'partners', 'generals'));
    
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $invoices = Invoiceheader::where('id','=', $request->id)->first();
        $invoices->no_invoice = $request->no_invoice;
        $invoices->tgl_invoice = $request->tgl_invoice;
        $invoices->no_po = $request->no_po;
        $invoices->partner_id = $request->partner_id;
        $invoices->perihal = $request->perihal;     
      
        $invoices->diskon = $request->diskon;
        // $invoices->ppn = $request->ppn; 
        $invoices->lainnya = $request->lainnya;         
        $invoices->save();  
        
        $id = $request->id;
        $dodet = $invoices::with(['invoicedetail'])->find($id);        
        $dodet->update($request->toArray());
        $dodet->invoicedetail()->delete();
        // $dodet->pofiles()->delete();

        if ($invoices) {
            foreach ($request->deskripsi as $key => $v) {
                    $data =Invoicedetail::Insert( array(
                        'invoiceheader_id'=>$invoices->id,
                        'deskripsi'=>$v,
                        'qty'=>$request->qty [$key],
                        'harga'=>$request->harga [$key],
                        'ppn_id'=>$request->ppn_id [$key]
                    ));
                }

                return redirect()->route('invoice.detail', ['id' => $invoices->id]);  
        }

       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Invoiceheader::find($id);
        $data->invoicedetail()->delete();
        $data->delete($data);
        return redirect('/admin/invoice')->with('success', 'Data Berhasil Dihapus');
    }

    public function publish($id)
    {       
        $invoices = Invoiceheader::find($id);
        $invoices->status = !$invoices->status;
        $invoices->save();  
        return redirect('/admin/invoice');
    }

    public function cetak($id)
    {
        $accountbanks = Accountbank::all();
        $invoices = Invoiceheader::with('invoicedetail')->find($id);
        $partners = Partner::with('badan')->get();
        $judul = 'Invoice';
        $generals = General::first();
        $pdf = PDF::loadView('back.invoice.cetak', compact('generals', 'invoices', 'judul', 'partners','accountbanks'));
        return $pdf->stream();  
    }
}
