<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\EditPostRequest;
use App\Services\PostService;
use App\Transporters\CreatePostTransporter;
use App\Transporters\GetAllPostTransporter;
use App\Transporters\EditPostTransporter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * PostService
     *
     * @var PostService
     */
    private $service;

    /**
     * PostController constructor.
     *
     * @param PostService $postService
     *
     * @return void
     */
    public function __construct(PostService $postService) {
        $this->service = $postService;
    }

    /**
     * Create Post
     *
     * @param CreatePostRequest $createPostRequest
     *
     * @return string
     *
     * @throws \Dto\Exceptions\InvalidDataTypeException
     *
     * @return string
     */
    public function create(CreatePostRequest $createPostRequest) : string
    {
        $transporter = new CreatePostTransporter(
            [
                'title'     => $createPostRequest->title,
                'message'   => $createPostRequest->message,
                'user_id'   => $createPostRequest->user_id,
            ]
        );

        $post = $this->service->create($transporter);

        return $post->toJson();
    }

    /**
     * Get all posts
     *
     * @param Request $request
     * @param int $userId
     *
     * @return string
     */
    public function getAll(Request $request, int $userId)
    {
        $transporter = new GetAllPostTransporter(
            [
                'user_id' => $userId
            ]
        );

        $collection = $this->service->getAll($transporter);

        return response()->json($collection->toArray());
    }

    /**
     * Edit Post
     *
     * @param EditPostRequest $putPostRequest
     *
     * @return string
     *
     * @throws \Dto\Exceptions\InvalidDataTypeException
     *
     * @return string
     */
    public function edit(EditPostRequest $putPostRequest) : string
    {
        $transporter = new EditPostTransporter(
            [
                'title'     => $putPostRequest->title,
                'message'   => $putPostRequest->message,
                'user_id'   => $putPostRequest->user_id,
                'post_id'   => $putPostRequest->post_id,
            ]
        );

        $post = $this->service->edit($transporter);

        return $post->toJson();
    }

}
