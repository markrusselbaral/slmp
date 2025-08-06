<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Album;
use Illuminate\Http\JsonResponse;

class AlbumController extends BaseController
{
    public function index(): JsonResponse
    {
        $albums = Album::
            select('user_id', 'id', 'title')
            ->get();
        return $this->sendResponse($albums, 'Albums retrieved successfully.');

    }
}
