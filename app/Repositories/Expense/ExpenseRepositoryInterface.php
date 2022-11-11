<?php

namespace App\Repositories\Expense;

interface ExpenseRepositoryInterface
{
    public function getSumOfExpense($userId);

    public function getAllTransactionsByUserId($userId);

    public function getCountOfAllTransactionsByUserId($userId);

    public function create($data);

    public function getLastestId();

    public function getWeeklyExpense($userId);

}
