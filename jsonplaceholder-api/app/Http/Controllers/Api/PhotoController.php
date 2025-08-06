<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Photo;
use Illuminate\Http\JsonResponse;

class PhotoController extends BaseController
{
    public function index(): JsonResponse
    {
        $photos = Photo::
            select('album_id', 'id', 'title', 'url', 'thumbnail_url')
            ->get();
        return $this->sendResponse($photos, 'Photos retrieved successfully.');

    }
}
