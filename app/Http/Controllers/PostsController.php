<?php

namespace App\Http\Controllers;

use App\Posts;
use App\Comments;
use App\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Pagination\Paginator;


class PostsController extends Controller
{
    
    public function __construct()
    {
        // $this->middleware('auth');
       
    }
    public function post()
    {
        $posts = Posts::orderby('created_at','DESC')->paginate(3);
         $user = auth()->user();
         $notcount = Notification::get()->count();
        return view('agent.blog',compact('posts','user','posts','notcount'))->with('success','Book added successfully...');
    }
    public function store(Request $request)
    {
     $user = auth()->user();

    $cover = $request->file('image');
    $extension = $cover->getClientOriginalExtension();
    Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));

    $book = new Posts();
    $book->title = $request->title;
    // $book->author = $request->author;
    $book->created_by = $user->f_name;
    $book->body = request('body'); //
    $book->image = $cover->getFilename().'.'.$extension; //filename
    $book->save();
    // dd($book);
    $posts = Posts::get();
    return redirect('/createpost');

    // return view('image',compact('book','posts'))
        // ->with('success','Book added successfully...');
    }

    public function postid($id)
    {
        $posts = Posts::find($id);
        $comments = Comments::where('post_id',$id)->orderBy('created_at','DESC')->get();
        return view('postid',compact('posts','comments'));
    }

   
}
