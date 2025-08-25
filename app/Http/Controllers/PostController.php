<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        // This auto-calls the right policy method per action
        $this->authorizeResource(Post::class, 'post');
    }

    public function index()
    {
        return Post::with('user:id,name')->latest()->get();
    }

    public function store(Request $request)
    {
        // Policy: create() checked automatically before this runs
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'body'  => 'nullable|string',
        ]);

        $post = $request->user()->posts()->create($data);
        return response()->json($post, 201);
    }

    public function show(Post $post)
    {
        return $post->load('user:id,name');
    }

    public function update(Request $request, Post $post)
    {
        // Policy: update() checked automatically
        $data = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'body'  => 'nullable|string',
        ]);

        $post->update($data);
        return response()->json($post);
    }

    public function destroy(Post $post)
    {
        // Policy: delete() checked automatically
        $post->delete();
        return response()->noContent();
    }
}
