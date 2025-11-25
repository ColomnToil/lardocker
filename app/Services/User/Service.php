<?php

namespace App\Services\User;

use App\Models\Category;
use App\Models\User;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class Service
{
    public function  store($data)
    {
        try {
            DB::beginTransaction();

            $user = User::firstOrCreate(['email' => $data['email']], $data);

            DB::commit();
        } catch (\Exception $exeption) {
            DB::rollBack();
            return $exeption->getMessage();
        }
    }

    public function  update($user, $data)
    {
        try {
            DB::beginTransaction();

            $user->update($data);

            DB::commit();
        } catch (\Exception $exeption) {
            DB::rollBack();
            return $exeption->getMessage();
        }
    }
}
