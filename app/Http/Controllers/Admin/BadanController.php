<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Badan;
use App\Models\General;

class BadanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $judul = ' Badan Usaha';
        $generals = General::find(1);
        $badans = Badan::all();
        return view('back.partner.badan.index', compact('judul', 'generals', 'badans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $judul = ' Badan Usaha Create';
        $generals = General::find(1);
        $badans = Badan::all();
        return view('back.partner.badan.create', compact('judul', 'generals', 'badans'));
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
        $spons = Badan::where('title',$name)->first();

        if ($spons) {           
            return redirect('/admin/badan/create')->with('message','Data Sudah Ada');
            
        }
        else{
                $data = new Badan();
                $data->title = $request->title;
                $data->deskripsi = $request->deskripsi;
                $data->save();           
                return redirect('/admin/badan')->with('success','Data Berhasil di Simpan');
           
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
        $judul = 'Badan Show';
        $generals = General::find(1);
        $badans = Badan::find($id);
        return view('back.partner.badan.show', compact('judul', 'generals', 'badans'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $judul = 'Badan Edit';
        $generals = General::find(1);
        $badans = Badan::find($id);
        return view('back.partner.badan.edit', compact('judul', 'generals', 'badans'));
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
            $data = Badan::where('id','=', $request->id)->first();
            $data->title = $request->title;
            $data->deskripsi = $request->deskripsi;
            $data->save();           
            return redirect('/admin/badan')->with('success','Data Berhasil di Simpan');
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Badan::find($id);
        $data->delete($data);
        return redirect('/admin/badan')->with('success', 'Data Berhasil Dihapus');
    }

}
