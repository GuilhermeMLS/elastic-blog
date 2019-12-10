<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;
use App\Services\PostService;
use Exception;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PostController extends Controller
{
    /**
     * @var PostService
     */
    private $postService;

    /**
     * PostController constructor.
     * @param PostService $postService
     */
    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }


    /**
     * @return AnonymousResourceCollection
     * @throws Exception
     */
    public function index()
    {
        $posts = $this->postService->all();

        return PostResource::collection($posts);
    }

    /**
     * @param $id
     * @return PostResource
     * @throws Exception
     */
    public function show($id)
    {
        $post = $this->postService->find($id);

        return new PostResource($post);
    }

    /**
     * @param PostRequest $request
     * @return PostResource
     * @throws Exception
     */
    public function store(PostRequest $request)
    {
        $post = $this->postService->store($request->all());

        return new PostResource($post);
    }

    /**
     * @param PostRequest $request
     * @param $id
     * @return PostResource
     * @throws Exception
     */
    public function update(PostRequest $request, $id)
    {
        $post = $this->postService->update($request->all(), $id);

        return new PostResource($post);
    }

    /**
     * @param $id
     * @return PostResource
     * @throws Exception
     */
    public function destroy($id)
    {
        $post = $this->postService->destroy($id);

        return new PostResource($post);
    }
}
