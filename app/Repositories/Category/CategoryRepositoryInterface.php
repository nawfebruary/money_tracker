<?php

namespace App\Repositories\Category;

interface CategoryRepositoryInterface
{
    public function getAllCategories();

    public function getAllTransactionsByUserId($userId);

    public function getCountOfAllTransactionsByUserId($userId);

    public function checkCategory($input);

    public function createCategory($input, $type);
}
