<?php


namespace App\Services;


use App\Post;
use App\Transporters\CreatePostTransporter;
use App\Transporters\DeletePostTransporter;
use App\Transporters\EditPostTransporter;
use App\Transporters\GetAllPostTransporter;
use Illuminate\Support\Collection;

class PostService
{
    /**
     * Create Post
     *
     * @param CreatePostTransporter $createPostTransporter
     *
     * @return Post
     *
     * @throws \Dto\Exceptions\InvalidDataTypeException
     */
    public function create(CreatePostTransporter $createPostTransporter) : Post
    {
        return (new Post())->create($createPostTransporter->toArray());
    }

    /**
     * Get all posts
     *
     * @param GetAllPostTransporter $getAllPostTransporter
     *
     * @return Collection
     *
     * @throws \Dto\Exceptions\InvalidDataTypeException
     * @throws \Dto\Exceptions\InvalidKeyException
     */
    public function getAll(GetAllPostTransporter $getAllPostTransporter) : Collection
    {
        return (new Post())->where('user_id', $getAllPostTransporter->get('user_id')->toScalar())->get();
    }

    /**
     * Edit Post
     *
     * @param EditPostTransporter $editPostTransporter
     *
     * @return Post
     *
     * @throws \Dto\Exceptions\InvalidDataTypeException
     */
    public function edit(EditPostTransporter $editPostTransporter) : Post
    {
        $post = Post::findOrFail($editPostTransporter->get('post_id')->toScalar());

        if ($post->user_id !== $editPostTransporter->get('user_id')->toScalar()) {
            throw new \Exception('not user');
        }

        $post->title    = $editPostTransporter->get('title')->toScalar();
        $post->message  = $editPostTransporter->get('message')->toScalar();

        $post->save();

        return $post;
    }

    /**
     * Delete Post
     *
     * @param DeletePostTransporter $deletePostTransporter
     *
     * @return bool
     *
     * @throws \Dto\Exceptions\InvalidDataTypeException
     */
    public function delete(DeletePostTransporter $deletePostTransporter) : bool
    {
        $post = Post::findOrFail($deletePostTransporter->get('post_id')->toScalar());

        if ($post->user_id !== $deletePostTransporter->get('user_id')->toScalar()) {
            throw new \Exception('not user');
        }

        $post->delete();

        return true;
    }


}
