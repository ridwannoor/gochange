<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoryvideo;
use App\Models\General;

class CategoryvideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $judul = 'Category video';
        $generals = General::find(1);
        $categoryvideos = Categoryvideo::all();
        return view('back.video.category.index', compact('judul', 'generals', 'categoryvideos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $judul = 'Category video Create';
        $generals = General::find(1);
        $categoryvideos = Categoryvideo::all();
        return view('back.video.category.create', compact('judul', 'generals', 'categoryvideos'));
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
        $spons = Categoryvideo::where('title',$name)->first();

        if ($spons) {           
            return redirect('/admin/categoryvideo/create')->with('message','Data Sudah Ada');
            
        }
        else{
                $data = new Categoryvideo();
                $data->title = $request->title;
                $data->deskripsi = $request->deskripsi;
                $data->save();           
                return redirect('/admin/categoryvideo')->with('success','Data Berhasil di Simpan');
           
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
        $judul = 'Categoryvideo Show';
        $generals = General::find(1);
        $categoryvideos = Categoryvideo::find($id);
        return view('back.video.category.show', compact('judul', 'generals', 'categoryvideos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $judul = 'Categoryvideo Edit';
        $generals = General::find(1);
        $categoryvideos = Categoryvideo::find($id);
        return view('back.video.category.edit', compact('judul', 'generals', 'categoryvideos'));
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
            $data = Categoryvideo::where('id','=', $request->id)->first();
            $data->title = $request->title;
            $data->deskripsi = $request->deskripsi;
            $data->save();           
            return redirect('/admin/categoryvideo')->with('success','Data Berhasil di Simpan');
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Categoryvideo::find($id);
        $data->delete($data);
        return redirect('/admin/categoryvideo')->with('success', 'Data Berhasil Dihapus');
    }

}
