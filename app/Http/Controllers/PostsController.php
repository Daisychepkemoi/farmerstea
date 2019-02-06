<?php

namespace App\Http\Controllers;

use App\Posts;
use App\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Pagination\Paginator;


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        $posts = Posts::orderby('created_at','DESC')->paginate(15);
        // dd($posts);
        return view('welcome',compact('posts'))->with('success','Book added successfully...');
    }
    # app/Http/Controllers/BookController.php
public function store(Request $request)
{
    
    $cover = $request->file('bookcover');
    $extension = $cover->getClientOriginalExtension();
    Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));

    $book = new Posts();
    // $book->name = $request->name;
    // $book->author = $request->author;
    $book->mime = $cover->getClientMimeType();
    $book->original_filename = $cover->getClientOriginalName();
    $book->filename = $cover->getFilename().'.'.$extension;
    $book->save();

    return view('image',compact('book'))
        ->with('success','Book added successfully...');
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postid($id)
    {
        $posts = Posts::find($id);
        $comments = Comments::where('post_id',$id)->orderBy('created_at','DESC')->get();
        return view('postid',compact('posts','comments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function show(Posts $posts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function edit(Posts $posts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Posts $posts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Posts $posts)
    {
        //
    }
}
