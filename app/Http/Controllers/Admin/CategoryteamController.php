<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoryteam;
use App\Models\General;

class CategoryteamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $judul = 'Category team';
        $generals = General::find(1);
        $categoryteams = Categoryteam::all();
        return view('back.team.category.index', compact('judul', 'generals', 'categoryteams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $judul = 'Category team Create';
        $generals = General::find(1);
        $categoryteams = Categoryteam::all();
        return view('back.team.category.create', compact('judul', 'generals', 'categoryteams'));
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
        $spons = Categoryteam::where('title',$name)->first();

        if ($spons) {           
            return redirect('/admin/categoryteam/create')->with('message','Data Sudah Ada');
            
        }
        else{
                $data = new Categoryteam();
                $data->title = $request->title;
                $data->deskripsi = $request->deskripsi;
                $data->save();    
                
                
                return redirect('/admin/categoryteam')->with('success','Data Berhasil di Simpan');
           
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
        $judul = 'Categoryteam Show';
        $generals = General::find(1);
        $categoryteams = Categoryteam::find($id);
        return view('back.team.category.show', compact('judul', 'generals', 'categoryteams'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $judul = 'Categoryteam Edit';
        $generals = General::find(1);
        $categoryteams = Categoryteam::find($id);
        return view('back.team.category.edit', compact('judul', 'generals', 'categoryteams'));
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
            $data = Categoryteam::where('id','=', $request->id)->first();
            $data->title = $request->title;
            $data->deskripsi = $request->deskripsi;
            $data->save();           
            return redirect('/admin/categoryteam')->with('success','Data Berhasil di Simpan');
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Categoryteam::find($id);
        $data->delete($data);
        return redirect('/admin/categoryteam')->with('success', 'Data Berhasil Dihapus');
    }

}
