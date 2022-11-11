<?php

namespace App\Repositories\Income;

interface IncomeRepositoryInterface
{
    public function getSumOfIncome($userId);

    public function getAllTransactionsByUserId($userId);

    public function getCountOfAllTransactionsByUserId($userId);

    public function create($data);

    public function getLastestId();

    public function getWeeklyIncome($userId);

}
