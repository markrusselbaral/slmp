<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Http\JsonResponse;

class PostController extends BaseController
{
    public function index(): JsonResponse
    {
        $posts = Post::
            select('user_id', 'id', 'title', 'body')
            ->get();
        return $this->sendResponse($posts, 'Todos retrieved successfully.');

    }
}
