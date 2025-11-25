<?php

namespace App\Services\Tag;

use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class Service
{
    public function  store($data)
    {
        try {
            DB::beginTransaction();
            Tag::firstOrCreate(['title' => $data['title']], $data);
            DB::commit();
        } catch (\Exception $exeption) {
            DB::rollBack();
            return $exeption->getMessage();
        }
    }

    public function  update($tag, $data)
    {
        try {
            DB::beginTransaction();
            $tag->update($data);
            DB::commit();
        } catch (\Exception $exeption) {
            DB::rollBack();
            return $exeption->getMessage();
        }
    }
}
