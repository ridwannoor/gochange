<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoryservice;
use App\Models\General;

class CategoryserviceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $judul = 'Category service';
        $generals = General::find(1);
        $categoryservices = Categoryservice::all();
        return view('back.service.category.index', compact('judul', 'generals', 'categoryservices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $judul = 'Category service Create';
        $generals = General::find(1);
        $categoryservices = Categoryservice::all();
        return view('back.service.category.create', compact('judul', 'generals', 'categoryservices'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->title;
        $spons = Categoryservice::where('title', $name)->first();

        if ($spons) {
            return redirect('/admin/categoryservice/create')->with('message', 'Data Sudah Ada');
        } else {
            $data = new Categoryservice();
            $data->title = $request->title;
            $data->deskripsi = $request->deskripsi;
            $data->save();
            return redirect('/admin/categoryservice')->with('success', 'Data Berhasil di Simpan');
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
        $judul = 'Categoryservice Show';
        $generals = General::find(1);
        $categoryservices = Categoryservice::find($id);
        return view('back.service.category.show', compact('judul', 'generals', 'categoryservices'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $judul = 'Categoryservice Edit';
        $generals = General::find(1);
        $categoryservices = Categoryservice::find($id);
        return view('back.service.category.edit', compact('judul', 'generals', 'categoryservices'));
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
        $data = Categoryservice::where('id', '=', $request->id)->first();
        $data->title = $request->title;
        $data->deskripsi = $request->deskripsi;
        $data->save();
        return redirect('/admin/categoryservice')->with('success', 'Data Berhasil di Simpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Categoryservice::find($id);
        $data->delete($data);
        return redirect('/admin/categoryservice')->with('success', 'Data Berhasil Dihapus');
    }
}
