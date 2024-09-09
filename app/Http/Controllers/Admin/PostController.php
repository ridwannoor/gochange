<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\General;
use App\Models\Post;
use App\Models\Categorypost;
use App\Models\Commentpost;
use App\Models\Tagpost;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $judul = 'Artikel';
        $generals = General::find(1);
        $posts = Post::all();
        $tagposts = Tagpost::all();
        $categoryposts = Categorypost::all();
        return view('back.post.index', compact('judul', 'generals', 'posts', 'tagposts', 'categoryposts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $judul = 'Artikel Create';
        $generals = General::find(1);
        $categoryposts = Categorypost::all();
        $tagposts = Tagpost::all();
        // $categoryposts = Categorypost::all();
        return view('back.post.create', compact('judul', 'generals', 'categoryposts', 'tagposts'));
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
        $spons = post::where('title',$name)->first();

        if ($spons) {           
            return redirect('/admin/post/create')->with('message','Data Sudah Ada');
            
        }
        else{
            if (!$file = $request->file('image')) {
                $data = new post();
                $data->title = $request->title;
                $data->deskripsi = $request->deskripsi;             
                $data->category_id = $request->category_id;
                $data->url = $request->url;            
                $data->save();      
                $data->tagposts()->attach($request->tagpost_id);
     
                return redirect('/admin/post')->with('success','Data Berhasil di Simpan');
           
            } else {
                $file = $request->file('image');
                $name = $file->getClientOriginalName();
                $filename = $name;  
                $tujuan_upload = 'data_file';
                $file->move($tujuan_upload,$filename);
                $data = new post();
                $data->title = $request->title;
                $data->deskripsi = $request->deskripsi;             
                $data->category_id = $request->category_id;
                $data->url = $request->url; 
                $data->image = $filename;            
                $data->save();           
                $data->tagposts()->attach($request->tagpost_id);
     
                return redirect('/admin/post')->with('success','Data Berhasil di Simpan');
           
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
        $judul = 'Artikel Show';
        $generals = General::find(1);
        $posts = post::find($id);
        $categoryposts = Categorypost::all();
        $tagposts = Tagpost::all();
        return view('back.post.show', compact('judul', 'generals', 'categoryposts', 'tagposts', 'posts'));//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $judul = 'Artikel Edit';
        $generals = General::find(1);
        $posts = post::find($id);
        $categoryposts = Categorypost::all();
        $tagposts = Tagpost::pluck('title', 'id')->all(); 
        return view('back.post.edit', compact('judul', 'generals', 'categoryposts', 'posts', 'tagposts'));
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
            $data = post::where('id','=', $request->id)->first();
            $data->title = $request->title;
            $data->deskripsi = $request->deskripsi;         
            $data->category_id = $request->category_id;
            $data->url = $request->url;            
            $data->save();           
            $data->tagposts()->sync($request->tagposts);
            return redirect('/admin/post')->with('success','Data Berhasil di Simpan');
       
        } else {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $filename = $name;  
            $tujuan_upload = 'data_file';
            $file->move($tujuan_upload,$filename);
            $data = post::where('id','=', $request->id)->first();
            $data->title = $request->title;
            $data->deskripsi = $request->deskripsi;         
            $data->category_id = $request->category_id;
            $data->url = $request->url; 
            $data->image = $filename;            
            $data->save();           
            $data->tagposts()->sync($request->tagposts);
            return redirect('/admin/post')->with('success','Data Berhasil di Simpan');
       
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
        $data = post::find($id);
        // $data->categorypost->delete();
        $data->tagposts()->detach();      
        $data->comment()->delete();          
        $data->delete($data);
        return redirect('/admin/post')->with('success', 'Data Berhasil Dihapus');
    }

    public function publish($id)
    {       
        $posts = post::find($id);
        $posts->is_published = !$posts->is_published;
        $posts->save();  
        return redirect('/admin/post');
    }

    public function fileUpload(Request $request)
    {
        $this->validate($request, [
             'title' => 'required',
             'deskripsi' => 'required',
             'categorypost_id' => 'required'

        ]);
 
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
        $data = new post();
        $data->title = $request->title;
        $data->deskripsi = $content;
        $data->categorypost_id = $request->categorypost_id;
        $data->url = $request->url;            
        $data->save();      
        $data->tagposts()->attach($request->tagposts);

        // dd($content);
   
        // dd($data);
        return redirect('/admin/post')->with('success','Data Berhasil di Simpan');
   
        } else {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $filename = $name;  
            $tujuan_upload = 'data_file';
            $file->move($tujuan_upload,$filename);
            $data = new post();
            $data->title = $request->title;
            $data->deskripsi = $content;
            $data->categorypost_id = $request->categorypost_id;
            $data->url = $request->url; 
            $data->image = $filename;            
            $data->save();           
            $data->tagposts()->attach($request->tagposts);
            // dd($content);
            return redirect('/admin/post')->with('success','Data Berhasil di Simpan');
    
        }
    }

    public function updatefileUpload(Request $request)
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
            $data = post::where('id','=', $request->id)->first();
            $data->title = $request->title;
            $data->deskripsi = $content;
            $data->categorypost_id = $request->categorypost_id;
            $data->url = $request->url;            
            $data->save();           
            $data->tagposts()->sync($request->tagposts);
            return redirect('/admin/post')->with('success','Data Berhasil di Simpan');
       
        } else {
            $name = $file->getClientOriginalName();
            $filename = $name;  
            $tujuan_upload = 'data_file';
            $file->move($tujuan_upload,$filename);

            $data = post::where('id','=', $request->id)->first();
            $data->title = $request->title;
            $data->deskripsi = $content;
            $data->categorypost_id = $request->categorypost_id;
            $data->url = $request->url; 
            $data->image = $filename;            
            $data->save();           
            $data->tagposts()->sync($request->tagposts);
            return redirect('/admin/post')->with('success','Data Berhasil di Simpan');
       
        }
    }

   
}
