<!DOCTYPE html>
<html>
<head>
    <title>image</title>
</head>
<body>
   {{-- # resources/views/books/show.blade.php --}}
{{-- ... --}}

<div class="col-md-6 offset-md-3 bk-desc">
    <div class="card">
        @foreach($posts as $post)
        <img class="card-img-top" src="{{url('uploads/'.$post->image)}}" alt="{{$post->image}}" style="width: 100px; height: 100px;">
        <div class="card-body">
            <p class="card-text">
                <h4>    {{$post->title}}</h4>
                <p> {{$post->body}}</p>
            </p>
            <a href="/welcome" class="btn btn-dark">Back</a>
        </div>
    </div>
    @endforeach
</div>
</div>
</body>
</html>

