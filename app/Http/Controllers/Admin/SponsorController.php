<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\General;
use App\Models\Sponsor;

class SponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $judul = 'Sponsor';
        $generals = General::find(1);
        $sponsors = Sponsor::all();
        return view('back.sponsor.index', compact('judul', 'generals', 'sponsors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $judul = 'Sponsor Create';
        $generals = General::find(1);
        $sponsors = Sponsor::all();
        return view('back.sponsor.create', compact('judul', 'generals', 'sponsors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->title ; 
        $spons = Sponsor::where('title',$name)->first();

        if ($spons) {           
            return redirect('/admin/sponsor/create')->with('message','Data Sudah Ada');
            
        }
        else{
            if (!$file = $request->file('image')) {
                $data = new Sponsor();
                $data->title = $request->title;
                $data->deskripsi = $request->deskripsi;
                $data->url = $request->url;            
                $data->save();           
                return redirect('/admin/sponsor')->with('success','Data Berhasil di Simpan');
           
            } else {
                $file = $request->file('image');
                $name = $file->getClientOriginalName();
                $filename = $name;  
                $tujuan_upload = 'data_file';
                $file->move($tujuan_upload,$filename);
                $data = new Sponsor();
                $data->title = $request->title;
                $data->deskripsi = $request->deskripsi;
                $data->url = $request->url; 
                $data->image = $filename;            
                $data->save();           
                return redirect('/admin/sponsor')->with('success','Data Berhasil di Simpan');
           
            }
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
        $judul = 'Sponsor Show';
        $generals = General::find(1);
        $sponsors = Sponsor::find($id);
        return view('back.sponsor.show', compact('judul', 'generals', 'sponsors'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $judul = 'Sponsor Edit';
        $generals = General::find(1);
        $sponsors = Sponsor::find($id);
        return view('back.sponsor.edit', compact('judul', 'generals', 'sponsors'));
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
        if (!$file = $request->file('image')) {
            $data = Sponsor::where('id','=', $request->id)->first();
            $data->title = $request->title;
            $data->deskripsi = $request->deskripsi;
            $data->url = $request->url;            
            $data->save();           
            return redirect('/admin/sponsor')->with('success','Data Berhasil di Simpan');
       
        } else {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $filename = $name;  
            $tujuan_upload = 'data_file';
            $file->move($tujuan_upload,$filename);
            $data = Sponsor::where('id','=', $request->id)->first();
            $data->title = $request->title;
            $data->deskripsi = $request->deskripsi;
            $data->url = $request->url;   
            $data->image = $filename;            
            $data->save();           
            return redirect('/admin/sponsor')->with('success','Data Berhasil di Simpan');
       
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
        $data = Sponsor::find($id);
        $data->delete($data);
        return redirect('/admin/sponsor')->with('success', 'Data Berhasil Dihapus');
    }
}
