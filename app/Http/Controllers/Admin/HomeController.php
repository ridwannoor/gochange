<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\General;
use App\Models\Post;
use App\Models\Portfolio;
use App\Models\Team;
use App\Models\Service;
use App\Models\Video;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\Testimoni;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $judul = "Home";
        $generals = General::find(1);
        $blogs = Post::where('is_published', '=', 1)->get();
        $teams = Team::where('is_published', '=', 1)->get();
        $services = Service::where('is_published', '=', 1)->get();
        $portfolios = Portfolio::where('is_published', '=', 1)->get();
        $videos = Video::where('is_published', '=', 1)->get();
        $gallerys = Gallery::where('is_published', '=', 1)->get();
        $products = Product::where('is_published', '=', 1)->get();
        $testimonis = Testimoni::where('is_published', '=', 1)->get();
        $newskey = env('NEWS_API_KEY');
        $response = Http::get('https://newsapi.org/v2/top-headlines?country=id&apiKey=' . $newskey);
        $news = $response->json();
        $newsdata = $news['articles'];
        // $blogsi = cou blogs->count();
        return view('back.index', compact('judul', 'generals', 'newsdata', 'blogs', 'teams', 'services', 'portfolios', 'videos', 'gallerys', 'products', 'testimonis'));
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
