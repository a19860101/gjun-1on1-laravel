<?php

namespace App\Http\Controllers;

use App\Models\Post;
// use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use DB;
use Str;
use Storage;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $this->authorize('viewAny',Post::class);
        // if($request->user() == null){
        //     abort(403);
        // }
        if($request->user()->cannot('viewAny',Post::class)
        ){
            abort(403);
        }
        

        $text = '<h1>test</h1>';

        //
        // $posts = DB::select('SELECT * FROM posts');

        // $posts = DB::table('posts')->get();

        $posts = Post::get();
        // return view('post.index')->with(['qq' => '123']);
        // return view('post.index',['qq' => '123']);
        // $qq = 123;
        // return view('post.index',['qq'=>$qq]);
        // return view('post.index',compact('qq'));
        return view('post.index')->with(['posts' => $posts,'text'=>$text]);
        // return view('post.index',['datas' => $posts]);
        // return view('post.index',compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = \App\Models\Category::get();
        return view('post.create',compact('categories'));
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
        
        // return $request->file('cover')->store('images','public');
       

        $request->validate([
            'title' => ['required'],
            'body' => ['required']
        ]);

        // return $request;
        // DB::insert('INSERT INTO posts(title,body,created_at,updated_at)VALUES(?,?,?,?)',[
        //     $request->title,
        //     $request->body,
        //     now(),
        //     now()
        // ]);

        // DB::table('posts')->insert([
        //     'title'     => $request->title,
        //     'body'      => $request->body,
        //     'created_at'=>now(),
        //     'updated_at'=>now()
        // ]);

        // $post = new Post;
        // $post->title = $request->title;
        // $post->body = $request->body;
        // $post->save();
        if( $request->file('cover')){

            $ext = $request->file('cover')->getClientOriginalExtension();
            $cover_name = Str::uuid();
            $final_name = $cover_name.'.'.$ext;
            $request->file('cover')->storeAs('images',$final_name,'public');
        }else{
            $final_name = null;
        }
        

        $post = new Post;
        $post->fill($request->all());
        $post->cover = $final_name;
        $post->user_id = Auth::id();
        $post->save();

        $tags = explode(',',$request->tag);
        foreach($tags as $tag){
            $tagModel = Tag::firstOrCreate(['title' => $tag]);
            $post->tags()->attach($tagModel);
        }

        // Post::create($request->all());
        return redirect('/post');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,Post $post)
    {
        // if($request->user()->cannot('view',$post)){
        //     abort(403);
        // }
                //
        // $post = DB::select('select * from posts where id = ?',[$post]);
        // $post = DB::table('posts')->where('id',$post)->get();
        // $post = DB::table('posts')->find($post);
        // $post = Post::find($post);

        // return $post;

        return view('post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        return view('post.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        if ($request->user()->cannot('update',$post)) {
            abort(403);
        }
        //
        // DB::update('update posts set title=?,body=?,updated_at=? where id = ?',[
        //     $request->title,
        //     $request->body,
        //     now(),
        //     $post->id
        // ]);

        // DB::table('posts')->update([
        //     'title'     => 
        // ]);

        $post->fill($request->all());
        $post->save();
        $post->tags()->detach();
        $tags = explode(',',$request->tag);
        foreach($tags as $tag){
            $tagModel = Tag::firstOrCreate(['title' => $tag]);
            $post->tags()->attach($tagModel);
        }
        return redirect()->route('post.show',$post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
        // Storage::disk('public')->delete('/images/'.$post->cover);
        // DB::delete('DELETE FROM posts WHERE id = ?',[$post->id]);
        // DB::table('posts')->where('id',$post->id)->delete();
        $post->delete();
        // Post::destroy($post->id);

        // return redirect('/post');
        return redirect()->route('post.index');
    }

}
