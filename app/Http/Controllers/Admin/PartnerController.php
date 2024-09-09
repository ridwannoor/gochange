<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\General;
use App\Models\Partner;
use App\Models\Badan;

class PartnerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $judul = 'Partner';
        $generals = General::find(1);
        $partners = Partner::all();
        return view('back.partner.index', compact('judul', 'generals', 'partners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $judul = 'Partner Create';
        $generals = General::find(1);
        $badans = Badan::all();
        return view('back.partner.create', compact('judul', 'generals', 'badans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->nama_perusahaan ; 
        $spons = Partner::where('nama_perusahaan',$name)->first();

        if ($spons) {           
            return redirect('/admin/partner/create')->with('message','Data Sudah Ada');
            
        }
        else{          
                $data = new Partner();
                $data->badan_id = $request->badan_id;
                $data->nama_perusahaan = $request->nama_perusahaan;
                $data->alamat = $request->alamat;
                $data->alamat_domisili = $request->alamat_domisili;
                $data->telp = $request->telp;
                $data->kontak_person = $request->kontak_person;          
                $data->phone = $request->phone;
                $data->npwp = $request->npwp;  
                $data->email = $request->email;  
                $data->save();           
                return redirect('/admin/partner')->with('success','Data Berhasil di Simpan');
           
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
        $judul = 'Partner Show';
        $generals = General::find(1);
        $partners = Partner::find($id);
        $badans = Badan::all();
        return view('back.partner.show', compact('judul', 'generals', 'badans', 'partners'));//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $judul = 'Partner Edit';
        $generals = General::find(1);
        $partners = Partner::find($id);
        $badans = Badan::all();
        return view('back.partner.edit', compact('judul', 'generals', 'badans', 'partners'));
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
        // if (!$file = $request->file('image')) {
            $data = Partner::where('id','=', $request->id)->first();
            $data->badan_id = $request->badan_id;
            $data->nama_perusahaan = $request->nama_perusahaan;
            $data->alamat = $request->alamat;
            $data->alamat_domisili = $request->alamat_domisili;
            $data->telp = $request->telp;
            $data->kontak_person = $request->kontak_person;          
            $data->phone = $request->phone;
            $data->npwp = $request->npwp;  
            $data->email = $request->email;  
            $data->save();      
            return redirect('/admin/partner')->with('success','Data Berhasil di Update');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Partner::find($id);
        $data->delete($data);
        return redirect('/admin/partner')->with('success', 'Data Berhasil Dihapus');
    }

    public function publish($id)
    {       
        $partners = Partner::find($id);
        $partners->is_published = !$partners->is_published;
        $partners->save();  
        return redirect('/admin/partner');
    }
}
