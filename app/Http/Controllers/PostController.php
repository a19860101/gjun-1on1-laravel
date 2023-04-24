<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $posts = DB::select('SELECT * FROM posts');

        // $posts = DB::table('posts')->get();

        $posts = Post::get();
        // return view('post.index')->with(['qq' => '123']);
        // return view('post.index',['qq' => '123']);
        // $qq = 123;
        // return view('post.index',['qq'=>$qq]);
        // return view('post.index',compact('qq'));
        return view('post.index')->with(['posts' => $posts]);
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
        return view('post.create');
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

        $post = new Post;
        $post->fill($request->all());
        $post->save();

        // Post::create($request->all());
        
        return redirect('/post');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
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
        //
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
    }

    public function one($id){
        // DB::select('select * from posts where id = ?',[$id]);
        // DB::table('posts')->find($id);
        // Post::find($id);
    }
}
