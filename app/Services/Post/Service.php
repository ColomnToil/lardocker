<?php

namespace App\Services\Post;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class Service
{
    // public function  store($data, $tags, $category)
    public function  store($data, $tagIds)
    {
        try {
            DB::beginTransaction();
            // $tagIds = $this->getTagIds($tags);
            // $data['category_id'] = $this->getCategoryId($category);

            $post = Post::create($data);
            $post->tags()->attach($tagIds);

            DB::commit();
        } catch (\Exception $exeption) {
            DB::rollBack();
            return $exeption->getMessage();
        }
        // return $post;
    }

    private function getCategoryId($item)
    {
        $category = !isset($item['id']) ? Category::create($item) : Category::find($item['id']);
        return $category->id;
    }

    private function getTagIds($tags)
    {
        $tagsIds = [];
        foreach ($tags as $tag) {

            $tagCreate = !isset($tag['id']) ? Tag::create($tag) : Tag::find($tag['id']);
            $tagsIds[] = $tagCreate->id;
        }
        return $tagsIds;
    }

    private function getTagIdsWithUpdate($tags)
    {
        $tagsIds = [];

        foreach ($tags as $tag) {

            if (!isset($tag['id'])) {
                $tag = Tag::create($tag);
            } else {
                $currentTag = Tag::find($tag['id']);

                $currentTag->update($tag);
                $tag = $currentTag->fresh();
            }
            $tagsIds[] = $tag->id;
        }
        return $tagsIds;
    }

    private function getCategoryIdWithUpdate($item)
    {
        if (!isset($item['id'])) {
            $category = Category::create($item);
        } else {
            $category = Category::find($item['id']);
            $category->update($item);
            $category = $category->fresh();
        }

        return $category->id;
    }

    public function  update($post, $data, $tags, $category)
    {
        try {
            DB::beginTransaction();
            $tagIds = $this->getTagIdsWithUpdate($tags);

            $data['category_id'] = $this->getCategoryIdWithUpdate($category);

            $post->update($data);
            $post->tags()->sync($tagIds);

            DB::commit();
        } catch (\Exception $exeption) {
            DB::rollBack();
            return $exeption->getMessage();
        }
        // return $post->fresh();
    }
}
