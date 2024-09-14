<?php

namespace App\Http\Controllers;

use App\Mail\BlogPosted;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::check()) {
            return redirect("login")->with("error_message", "Silakan login dahulu");
        }

        // menampilkan data yang sudah soft deletes
        // $posts = Post::active()->withTrashed()->get();
        $posts = Post::active()->get();
        $view_data = [
            "posts" => $posts
        ];
        // return response($view_data);
        return view('posts.index', $view_data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth::check()) {
            return redirect("login")->with("error_message", "Silakan login dahulu");
        }

        return view("posts.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect("login")->with("error_message", "Silakan login dahulu");
        }

        $title = $request->input("title");
        $content = $request->input("content");

        $post = Post::create([
            "title" => $title,
            "content" => $content
        ]);

        Mail::to(Auth::user()->email)->send(new BlogPosted($post));

        return redirect(to: "posts");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (!Auth::check()) {
            return redirect("login")->with("error_message", "Silakan login dahulu");
        }

        // $post = DB::table("posts")->select("id", "title", "content", "created_at")->where("id", "=", $id)->first();
        $post = Post::where("id", $id)->first();
        $comments = $post->comments()->get();
        $total_comments = $post->total_comments();

        $view_data = [
            'post' => $post,
            "comments" => $comments,
            "total_comments" => $total_comments
        ];
        return view("posts.show", $view_data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (!Auth::check()) {
            return redirect("login")->with("error_message", "Silakan login dahulu");
        }

        // $post = DB::table("posts")->select("id", "title", "content", "created_at")->where("id", "=", $id)->first();
        $post = Post::where("id", $id)->first();

        $view_data = [
            'post' => $post
        ];

        return view("posts.edit", $view_data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (!Auth::check()) {
            return redirect("login")->with("error_message", "Silakan login dahulu");
        }

        $title = $request->input("title");
        $content = $request->input("content");

        // DB::table("posts")->where("id", $id)->update([
        //     "title" => $title,
        //     "content" => $content,
        //     "updated_at" => date("Y-m-d H:i:s")
        // ]);
        Post::where("id", $id)->update([
            "title" => $title,
            "content" => $content,
            "updated_at" => date("Y-m-d H:i:s")
        ]);

        return redirect("/posts/$id");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!Auth::check()) {
            return redirect("login")->with("error_message", "Silakan login dahulu");
        }

        // DB::table("posts")->where("id", "=", $id)->delete();
        Post::where("id", $id)->delete();

        return redirect("/posts");
    }
}
