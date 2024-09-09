<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoryportfolio;
use App\Models\General;

class CategoryportfolioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $judul = 'Category Portfolio';
        $generals = General::find(1);
        $categoryportfolios = Categoryportfolio::all();
        return view('back.portfolio.category.index', compact('judul', 'generals', 'categoryportfolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $judul = 'Category Portfolio Create';
        $generals = General::find(1);
        $categoryportfolios = Categoryportfolio::all();
        return view('back.portfolio.category.create', compact('judul', 'generals', 'categoryportfolios'));
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
        $spons = Categoryportfolio::where('title',$name)->first();

        if ($spons) {           
            return redirect('/admin/categoryportfolio/create')->with('message','Data Sudah Ada');
            
        }
        else{
                $data = new Categoryportfolio();
                $data->title = $request->title;
                $data->deskripsi = $request->deskripsi;
                $data->save();           
                return redirect('/admin/categoryportfolio')->with('success','Data Berhasil di Simpan');
           
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
        $judul = 'Categoryportfolio Show';
        $generals = General::find(1);
        $categoryportfolios = Categoryportfolio::find($id);
        return view('back.portfolio.category.show', compact('judul', 'generals', 'categoryportfolios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $judul = 'Categoryportfolio Edit';
        $generals = General::find(1);
        $categoryportfolios = Categoryportfolio::find($id);
        return view('back.portfolio.category.edit', compact('judul', 'generals', 'categoryportfolios'));
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
            $data = Categoryportfolio::where('id','=', $request->id)->first();
            $data->title = $request->title;
            $data->deskripsi = $request->deskripsi;
            $data->save();           
            return redirect('/admin/categoryportfolio')->with('success','Data Berhasil di Simpan');
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Categoryportfolio::find($id);
        $data->delete($data);
        return redirect('/admin/categoryportfolio')->with('success', 'Data Berhasil Dihapus');
    }

}
