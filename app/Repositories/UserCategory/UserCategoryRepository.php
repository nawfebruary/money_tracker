<?php

namespace App\Repositories\UserCategory;

use App\Models\UserCategory;
use App\Repositories\UserCategory\UserCategoryRepositoryInterface;

class UserCategoryRepository implements UserCategoryRepositoryInterface
{
    public function createUserCategory($userId, $categoryId)
    {
        $id = UserCategory::orderBy('id', 'DESC')->first();

        $res=  UserCategory::create([
            'id' => ($id) ? $id->id + 1 : 1,
            'user_id' => $userId,
            'category_id' =>  $categoryId
        ]);

    }
}
