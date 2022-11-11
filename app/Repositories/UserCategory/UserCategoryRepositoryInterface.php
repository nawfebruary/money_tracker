<?php

namespace App\Repositories\UserCategory;

interface UserCategoryRepositoryInterface
{
    public function createUserCategory($userId, $categoryId);
}
