<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return Post::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password'  => 'required',
            'email' => 'required'
        ]);

        $post = Post::create([
            'username' => $request->username,
            'password'  => bcrypt($request->password),
            'email' => $request->email
        ]);

        return response()->json($post, 201);
    }

    public function show(string $id)
    {
        $post = Post::find($id);

    if (!$post) {
        return response()->json(['message' => 'ไม่พบข้อมูลดังกล่าว'], 404);
    }

    return response()->json($post);
    }

    public function update(Request $request, string $id)
    {
        $post = Post::findOrFail($id);
        $post->update($request->only(['username', 'password','email']));
        return response()->json($post);
    }

    public function destroy(string $id)
    {
        Post::destroy($id);
        return response()->json(['message' => 'Deleted']);
    }
}
