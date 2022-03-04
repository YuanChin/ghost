<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Str;

use App\Handlers\ImageUploadHandler;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ImageRequest;
use App\Http\Resources\ImageResource;
use App\Models\Image;

class ImageController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param ImageRequest $request
     * @param Image $image
     * @param ImageUploadHandler $uploader
     * @return void
     */
    public function store(ImageRequest $request, Image $image, ImageUploadHandler $uploader)
    {
        // 當前請求的用戶
        $user = $request->user();

        // 圖片尺寸
        $size = $request->type == 'avatar' ? 416 : 1024;

        // 圖片保存路徑
        $result = $uploader->save($request->image, Str::plural($request->type), $user->id, $size);
        
        $image->type = $request->type;
        $image->path = $result['path'];
        $image->user_id = $user->id;
        $image->save();

        return new ImageResource($image);
    }
}
