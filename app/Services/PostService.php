<?php

namespace App\Services;

use App\Post;
use App\User;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class PostService {
    /**
     * @return Post[]|Collection
     * @throws Exception
     */
    public function all()
    {
        try {
            $posts = Post::all();
        } catch (Exception $e) {
            throw new Exception($e);
        }

        return $posts;
    }

    /**
     * @param $id
     * @return mixed
     * @throws Exception
     */
    public function find($id)
    {
        try {
            $post = Post::findOrFail($id);
        } catch (Exception $e) {
            throw new Exception($e);
        }

        return $post;
    }

    /**
     * @param $data
     * @return mixed
     * @throws Exception
     */
    public function store($data)
    {
        try {
            $post = new Post();
            $post->fill($data);

            Auth::user()
                ? $post->user_id = Auth::user()->id
                : $post->user_id = User::first()->id;

            $post->save();
        } catch (Exception $e) {
            throw new Exception($e);
        }

        return $post;
    }

    /**
     * @param $data
     * @param $id
     * @return mixed
     * @throws Exception
     */
    public function update($data, $id)
    {
        try {
            $post = Post::findOrFail($id);
            $post->fill($data);
            $post->save();
        } catch (Exception $e) {
            throw new Exception($e);
        }

        return $post;
    }

    /**
     * @param $id
     * @return mixed
     * @throws Exception
     */
    public function destroy($id)
    {
        try {
            $post = Post::findOrFail($id);
            $post->delete();
        } catch (Exception $e) {
            throw new Exception($e);
        }

        return $post;
    }
}
