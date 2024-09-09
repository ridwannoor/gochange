<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\General;
use App\Models\Testimoni;
// use App\Models\Categorytestimoni;

class TestimoniController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $judul = 'Testimoni';
        $generals = General::find(1);
        $testimonis = testimoni::all();
        return view('back.testimoni.index', compact('judul', 'generals', 'testimonis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $judul = 'Testimoni Create';
        $generals = General::find(1);
        return view('back.testimoni.create', compact('judul', 'generals'));
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
        $spons = Testimoni::where('title',$name)->first();

        if ($spons) {           
            return redirect('/admin/testimoni/create')->with('message','Data Sudah Ada');
            
        }
        else{
            if (!$file = $request->file('image')) {
                $data = new Testimoni();
                $data->title = $request->title;
                $data->deskripsi = $request->deskripsi;
                $data->name = $request->name;
                $data->email = $request->email;            
                $data->save();           
                return redirect('/admin/testimoni')->with('success','Data Berhasil di Simpan');
           
            } else {
                $file = $request->file('image');
                $name = $file->getClientOriginalName();
                $filename = $name;  
                $tujuan_upload = 'data_file';
                $file->move($tujuan_upload,$filename);
                $data = new Testimoni();
                $data->title = $request->title;
                $data->deskripsi = $request->deskripsi;
                $data->name = $request->name;
                $data->email = $request->email; 
                $data->image = $filename;            
                $data->save();           
                return redirect('/admin/testimoni')->with('success','Data Berhasil di Simpan');
           
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
        $judul = 'Testimoni Show';
        $generals = General::find(1);
        $testimonis = Testimoni::find($id);
       
        return view('back.testimoni.show', compact('judul', 'generals', 'testimonis'));//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $judul = 'Testimoni Edit';
        $generals = General::find(1);
        $testimonis = Testimoni::find($id);
       
        return view('back.testimoni.edit', compact('judul', 'generals', 'testimonis'));
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
            $data = Testimoni::where('id','=', $request->id)->first();
            $data->title = $request->title;
            $data->deskripsi = $request->deskripsi;
            $data->name = $request->name;
            $data->email = $request->email;
            $data->save();           
            return redirect('/admin/testimoni')->with('success','Data Berhasil di Simpan');
       
        } else {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $filename = $name;  
            $tujuan_upload = 'data_file';
            $file->move($tujuan_upload,$filename);
            $data = Testimoni::where('id','=', $request->id)->first();
            $data->title = $request->title;
            $data->deskripsi = $request->deskripsi;
            $data->name = $request->name;
            $data->email = $request->email; 
            $data->image = $filename;            
            $data->save();           
            return redirect('/admin/testimoni')->with('success','Data Berhasil di Simpan');
       
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
        $data = Testimoni::find($id);
        $data->delete($data);
        return redirect('/admin/testimoni')->with('success', 'Data Berhasil Dihapus');
    }

    public function publish($id)
    {       
        $testimonis = Testimoni::find($id);
        $testimonis->is_published = !$testimonis->is_published;
        $testimonis->save();  
        return redirect('/admin/testimoni');
    }
}
