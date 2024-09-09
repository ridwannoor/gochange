<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\General;
use App\Models\Portfolio;
use App\Models\Categoryportfolio;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $judul = 'Portfolio';
        $generals = General::find(1);
        $portfolios = Portfolio::all();
        return view('back.portfolio.index', compact('judul', 'generals', 'portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $judul = 'Portfolio Create';
        $generals = General::find(1);
        $categoryportfolios = Categoryportfolio::all();
        return view('back.portfolio.create', compact('judul', 'generals', 'categoryportfolios'));
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
        $spons = Portfolio::where('title',$name)->first();

        if ($spons) {           
            return redirect('/admin/portfolio/create')->with('message','Data Sudah Ada');
            
        }
        else{
            
            $content = $request->deskripsi;
            $dom = new \DomDocument();
            $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $imageFile = $dom->getElementsByTagName('imageFile');
        
            foreach($imageFile as $item => $image){
                $data = $img->getAttribute('src');
                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);
                $imgeData = base64_decode($data);
                $image_name= 'upload_file' . time().$item.'.png';
                $path = public_path() . $image_name;
                file_put_contents($path, $imgeData);
                
                $image->removeAttribute('src');
                $image->setAttribute('src', $image_name);
                }
        
            $content = $dom->saveHTML();

            if (!$file = $request->file('image')) {
                $data = new Portfolio();
                $data->title = $request->title;
                $data->deskripsi = $content;
                $data->category_id = $request->category_id;
                $data->url = $request->url;            
                $data->save();           
                return redirect('/admin/portfolio')->with('success','Data Berhasil di Simpan');
           
            } else {
                $file = $request->file('image');
                $name = $file->getClientOriginalName();
                $filename = $name;  
                $tujuan_upload = 'data_file';
                $file->move($tujuan_upload,$filename);
                $data = new Portfolio();
                $data->title = $request->title;
                $data->deskripsi = $content;
                $data->category_id = $request->category_id;
                $data->url = $request->url; 
                $data->image = $filename;            
                $data->save();           
                return redirect('/admin/portfolio')->with('success','Data Berhasil di Simpan');
           
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
        $judul = 'Portfolio Show';
        $generals = General::find(1);
        $portfolios = Portfolio::find($id);
        $categoryportfolios = Categoryportfolio::all();
        return view('back.portfolio.show', compact('judul', 'generals', 'categoryportfolios', 'portfolios'));//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $judul = 'Portfolio Edit';
        $generals = General::find(1);
        $portfolios = Portfolio::find($id);
        $categoryportfolios = Categoryportfolio::all();
        return view('back.portfolio.edit', compact('judul', 'generals', 'categoryportfolios', 'portfolios'));
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
  
        foreach($imageFile as $item => $image){
            $data = $img->getAttribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $imgeData = base64_decode($data);
            $image_name= 'upload_file' . time().$item.'.png';
            $path = public_path() . $image_name;
            file_put_contents($path, $imgeData);
            
            $image->removeAttribute('src');
            $image->setAttribute('src', $image_name);
         }
  
        $content = $dom->saveHTML();
        
        if (!$file = $request->file('image')) {
            $data = Portfolio::where('id','=', $request->id)->first();
            $data->title = $request->title;
            $data->deskripsi = $content;
            $data->category_id = $request->category_id;
            $data->url = $request->url;            
            $data->save();           
            return redirect('/admin/portfolio')->with('success','Data Berhasil di Simpan');
       
        } else {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $filename = $name;  
            $tujuan_upload = 'data_file';
            $file->move($tujuan_upload,$filename);
            $data = Portfolio::where('id','=', $request->id)->first();
            $data->title = $request->title;
            $data->deskripsi = $content;
            $data->category_id = $request->category_id;
            $data->url = $request->url; 
            $data->image = $filename;            
            $data->save();           
            return redirect('/admin/portfolio')->with('success','Data Berhasil di Simpan');
       
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Portfolio::find($id);
        $data->delete($data);
        return redirect('/admin/portfolio')->with('success', 'Data Berhasil Dihapus');
    }

    public function publish($id)
    {       
        $portfolios = Portfolio::find($id);
        $portfolios->is_published = !$portfolios->is_published;
        $portfolios->save();  
        return redirect('/admin/portfolio');
    }
}
