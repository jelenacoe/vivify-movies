<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CreatePostRequest;

class PostController extends Controller
{
  public function index()
  {
    DB::listen(function ($query) { // callback which is called for each query executed in this method
      info($query->sql); // print sql into storage/logs/laravel.log file
    });
    $movies= movie::published()
      ->orderBy('title')
      ->get();
    return view('movie.index', compact('movies'));
  }

  public function show(Movie $movie)
  {
    if (!$movie->is_published) {
      throw new ModelNotFoundException();
    }
    // $comments = Comment::where('post_id', $post->id)->get();

    return view('movie.show', compact('movie'));
  }

  public function create()
  {
    return view('movie.create');
  }

  public function store(CreatePostRequest $request)
  {
    

    $data = $request->validated();
    $newMovie = Movie::create($data);

    return redirect('/movies');
  }
}