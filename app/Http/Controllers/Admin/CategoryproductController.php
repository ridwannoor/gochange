<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoryproduct;
use App\Models\General;

class CategoryproductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $judul = 'Category Product';
        $generals = General::find(1);
        $categoryproducts = Categoryproduct::all();
        return view('back.product.category.index', compact('judul', 'generals', 'categoryproducts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $judul = 'Category Product Create';
        $generals = General::find(1);
        $categoryproducts = Categoryproduct::all();
        return view('back.product.category.create', compact('judul', 'generals', 'categoryproducts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'image|mimes:jpg,png,jpeg'
        ]);

        $name = $request->title;
        $spons = Categoryproduct::where('title', $name)->first();

        if ($spons) {
            return redirect('/admin/categoryproduct/create')->with('message', 'Data Sudah Ada');
        } else {
            if (!$file = $request->file('image')) {
                $data = new Categoryproduct();
                $data->title = $request->title;
                $data->deskripsi = $request->deskripsi;
                $data->save();
                return redirect('/admin/categoryproduct')->with('success', 'Data Berhasil di Simpan');
            } else {
                $file = $request->file('image');
                // $name = $file->getClientOriginalName();
                // $filename = $name;
                $extension = $file->getClientOriginalExtension();
                $filename = 'CATPRO_' . date('YmdHis') . "." . $extension;
                $tujuan_upload = 'data_file/productcat';
                $file->move($tujuan_upload, $filename);
                $data = new Categoryproduct();
                $data->title = $request->title;
                $data->deskripsi = $request->deskripsi;
                $data->image = $filename;
                $data->save();
                return redirect('/admin/categoryproduct')->with('success', 'Data Berhasil di Simpan');
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
        $judul = 'Categoryproduct Show';
        $generals = General::find(1);
        $categoryproducts = Categoryproduct::find($id);
        return view('back.product.category.show', compact('judul', 'generals', 'categoryproducts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $judul = 'Categoryproduct Edit';
        $generals = General::find(1);
        $categoryproducts = Categoryproduct::find($id);
        return view('back.product.category.edit', compact('judul', 'generals', 'categoryproducts'));
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
        $this->validate($request, [
            'image' => 'image|mimes:jpg,png,jpeg'
        ]);


        if (!$file = $request->file('image')) {
            $data = Categoryproduct::where('id', '=', $request->id)->first();
            $data->title = $request->title;
            $data->deskripsi = $request->deskripsi;
            $data->save();
            return redirect('/admin/categoryproduct')->with('success', 'Data Berhasil di Perbarui');
        } else {
            $file = $request->file('image');
            // $name = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $filename = 'CATPRO_' . date('YmdHis') . "." . $extension;
            $tujuan_upload = 'data_file/productcat';
            $file->move($tujuan_upload, $filename);
            $data = Categoryproduct::where('id', '=', $request->id)->first();
            $data->title = $request->title;
            $data->deskripsi = $request->deskripsi;
            $data->image = $filename;
            $data->save();
            return redirect('/admin/categoryproduct')->with('success', 'Data Berhasil di Perbarui');
        }


        // $data = Categoryproduct::where('id', '=', $request->id)->first();
        // $data->title = $request->title;
        // $data->deskripsi = $request->deskripsi;
        // $data->save();
        // return redirect('/admin/categoryproduct')->with('success', 'Data Berhasil di Simpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Categoryproduct::find($id);
        $data->delete($data);
        return redirect('/admin/categoryproduct')->with('success', 'Data Berhasil Dihapus');
    }
}
