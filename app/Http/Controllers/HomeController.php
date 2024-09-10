<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\General;
use App\Models\Sponsor;
use App\Models\Testimoni;
use App\Models\Post;
use App\Models\Banner;
use App\Models\Contactus;
use App\Models\CategoryPost;
use App\Models\CommentPost;
use App\Models\TagPost;
use App\Models\Gallery;
use App\Models\CategoryService;
use App\Models\CategoryVideo;
use App\Models\CategoryPortfolio;
use App\Models\Service;
use App\Models\Portfolio;
use App\Models\User;
use App\Models\Product;
use App\Models\Categoryproduct;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $judul = "Homepage";
        $generals = General::find(1);
        $services = Service::all();
        $sponsors = Sponsor::all();
        $testimonis = Testimoni::all();
        $sliders = Slider::all();
        $galleries = Gallery::all();
        $portfolios = Portfolio::all();
        $posts = Post::paginate(3);
        $categories = Categoryproduct::with('subcategory', 'products')->get();
        $products = Product::with('productdetails', 'categoryproduct', 'subcategory')->get();
        $banners = Banner::all();
        // $newskey = env('NEWS_API_KEY');
        // $response = Http::get('https://newsapi.org/v2/everything?q=tesla&from=2024-01-19&pageSize=3&SortBy=publishedAt&apiKey=96151bb9f1d3472e849e74f7e0124b91');
        // $news = $response->json();
        // dd($news);
        // $newsdata =  $news['articles'];
        // $newsdatas = $newsdata::paginate(3);
        // GET https://newsapi.org/v2/top-headlines/sources?category=businessapiKey=API_KEY

        return view('front.index', compact('sliders',  'posts', 'generals', 'galleries', 'services', 'testimonis', 'sponsors', 'portfolios', 'judul', 'banners', 'categories', 'products'));
    }

    public function portfolio()
    {
        $generals = General::find(1);
        $services = Service::all();
        $sponsors = Sponsor::all();
        $testimonis = Testimoni::all();
        $sliders = Slider::all();
        $portfolios = Portfolio::withCount('category')->paginate(8);
        $posts = Post::all();

        return view('front.portfolio', compact('sliders', 'posts', 'generals', 'services', 'testimonis', 'sponsors', 'portfolios'));
    }

    public function partner()
    {
        $judul = "Partner";
        $generals = General::find(1);
        $services = Service::all();
        $sponsors = Sponsor::all();
        $testimonis = Testimoni::all();
        $sliders = Slider::all();
        $portfolios = Portfolio::withCount('category')->paginate(8);
        $posts = Post::all();
        $banners = Banner::all();
        return view('front.partner', compact('sliders', 'posts', 'generals', 'services', 'testimonis', 'sponsors', 'portfolios', 'judul', 'banners'));
    }

    public function portfoliodetail($id)
    {
        $generals = General::find(1);
        $services = Service::all();
        $sponsors = Sponsor::all();
        $testimonis = Testimoni::all();
        $sliders = Slider::all();
        $portfolios = Portfolio::find($id);
        $port = Portfolio::all();
        $posts = Post::all();

        return view('front.portfoliodetail', compact('sliders', 'posts', 'generals', 'services', 'testimonis', 'sponsors', 'portfolios', 'port'));
    }

    public function post()
    {
        $judul = " Blog";
        $generals = General::find(1);
        $services = Service::all();
        $sponsors = Sponsor::all();
        $testimonis = Testimoni::all();
        $sliders = Slider::all();
        $portfolios = Portfolio::all();
        $posts = Post::withCount('categorypost')->paginate(8);

        return view('front.blog', compact('sliders', 'posts', 'judul', 'generals', 'services', 'testimonis', 'sponsors', 'portfolios'));
    }

    public function comingsoon()
    {
        $judul = " Comingsoon";
        $generals = General::find(1);
        $services = Service::all();
        $sponsors = Sponsor::all();
        $testimonis = Testimoni::all();
        $sliders = Slider::all();
        $portfolios = Portfolio::all();
        $posts = Post::withCount('categorypost')->paginate(8);
        $categories = Categoryproduct::with('subcategory', 'products')->get();
        return view('front.comingsoon', compact('sliders', 'posts', 'judul', 'generals', 'categories', 'services', 'testimonis', 'sponsors', 'portfolios'));
    }

    public function about()
    {
        $judul = "contact";
        $generals = General::find(1);
        $services = Service::all();
        $sponsors = Sponsor::all();
        $testimonis = Testimoni::all();
        $sliders = Slider::all();
        $portfolios = Portfolio::all();
        $posts = Post::withCount('categorypost')->paginate(8);
        $categories = Categoryproduct::with('subcategory', 'products')->get();
        return view('front.about', compact('sliders', 'posts', 'generals', 'services', 'testimonis', 'categories', 'sponsors', 'judul', 'portfolios'));
    }

    public function postdetail($id)
    {
        $judul = "Blog";
        $generals = General::find(1);
        $services = Service::all();
        $sponsors = Sponsor::all();
        $testimonis = Testimoni::all();
        $sliders = Slider::all();
        $portfolios = Portfolio::all();
        $posts = Post::with('comment')->find($id);
        $po = Post::all();
        $catpost = Categorypost::withCount('posts')->get();
        // $cats = $catpost->count();
        $tagpost = Tagpost::with('posts')->get();
        return view('front.blogdetail', compact('sliders', 'catpost', 'tagpost', 'po', 'posts',  'generals', 'services', 'judul', 'testimonis', 'sponsors', 'portfolios'));
    }

    public function contact()
    {
        $generals = General::find(1);
        $services = Service::all();
        $sponsors = Sponsor::all();
        $testimonis = Testimoni::all();
        $sliders = Slider::all();
        $portfolios = Portfolio::all();
        $posts = Post::all();

        return view('front.contactus', compact('sliders', 'posts', 'generals', 'services', 'testimonis', 'sponsors', 'portfolios'));
    }

    public function comment(Request $request)
    {
        $commentposts = new Commentpost();
        $commentposts->name = $request->name;
        $commentposts->email = $request->email;
        $commentposts->comment = $request->comment;
        $commentposts->post_id = $request->id;
        $commentposts->save();

        // $posts = Post::find($id);

        return redirect('/blog')->with('success', 'Data Berhasil di Simpan');
    }

    public function contactsave(Request $request)
    {
        $contacts = new Contactus();
        $contacts->name = $request->name;
        $contacts->email = $request->email;
        $contacts->comment = $request->comment;
        $contacts->subject = $request->subject;
        $contacts->save();

        // $posts = Post::find($id);

        return redirect('/contact')->with('success', 'Data Berhasil di Simpan');
    }
}
