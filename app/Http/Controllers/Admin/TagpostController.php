<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tagpost;
use App\Models\General;

class TagpostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $judul = 'tag post';
        $generals = General::find(1);
        $tagposts = Tagpost::all();
        return view('back.post.tag.index', compact('judul', 'generals', 'tagposts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $judul = 'tag post Create';
        $generals = General::find(1);
        $tagposts = Tagpost::all();
        return view('back.post.tag.create', compact('judul', 'generals', 'tagposts'));
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
        $spons = Tagpost::where('title',$name)->first();

        if ($spons) {           
            return redirect('/admin/tagpost/create')->with('message','Data Sudah Ada');
            
        }
        else{
                $data = new Tagpost();
                $data->title = $request->title;
                $data->deskripsi = $request->deskripsi;
                $data->save();           
                return redirect('/admin/tagpost')->with('success','Data Berhasil di Simpan');
           
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
        $judul = 'tagpost Show';
        $generals = General::find(1);
        $tagposts = Tagpost::find($id);
        return view('back.post.tag.show', compact('judul', 'generals', 'tagposts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $judul = 'tagpost Edit';
        $generals = General::find(1);
        $tagposts = Tagpost::find($id);
        return view('back.post.tag.edit', compact('judul', 'generals', 'tagposts'));
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
            $data = Tagpost::where('id','=', $request->id)->first();
            $data->title = $request->title;
            $data->deskripsi = $request->deskripsi;
            $data->save();           
            return redirect('/admin/tagpost')->with('success','Data Berhasil di Simpan');
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Tagpost::find($id);
        $data->delete($data);
        return redirect('/admin/tagpost')->with('success', 'Data Berhasil Dihapus');
    }

}
