<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\General;
use App\Models\Slider;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $judul = 'Slider';
        $generals = General::find(1);
        $sliders = Slider::all();
        return view('back.slider.index', compact('judul', 'generals', 'sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $judul = 'Slider Create';
        $generals = General::find(1);
        $sliders = Slider::all();
        return view('back.slider.create', compact('judul', 'generals', 'sliders'));
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
        $spons = Slider::where('title',$name)->first();

        if ($spons) {           
            return redirect('/admin/slider/create')->with('message','Data Sudah Ada');
            
        }
        else{
            if (!$file = $request->file('image')) {
                $data = new Slider();
                $data->title = $request->title;
                $data->deskripsi = $request->deskripsi;
                $data->url = $request->url;            
                $data->save();           
                return redirect('/admin/slider')->with('success','Data Berhasil di Simpan');
           
            } else {
                $file = $request->file('image');
                $name = $file->getClientOriginalName();
                $filename = $name;  
                $tujuan_upload = 'data_file';
                $file->move($tujuan_upload,$filename);
                $data = new Slider();
                $data->title = $request->title;
                $data->deskripsi = $request->deskripsi;
                $data->url = $request->url; 
                $data->image = $filename;            
                $data->save();           
                return redirect('/admin/slider')->with('success','Data Berhasil di Simpan');
           
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
        $judul = 'Slider Show';
        $generals = General::find(1);
        $sliders = Slider::find($id);
        return view('back.slider.show', compact('judul', 'generals', 'sliders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $judul = 'Slider Edit';
        $generals = General::find(1);
        $sliders = Slider::find($id);
        return view('back.slider.edit', compact('judul', 'generals', 'sliders'));
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
            $data = Slider::where('id','=', $request->id)->first();
            $data->title = $request->title;
            $data->deskripsi = $request->deskripsi;
            $data->url = $request->url;            
            $data->save();           
            return redirect('/admin/slider')->with('success','Data Berhasil di Simpan');
       
        } else {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $filename = $name;  
            $tujuan_upload = 'data_file';
            $file->move($tujuan_upload,$filename);
            $data = Slider::where('id','=', $request->id)->first();
            $data->title = $request->title;
            $data->deskripsi = $request->deskripsi;
            $data->url = $request->url;   
            $data->image = $filename;            
            $data->save();           
            return redirect('/admin/slider')->with('success','Data Berhasil di Simpan');
       
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
        $data = Slider::find($id);
        $data->delete($data);
        return redirect('/admin/slider')->with('success', 'Data Berhasil Dihapus');
    }
}
