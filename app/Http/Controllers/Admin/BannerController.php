<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\General;
use App\Models\Banner;

class BannerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $judul = 'Banner';
        $generals = General::find(1);
        $banners = Banner::all();
        return view('back.banner.index', compact('judul', 'generals', 'banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $judul = 'Banner Create';
        $generals = General::find(1);
        $banners = Banner::all();
        return view('back.banner.create', compact('judul', 'generals', 'banners'));
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
        $spons = Banner::where('title',$name)->first();

        if ($spons) {           
            return redirect('/admin/banner/create')->with('message','Data Sudah Ada');
            
        }
        else{
            if (!$file = $request->file('image')) {
                $data = new Banner();
                $data->title = $request->title;
                $data->deskripsi = $request->deskripsi;
                $data->url = $request->url;            
                $data->save();           
                return redirect('/admin/banner')->with('success','Data Berhasil di Simpan');
           
            } else {
                $file = $request->file('image');
                $name = $file->getClientOriginalName();
                $filename = $name;  
                $tujuan_upload = 'data_file';
                $file->move($tujuan_upload,$filename);
                $data = new Banner();
                $data->title = $request->title;
                $data->deskripsi = $request->deskripsi;
                $data->url = $request->url; 
                $data->image = $filename;            
                $data->save();           
                return redirect('/admin/banner')->with('success','Data Berhasil di Simpan');
           
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
        $judul = 'Banner Show';
        $generals = General::find(1);
        $banners = Banner::find($id);
        return view('back.banner.show', compact('judul', 'generals', 'banners'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $judul = 'Banner Edit';
        $generals = General::find(1);
        $banners = Banner::find($id);
        return view('back.banner.edit', compact('judul', 'generals', 'banners'));
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
            $data = Banner::where('id','=', $request->id)->first();
            $data->title = $request->title;
            $data->deskripsi = $request->deskripsi;
            $data->url = $request->url;            
            $data->save();           
            return redirect('/admin/banner')->with('success','Data Berhasil di Simpan');
       
        } else {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $filename = $name;  
            $tujuan_upload = 'data_file';
            $file->move($tujuan_upload,$filename);
            $data = Banner::where('id','=', $request->id)->first();
            $data->title = $request->title;
            $data->deskripsi = $request->deskripsi;
            $data->url = $request->url;   
            $data->image = $filename;            
            $data->save();           
            return redirect('/admin/banner')->with('success','Data Berhasil di Simpan');
       
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
        $data = Banner::find($id);
        $data->delete($data);
        return redirect('/admin/banner')->with('success', 'Data Berhasil Dihapus');
    }
}
