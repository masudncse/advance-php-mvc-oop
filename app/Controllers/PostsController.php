<?php

namespace App\Controllers;

use App\Post;

class PostsController
{
    /**
     * @return mixed
     * @throws \Exception
     */
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::all()
        ]);
    }

    /**
     * @return mixed
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * @throws \Exception
     */
    public function store()
    {
        $postId = Post::create([
            'title' => $_POST['title'],
            'body' => $_POST['body']
        ]);

        return redirect()->route('posts.show', [
            'post' => $postId
        ]);
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function edit()
    {
        return view('posts.edit', [
            'post' => Post::find($_GET['post'])
        ]);
    }

    /**
     * @throws \Exception
     */
    public function update()
    {
        $post = Post::find($_GET['post']);

        $post->update([
            'title' => $_POST['title'],
            'body' => $_POST['body']
        ]);

        return redirect()->route('posts.show', [
            'post' => $post->id
        ]);
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function show()
    {
        return view('posts.show', [
            'post' => Post::find($_GET['post'])
        ]);
    }

    /**
     * @throws \Exception
     */
    public function destroy()
    {
        Post::find($_GET['post'])->delete();

        return redirect()->route('/');
    }
}
