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
        $this->middleware('auth');
       
    }
     public function search()
    {
    $q =  request( 'q' );
    $user = Posts::where('title','LIKE','%'.$q.'%')->orWhere('body','LIKE','%'.$q.'%')->get();
    $count = $user->count();
                          $nots = Notification::latest()->paginate(3);

    // dd($count);
    if(count($user) > 0)
        // $count = 
        return view('welcome',compact('user','count','nots'));
    else return view ('welcome',compact('user','count','nots'))->withMessage('No Details found. Try to search again !');

 }
    public function blog()
    {
        $posts = Posts::orderby('created_at','DESC')->paginate();
         $user = auth()->user();
         $notcount = Notification::get()->count();
                          $nots = Notification::latest()->paginate(3);

        return view('posts.posts',compact('posts','user','posts','notcount','nots'))->with('success','Book added successfully...');
    }
    public function post()
    {
        $posts = Posts::orderby('created_at','DESC')->paginate(3);
         $user = auth()->user();
         $notcount = Notification::get()->count();
                          $nots = Notification::latest()->paginate(3);

        return view('agent.blog',compact('posts','user','posts','notcount','nots'))->with('success','post created successfully...');
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
                          $nots = Notification::latest()->paginate(3);

        $comments = Comments::where('post_id',$id)->orderBy('created_at','DESC')->get();
        return view('postid',compact('posts','comments','nots'));
    }

   
}
