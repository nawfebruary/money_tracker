<?php

namespace App\Repositories\Expense;

use App\Models\Expense;
use App\Repositories\Expense\ExpenseRepositoryInterface;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use DatePeriod;
use Illuminate\Support\Facades\DB;

class ExpenseRepository implements ExpenseRepositoryInterface
{
    public function getSumOfExpense($userId)
    {
        return Expense::where('user_id', $userId)->sum('amount');
    }

    public function getAllTransactionsByUserId($userId)
    {
        return Expense::with('categories')
            ->where('user_id', '=', $userId)
            ->orderBy('created_at', 'DESC')
            ->paginate(10);
    }

    public function getCountOfAllTransactionsByUserId($userId)
    {
        return Expense::where('user_id', '=', $userId)
            ->count();
    }

    public function create($data)
    {
        return Expense::create($data);
    }

    public function getLastestId()
    {
        return Expense::select('id')->orderBy('id', 'desc')->first();
    }

    public function getWeeklyExpense($userId)
    {
        $results = Expense::whereBetween('created_at', [Carbon::now()->subDays(7)->format('Y-m-d') . " 00:00:00", Carbon::now()->subDays(1)->format('Y-m-d') . " 23:59:59"])
            ->where('user_id', $userId)
            ->groupBy('date')
            ->orderBy('date', 'DESC')
            ->get([
                DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d") as date'),
                DB::raw('sum(amount) as total'),
            ])
            ->keyBy('date')
            ->map(function ($item) {
                $item->date = Carbon::parse($item->date);
                return $item;
            });

        $period = new DatePeriod(Carbon::now()->subDays(7), CarbonInterval::day(), Carbon::now()->subDays(1)->addDay());

        $graph = array_map(function ($datePeriod) use ($results) {
            $date = $datePeriod->format('Y-m-d');
            return $results->has($date) ? $results->get($date)->total : 0;

        }, iterator_to_array($period));

        return $graph;
    }

}
