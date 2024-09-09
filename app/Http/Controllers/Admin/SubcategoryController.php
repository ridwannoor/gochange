<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoryproduct;
use App\Models\Subcategory;
use App\Models\General;

class SubcategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $judul = 'Sub Category Product';
        $generals = General::find(1);
        $subcategories = Subcategory::all();
        return view('back.product.subcategory.index', compact('judul', 'generals', 'subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $judul = 'Sub Category Product Create';
        $generals = General::find(1);
        $subcategories = Subcategory::all();
        $categories = Categoryproduct::all();
        return view('back.product.subcategory.create', compact('judul', 'generals', 'subcategories', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
                $data = new Subcategory();
                $data->name = $request->name;
                $data->categoryproduct_id = $request->categoryproduct_id;
                $data->save();           
                return redirect('/admin/subcategory')->with('success','Data Berhasil di Simpan');
           
           
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $judul = 'Subcategory Show';
        $generals = General::find(1);
        $subcategories = Subcategory::find($id);
        return view('back.product.subcategory.show', compact('judul', 'generals', 'subcategories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $judul = 'Subcategory Edit';
        $generals = General::find(1);
        $subcategories = Subcategory::with('categoryproduct')->find($id);
        $categories = Categoryproduct::all();
        return view('back.product.subcategory.edit', compact('judul', 'generals', 'subcategories', 'categories'));
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
            $data = Subcategory::where('id','=', $request->id)->first();
            $data->name = $request->name;
            $data->categoryproduct_id = $request->categoryproduct_id;
            $data->save();           
            return redirect('/admin/subcategory')->with('success','Data Berhasil di Simpan');
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Subcategory::find($id);
        $data->delete($data);
        return redirect('/admin/subcategory')->with('success', 'Data Berhasil Dihapus');
    }

}
