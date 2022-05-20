<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
        <p class="edit">[<a href="/posts/{{ $post->id }}/edit">編集する</a>]</p>
        <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post" style="display:inline">
        @csrf
        @method('DELETE')
        <button type="submit">delete</button> 
        </form>
        
    <form class="mb-4" method="POST" action="{{ route('comment.store') }}">
    @csrf
 
    <input
        name="post_id"
        type="hidden"
        value="{{ $post->id }}"
    >
 
    <div class="form-group">
        <label for="subject">
        名前
        </label>
 
 <input
            id="name"
            name="name"
            class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
            value="{{ old('name') }}"
            type="text"
        >
        @if ($errors->has('name'))
         <div class="invalid-feedback">
         {{ $errors->first('name') }}
         </div>
        @endif
    </div>
 
    <div class="form-group">
     <label for="body">
     本文
     </label>
 
        <textarea
            id="comment"
            name="comment"
            class="form-control {{ $errors->has('comment') ? 'is-invalid' : '' }}"
            rows="4"
        >{{ old('comment') }}</textarea>
        @if ($errors->has('comment'))
         <div class="invalid-feedback">
         {{ $errors->first('comment') }}
         </div>
        @endif
    </div>
 
    <div class="mt-4">
     <button type="submit" class="btn btn-primary">
     コメントする
     </button>
    </div>
</form>
 
@if (session('commentstatus'))
    <div class="alert alert-success mt-4 mb-4">
     {{ session('commentstatus') }}
    </div>
@endif
    </head>
    <body>
        <h1 class="title">
            {{ $post->title }}
        </h1>
        <div class="content">
            <div class="content__post">
                <h3>本文</h3>
                <p>{{ $post->body }}</p>    
            </div>
            <div class=content_comment>
                <h3>コメント</h3>
                @foreach($comments as $comment)
                <p class='name'>{{ $comment->name }}</p>
                <p2 class='comment'>{{ $comment->comment }}</p2>
                @endforeach
            </div>
        <div class="footer">
            
            <a href="/">戻る</a>
        </div>
    </body>
</html>