<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorypost;
use App\Models\General;

class CategorypostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $judul = 'Category post';
        $generals = General::find(1);
        $categoryposts = Categorypost::all();
        return view('back.post.category.index', compact('judul', 'generals', 'categoryposts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $judul = 'Category post Create';
        $generals = General::find(1);
        $categoryposts = Categorypost::all();
        return view('back.post.category.create', compact('judul', 'generals', 'categoryposts'));
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
        $spons = Categorypost::where('title',$name)->first();

        if ($spons) {           
            return redirect('/admin/categorypost/create')->with('message','Data Sudah Ada');
            
        }
        else{
                $data = new Categorypost();
                $data->title = $request->title;
                $data->deskripsi = $request->deskripsi;
                $data->save();           
                return redirect('/admin/categorypost')->with('success','Data Berhasil di Simpan');
           
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
        $judul = 'Categorypost Show';
        $generals = General::find(1);
        $categoryposts = Categorypost::find($id);
        return view('back.post.category.show', compact('judul', 'generals', 'categoryposts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $judul = 'Categorypost Edit';
        $generals = General::find(1);
        $categoryposts = Categorypost::find($id);
        return view('back.post.category.edit', compact('judul', 'generals', 'categoryposts'));
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
            $data = Categorypost::where('id','=', $request->id)->first();
            $data->title = $request->title;
            $data->deskripsi = $request->deskripsi;
            $data->save();           
            return redirect('/admin/categorypost')->with('success','Data Berhasil di Simpan');
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Categorypost::find($id);
        $data->delete($data);
        return redirect('/admin/categorypost')->with('success', 'Data Berhasil Dihapus');
    }

}
