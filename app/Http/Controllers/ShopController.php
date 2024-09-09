<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\General;
use App\Models\Sponsor;
use App\Models\Testimoni;
use App\Models\Post;
use App\Models\CategoryPost;
use App\Models\CategoryService;
use App\Models\CategoryVideo;
use App\Models\CategoryPortfolio;
use App\Models\Service;
use App\Models\Portfolio;
use App\Models\User;
use App\Models\Product;
use App\Models\Productdetail;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $judul = "Product List";
        $generals = General::find(1);
        $services = Service::all();
        $sponsors = Sponsor::all();
        $testimonis = Testimoni::all();
        $sliders = Slider::all();
        $portfolios = Portfolio::all();
        $posts = Post::all();
        $products = Product::with('productdetails')->get();
        // dd($products);
        return view('front.shop.index', compact('products', 'sliders', 'posts', 'generals', 'services', 'testimonis', 'sponsors','portfolios', 'judul'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
