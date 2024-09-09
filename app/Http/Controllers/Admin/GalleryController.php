<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\General;
use App\Models\Gallery;
use App\Models\Categorygallery;

class GalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $judul = 'Gallery';
        $generals = General::find(1);
        $gallerys = Gallery::all();
        return view('back.gallery.index', compact('judul', 'generals', 'gallerys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $judul = 'Gallery Create';
        $generals = General::find(1);
        $categorygallerys = Categorygallery::all();
        return view('back.gallery.create', compact('judul', 'generals', 'categorygallerys'));
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
        $spons = Gallery::where('title',$name)->first();

        if ($spons) {           
            return redirect('/admin/gallery/create')->with('message','Data Sudah Ada');
            
        }
        else{
            if (!$file = $request->file('image')) {

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

                $data = new Gallery();
                $data->title = $request->title;
                $data->deskripsi = $content;
                $data->category_id = $request->category_id;
                $data->url = $request->url;            
                $data->save();           
                return redirect('/admin/gallery')->with('success','Data Berhasil di Simpan');
           
            } else {
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

                $file = $request->file('image');
                $name = $file->getClientOriginalName();
                $filename = $name;  
                $tujuan_upload = 'data_file';
                $file->move($tujuan_upload,$filename);
                $data = new Gallery();
                $data->title = $request->title;
                $data->deskripsi = $content;
                $data->category_id = $request->category_id;
                $data->url = $request->url; 
                $data->image = $filename;            
                $data->save();           
                return redirect('/admin/gallery')->with('success','Data Berhasil di Simpan');
           
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
        $judul = 'Gallery Show';
        $generals = General::find(1);
        $gallerys = Gallery::find($id);
        $categorygallerys = Categorygallery::all();
        return view('back.gallery.show', compact('judul', 'generals', 'categorygallerys', 'gallerys'));//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $judul = 'Gallery Edit';
        $generals = General::find(1);
        $gallerys = Gallery::find($id);
        $categorygallerys = Categorygallery::all();
        return view('back.gallery.edit', compact('judul', 'generals', 'categorygallerys', 'gallerys'));
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
        if (!$file = $request->file('image')) {
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

            $data = Gallery::where('id','=', $request->id)->first();
            $data->title = $request->title;
            $data->deskripsi = $content;
            $data->category_id = $request->category_id;
            $data->url = $request->url;            
            $data->save();           
            return redirect('/admin/gallery')->with('success','Data Berhasil di Simpan');
       
        } else {
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

            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $filename = $name;  
            $tujuan_upload = 'data_file';
            $file->move($tujuan_upload,$filename);
            $data = Gallery::where('id','=', $request->id)->first();
            $data->title = $request->title;
            $data->deskripsi = $content;
            $data->category_id = $request->category_id;
            $data->url = $request->url; 
            $data->image = $filename;            
            $data->save();           
            return redirect('/admin/gallery')->with('success','Data Berhasil di Simpan');
       
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
        $data = Gallery::find($id);
        $data->delete($data);
        return redirect('/admin/gallery')->with('success', 'Data Berhasil Dihapus');
    }

    public function publish($id)
    {       
        $gallerys = Gallery::find($id);
        $gallerys->is_published = !$gallerys->is_published;
        $gallerys->save();  
        return redirect('/admin/gallery');
    }
}
