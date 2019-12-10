<?php

namespace App\Observers;

use App\Post;
use Elasticsearch\Client;

class PostObserver
{
    /** @var Client */
    private $elasticsearch;

    public function __construct(Client $elasticsearch)
    {
        $this->elasticsearch = $elasticsearch;
    }

    /**
     * Handle the post "created" event.
     *
     * @param Post $post
     * @return void
     */
    public function created(Post $post)
    {
        $this->elasticsearch->index([
            'index' => $post->getSearchIndex(),
            'type' => $post->getSearchType(),
            'id' => $post->getKey(),
            'body' => $post->toSearchArray(),
        ]);
    }

    /**
     * Handle the post "updated" event.
     *
     * @param Post $post
     * @return void
     */
    public function updated(Post $post)
    {
        $this->elasticsearch->update([
            'index' => $post->getSearchIndex(),
            'type' => $post->getSearchType(),
            'id' => $post->getKey(),
            'body'  => [
                'doc' => $post->toSearchArray()
            ]
        ]);
    }

    /**
     * Handle the post "deleted" event.
     *
     * @param Post $post
     * @return void
     */
    public function deleted(Post $post)
    {
        $this->elasticsearch->delete([
            'index' => $post->getSearchIndex(),
            'type' => $post->getSearchType(),
            'id' => $post->getKey(),
        ]);
    }
}
