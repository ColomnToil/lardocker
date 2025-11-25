<?php

namespace App\Services\Category;

use App\Models\Category;
use Illuminate\Support\Facades\DB;

class Service
{
    public function  store($data)
    {
        try {
            DB::beginTransaction();
            Category::firstOrCreate(['title' => $data['title']], $data);
            DB::commit();
        } catch (\Exception $exeption) {
            DB::rollBack();
            return $exeption->getMessage();
        }
    }

    public function  update($category, $data)
    {
        try {
            DB::beginTransaction();
            $category->update($data);
            DB::commit();
        } catch (\Exception $exeption) {
            DB::rollBack();
            return $exeption->getMessage();
        }
    }
}
