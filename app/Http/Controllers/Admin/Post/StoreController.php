<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Admin\Post\BaseController;
use App\Http\Requests\Admin\Post\StoreRequest;
use Illuminate\Support\Facades\Storage;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $data['preview_image'] = Storage::put('/images', $data['preview_image']);
        $data['main_image'] = Storage::put('/images', $data['main_image']);
        // dd($previewImagePath);
        $this->service->store($data);
        return redirect()->route('admin.post.index');
    }
}
