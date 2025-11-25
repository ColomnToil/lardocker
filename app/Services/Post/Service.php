<?php

namespace App\Services\Post;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class Service
{
    public function  store($data, $tagIds)
    {
        try {
            DB::beginTransaction();

            $post = Post::create($data);
            $tagIds ? $post->tags()->attach($tagIds) : false;

            DB::commit();
        } catch (\Exception $exeption) {
            DB::rollBack();
            return $exeption->getMessage();
        }
    }

    public function  update($post, $data, $tagIds)
    {
        try {
            DB::beginTransaction();

            $post->update($data);
            $tagIds ? $post->tags()->sync($tagIds) : false;

            DB::commit();
        } catch (\Exception $exeption) {
            DB::rollBack();
            return $exeption->getMessage();
        }
    }
}
