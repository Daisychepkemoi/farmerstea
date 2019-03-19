<?php

namespace App\Http\Controllers;

use App\Posts;
use App\Comments;
use App\Event;
use App\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Pagination\Paginator;
use PDF;
use DB;


class PostsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth')->except(['search', 'blog','postid']);
       
    }
    public function email()
    {
        
        Mail::send(new NewEvent($event));
        return redirect('/admin/createevents');
    }
    public function down()
    {
        $data = ['hhahh'];
      $pdf = PDF::loadView('submit',$data) ;       
        return $pdf->download( 'submit.pdf');
    }
     public function backa()
    {
        return redirect()->back();
    }

     public function search()
    {
    $q =  request( 'q' );
    $user = Posts::where('title','LIKE','%'.$q.'%')->orWhere('body','LIKE','%'.$q.'%')->get();
    $event = Event::where('title','LIKE','%'.$q.'%')->orWhere('body','LIKE','%'.$q.'%')->get();
    $count = $user->count();
                          $nots = Notification::latest()->paginate(3);

    // dd($count);
    if((count($user) || count($event) ) > 0)
        // $count = 
        return view('welcome',compact('user','count','nots','event'));
    else return view ('welcome',compact('user','count','nots'))->withMessage('No Details found. Try to search again with different parameters !');

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
    return redirect('/createpost')->with('success','Post posted successfully...');

    // return view('image',compact('book','posts'))
        // ->with('success','Book added successfully...');
    }

    public function postid($id)
    {
        $posts = Posts::find($id);
        $nots = Notification::latest()->paginate(3);

        // $comments = Comments::where('post_id',$id)->orderBy('created_at','DESC')->get();
        $comments = DB::table('users')->join('comments','users.id','=','comments.user_id')->where('comments.post_id',$id)->select('users.f_name','users.l_name','comments.*','comments.created_at as come')->orderBy('comments.created_at', 'desc')->get();
       
        return view('postid',compact('posts','comments','nots','joins'));
    }
      public function commentstore(Request $request,$id)
    {
     $user = auth()->user();

     $posts = Posts::find($id);
     if($posts == null){
            return view('postid',compact('posts','comments','nots','user'));

     }
    $comment = new Comments();
    $comment->user_id = $user->id;

    $comment->body = request('body'); //
    $comment->post_id = $posts->id;
    $comment->save();
    // $comments = Comments::where('post_id',$id)->orderBy('created_at','DESC')->get();
    $comments = DB::table('users')->join('comments','users.id','=','comments.user_id')->where('comments.post_id', $id)->select('users.f_name','users.l_name','comments.*','comments.created_at as come')->get();
    return view('postid',compact('posts','comments','nots','user'));

    }

   
}
