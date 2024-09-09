<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\General;
use App\Models\Video;
use App\Models\Categoryvideo;

class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $judul = 'Video';
        $generals = General::find(1);
        $videos = Video::all();
        return view('back.video.index', compact('judul', 'generals', 'videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $judul = 'Video Create';
        $generals = General::find(1);
        $categoryvideos = Categoryvideo::all();
        return view('back.video.create', compact('judul', 'generals', 'categoryvideos'));
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
        $spons = Video::where('title',$name)->first();

        if ($spons) {           
            return redirect('/admin/video/create')->with('message','Data Sudah Ada');
            
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

                $data = new Video();
                $data->title = $request->title;
                $data->deskripsi = $content;
                $data->categoryvideo_id = $request->categoryvideo_id;
                $data->url = $request->url;            
                $data->save();           
                return redirect('/admin/video')->with('success','Data Berhasil di Simpan');
           
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
                $data = new Video();
                $data->title = $request->title;
                $data->deskripsi = $content;
                $data->categoryvideo_id = $request->categoryvideo_id;
                $data->url = $request->url; 
                $data->image = $filename;            
                $data->save();           
                return redirect('/admin/video')->with('success','Data Berhasil di Simpan');
           
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
        $judul = 'Video Show';
        $generals = General::find(1);
        $videos = Video::find($id);
        $categoryvideos = Categoryvideo::all();
        return view('back.video.show', compact('judul', 'generals', 'categoryvideos', 'videos'));//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $judul = 'Video Edit';
        $generals = General::find(1);
        $videos = Video::find($id);
        $categoryvideos = Categoryvideo::all();
        return view('back.video.edit', compact('judul', 'generals', 'categoryvideos', 'videos'));
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
            $data = Video::where('id','=', $request->id)->first();
            $data->title = $request->title;
            $data->deskripsi = $content;
            $data->categoryvideo_id = $request->categoryvideo_id;
            $data->url = $request->url;            
            $data->save();           
            return redirect('/admin/video')->with('success','Data Berhasil di Simpan');
       
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
            $data = Video::where('id','=', $request->id)->first();
            $data->title = $request->title;
            $data->deskripsi = $content;
            $data->categoryvideo_id = $request->categoryvideo_id;
            $data->url = $request->url; 
            $data->image = $filename;            
            $data->save();           
            return redirect('/admin/video')->with('success','Data Berhasil di Simpan');
       
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
        $data = Video::find($id);
        $data->delete($data);
        return redirect('/admin/video')->with('success', 'Data Berhasil Dihapus');
    }

    public function publish($id)
    {       
        $videos = Video::find($id);
        $videos->is_published = !$videos->is_published;
        $videos->save();  
        return redirect('/admin/video');
    }
}
