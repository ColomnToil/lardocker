<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Admin\Post\BaseController;
use App\Http\Requests\Admin\Post\StoreRequest;
use Illuminate\Support\Facades\Storage;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $tagIds = false;
        if (isset($data['tag_ids'])) {
            $tagIds = $data['tag_ids'];
            unset($data['tag_ids']);
        }
        $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
        $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
        $this->service->store($data, $tagIds);

        return redirect()->route('admin.post.index');
    }
}
