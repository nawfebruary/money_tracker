<?php

namespace App\Http\Controllers;

use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Expense\ExpenseRepositoryInterface;
use App\Repositories\Income\IncomeRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;

class DashboardController extends Controller
{
    protected $categoryRepo, $incomeRepo, $expenseRepo;

    public function __construct(CategoryRepositoryInterface $categoryRepo, IncomeRepositoryInterface $incomeRepo, ExpenseRepositoryInterface $expenseRepo)
    {
        $this->categoryRepo = $categoryRepo;
        $this->incomeRepo = $incomeRepo;
        $this->expenseRepo = $expenseRepo;
    }

    public function index(Request $request)
    {

        $userId = Auth::user()->id;

        $incomes = $this->incomeRepo->getAllTransactionsByUserId($userId);

        $expenses = $this->expenseRepo->getAllTransactionsByUserId($userId);

        $count = count($incomes) + count($expenses);

        $transactions = $this->categoryRepo->getAllTransactionsByUserId($userId);

        if ($request->ajax()) {
            return Response::json(View::make('dashboard.transactions-pagination', compact('transactions', 'count'))->render());
        }

        $categories = $this->categoryRepo->getAllCategories();

        $sumOfIncome = $incomes->sum('amount');

        $sumOfExpense = $expenses->sum('amount');

        return view('dashboard.index', [
            'transactions' => $transactions,
            'count' => $count,
            'sumOfIncome' => $sumOfIncome,
            'sumOfExpense' => $sumOfExpense,
            'categories' => $categories,
        ]);
    }

    public function getLastWeekIncomeAndExpense(Request $request)
    {

        if ($request->ajax()) {
            $months = getLastWeek(7);
            $incomes = array_reverse(array_values($this->incomeRepo->getWeeklyIncome(Auth::user()->id)));
            $expenses = array_reverse(array_values($this->expenseRepo->getWeeklyExpense(Auth::user()->id)));
            return Response::json(
                ['months' => $months,
                'incomes' => $incomes,
                'expenses' => $expenses,
                 ]
            );
        }
    }
}
