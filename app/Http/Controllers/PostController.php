<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Storage::get('posts.txt');
        $posts = explode("\n", $posts);
        // dd($posts);
        // var_dump($posts);
        // exit;
        $view_data = [
            'posts' => $posts
        ];
        return view('posts.index', $view_data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $posts = Storage::get('posts.txt');
        $posts = explode("\n", $posts);
        $selected_post = [];
        foreach ($posts as $post) {
            $post = explode(",", $post);
            if ($post[0] == $id) {
                $selected_post = $post;
            }
        }

        $view_data = [
            'post' => $selected_post
        ];
        return view("posts.show", $view_data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
