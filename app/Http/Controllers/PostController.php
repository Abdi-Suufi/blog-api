<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index()
    {
        return response()->json(Post::all(), 200);
    }

    //The store method is used to create a new post
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $post = Post::create($request->all());
        return response()->json($post, 201);
    }

    //The show method is used to display a specific post
    public function show($id)
    {
        $post = Post::find($id);
        if (is_null($post)) {
            return response()->json(['message' => 'Post not found'], 404);
        }
        return response()->json($post, 200);
    }

    //The update method is used to update a post
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'sometimes|required|string|max:255',
            'content' => 'sometimes|required|string',
            'author' => 'sometimes|required|string|max:255',
        ]);

        if ($validator->fails()) { //if statement to check if the validation just above fails
            return response()->json($validator->errors(), 400);
        }

        $post = Post::find($id);
        if (is_null($post)) {
            return response()->json(['message' => 'Post not found'], 404);
        }

        $post->update($request->all());
        return response()->json($post, 200);
    }

    //The destroy method is used to delete a post
    public function destroy($id)
    {
        $post = Post::find($id);
        if (is_null($post)) { //if statement to check if the post exists
            return response()->json(['message' => 'Post not found'], 404);
        }

        $post->delete(); //Otherwise deletes the post
        return response()->json(['message' => 'Post deleted successfully'], 204);
    }
}