<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Post $post)
    {
        $data = $request->validated();
        $tagIds = $data['tag_ids'];
        unset($data['tag_ids']);
        isset($data['preview_image']) ? $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']) : '';
        isset($data['main_image']) ? $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']) : '';
        // dd($data);
        $this->service->update($post, $data, $tagIds);
        return view('admin.post.show', compact('post'));
    }
}
