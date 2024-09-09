<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorygallery;
use App\Models\General;

class CategorygalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $judul = 'Category Gallery';
        $generals = General::find(1);
        $categorygallerys = Categorygallery::all();
        return view('back.gallery.category.index', compact('judul', 'generals', 'categorygallerys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $judul = 'Category Gallery Create';
        $generals = General::find(1);
        $categorygallerys = Categorygallery::all();
        return view('back.gallery.category.create', compact('judul', 'generals', 'categorygallerys'));
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
        $spons = Categorygallery::where('title',$name)->first();

        if ($spons) {           
            return redirect('/admin/categorygallery/create')->with('message','Data Sudah Ada');
            
        }
        else{
                $data = new Categorygallery();
                $data->title = $request->title;
                $data->deskripsi = $request->deskripsi;
                $data->save();           
                return redirect('/admin/categorygallery')->with('success','Data Berhasil di Simpan');
           
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
        $judul = 'Categorygallery Show';
        $generals = General::find(1);
        $categorygallerys = Categorygallery::find($id);
        return view('back.gallery.category.show', compact('judul', 'generals', 'categorygallerys'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $judul = 'Categorygallery Edit';
        $generals = General::find(1);
        $categorygallerys = Categorygallery::find($id);
        return view('back.gallery.category.edit', compact('judul', 'generals', 'categorygallerys'));
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
            $data = Categorygallery::where('id','=', $request->id)->first();
            $data->title = $request->title;
            $data->deskripsi = $request->deskripsi;
            $data->save();           
            return redirect('/admin/categorygallery')->with('success','Data Berhasil di Simpan');
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Categorygallery::find($id);
        $data->delete($data);
        return redirect('/admin/categorygallery')->with('success', 'Data Berhasil Dihapus');
    }

}
