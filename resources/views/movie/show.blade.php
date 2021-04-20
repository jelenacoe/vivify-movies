@extends('layouts.app')

@section('title', $post->title)

@section('content')
<h2>{{$movie->title}}</h2>
<p>{{$movie->body}}</p>
<h5>Comments</h5>
<ul>
  @forelse($movie->comments as $comment)
    <li>{{$comment->body}}</li>
  @empty
    <span>No comments</span>
  @endforelse
</ul>
@endsection