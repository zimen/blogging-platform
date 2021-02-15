<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Resources\PostCollection;
use App\Http\Resources\PostResource;
use Carbon\Carbon;

use App\Http\Requests\PostRequest;

class PostController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $eloquentObject = new Post();
        if ($request->routeIs('myposts')) {
            $eloquentObject = $eloquentObject->where('author_id', auth()->guard('api')->user()->id);
        }
        if ($request->has('q')) {
            $eloquentObject = $eloquentObject->where('title', 'like', '%' . $request['q'] . '%')->orWhere('description', 'like', '%' . $request->get('q') . '%');
        }
        if ($request->filled('from') && $request->filled('to')) {
            $from = \date($request->get('from'));
            $to = \date($request->get('to'));
            $eloquentObject = $eloquentObject->whereBetween('publication_date', [$from, $to]);
        }
        $posts = $eloquentObject->orderBy('publication_date', 'desc')->paginate();
        return new PostCollection($posts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request) {
        $data = $request->only('title', 'description');
        $data['publication_date'] = Carbon::now();
        $data['author_id'] = auth()->guard('api')->user()->id;
        $post = Post::create($data);
        return new PostResource($post);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post) {
        //
    }

}
