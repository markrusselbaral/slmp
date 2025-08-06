<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Http\JsonResponse;

class CommentController extends BaseController
{
     public function index(): JsonResponse
    {
        $comments = Comment::
            select('post_id', 'id', 'name', 'email', 'body')
            ->get();
        return $this->sendResponse($comments, 'Comments retrieved successfully.');

    }
}
