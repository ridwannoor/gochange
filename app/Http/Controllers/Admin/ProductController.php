<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Categoryproduct;
use App\Models\Subcategory;
use App\Models\General;
use App\Models\Productdetail;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $judul = 'Product';
        $generals = General::find(1);
        $products = Product::with('categoryproduct', 'subcategory', 'productdetails')->get();
        return view('back.product.index', compact('judul', 'generals', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $judul = 'Product Create';
        $generals = General::find(1);
        $categoryproducts = Categoryproduct::all();
        return view('back.product.create', compact('judul', 'generals', 'categoryproducts'));
    }

    public function data(Request $request)
    {
        $categoryproduct_id = $request->categoryproduct_id;
        $subcategory = SubCategory::where('categoryproduct_id', '=', $categoryproduct_id)->get();
        return response()->json($subcategory);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $content = $request->deskripsi;
        $dom = new \DomDocument();
        @$dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $imageFile = $dom->getElementsByTagName('imageFile');

        foreach ($imageFile as $item => $image) {
            $data = $img->getAttribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $imgeData = base64_decode($data);
            $image_name = 'upload_file' . time() . $item . '.png';
            $path = public_path() . $image_name;
            file_put_contents($path, $imgeData);

            $image->removeAttribute('src');
            $image->setAttribute('src', $image_name);
        }

        $content = $dom->saveHTML();

        $products = new Product();
        $products->title = $request->title;
        $products->deskripsi = $content;
        $products->categoryproduct_id = $request->categoryproduct_id;
        $products->subcategory_id = $request->subcategory_id;
        $products->harga = $request->harga;
        $products->save();

        if ($request->hasfile('image')) {
            foreach ($request->image as $file) {
                // $name = $file->getClientOriginalName();
                // $filename = $request->id.$name; 
                $extension = $file->getClientOriginalExtension();
                $filename = 'PRODUCT_' . date('YmdHis') . "." . $extension;
                $tujuan_upload = 'data_file/product';
                $file->move($tujuan_upload, $filename);

                $data = array(
                    'product_id' => $products->id,
                    'image' => $filename
                );
                Productdetail::insert($data);
            }
        }

        return redirect('/admin/product')->with('success', 'Data Berhasil di Simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $judul = 'Product Show';
        $generals = General::find(1);
        $products = Product::find($id);
        $categoryproducts = Categoryproduct::all();
        return view('back.product.show', compact('judul', 'generals', 'categoryproducts', 'products')); //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $judul = 'Product Edit';
        $generals = General::find(1);
        $products = Product::find($id);
        $categoryproducts = Categoryproduct::all();
        // $subcategorys = Subcategory::all();
        return view('back.product.edit', compact('judul', 'generals', 'categoryproducts', 'products'));
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
        $content = $request->deskripsi;
        $dom = new \DomDocument();
        @$dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $imageFile = $dom->getElementsByTagName('imageFile');

        foreach ($imageFile as $item => $image) {
            $data = $img->getAttribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $imgeData = base64_decode($data);
            $image_name = 'upload_file' . time() . $item . '.png';
            $path = public_path() . $image_name;
            file_put_contents($path, $imgeData);

            $image->removeAttribute('src');
            $image->setAttribute('src', $image_name);
        }

        $content = $dom->saveHTML();

        $products = Product::where('id', '=', $request->id)->first();
        $products->title = $request->title;
        $products->deskripsi = $content;
        $products->categoryproduct_id = $request->categoryproduct_id;
        $products->subcategory_id = $request->subcategory_id;
        $products->harga = $request->harga;
        $products->save();


        if ($request->hasfile('image')) {
            foreach ($request->image as $file) {
                // $name = $file->getClientOriginalName();
                // $filename = $request->id . $name;
                $extension = $file->getClientOriginalExtension();
                $filename = 'PRODUCT_' . date('YmdHis') . "." . $extension;
                $tujuan_upload = 'data_file/product';
                $file->move($tujuan_upload, $filename);

                $data = array(
                    'product_id' => $products->id,
                    'image' => $filename
                );
                Productdetail::insert($data);
            }
        }
        return redirect('/admin/product')->with('success', 'Data Berhasil di Simpan');

        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Product::find($id);
        $data->productdetails()->delete();
        $data->delete($data);
        return redirect('/admin/product')->with('success', 'Data Berhasil Dihapus');
    }

    public function destroyfile($id)
    {
        $data = Productdetail::find($id);
        $data->delete($data);
        return redirect('/admin/product')->with('success', 'Data Berhasil Dihapus');
    }

    public function publish($id)
    {
        $products = Product::find($id);
        $products->is_published = !$products->is_published;
        $products->save();
        return redirect('/admin/product');
    }
}
