<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Http\JsonResponse;

class TodoController extends BaseController
{
    public function index(): JsonResponse
    {
        $todos = Todo::
            select('user_id', 'id', 'title', 'completed')
            ->get();
        return $this->sendResponse($todos, 'Todos retrieved successfully.');

    }
}
