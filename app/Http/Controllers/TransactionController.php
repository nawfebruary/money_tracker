<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Expense\ExpenseRepositoryInterface;
use App\Repositories\Income\IncomeRepositoryInterface;
use App\Repositories\UserCategory\UserCategoryRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{

    protected $categoryRepo, $incomeRepo, $expenseRepo, $userCategoryRepo;

    public function __construct(CategoryRepositoryInterface $categoryRepo,
        IncomeRepositoryInterface $incomeRepo,
        ExpenseRepositoryInterface $expenseRepo,
        UserCategoryRepositoryInterface $userCategoryRepo) {
        $this->categoryRepo = $categoryRepo;
        $this->incomeRepo = $incomeRepo;
        $this->expenseRepo = $expenseRepo;
        $this->userCategoryRepo = $userCategoryRepo;
    }

    public function create(TransactionRequest $request)
    {
        try {
            $req = $request->only('amount', 'isIncome');
            $req['user_id'] = Auth::user()->id;
            $req['schedule'] = 'none';
            $req['note'] = $request->get('description');
            $category = $request->get('category');
            $custom = $request->get('is_custom');


            if ($custom == '1') {
                $req['category_id'] = $this->categoryRepo->createCategory($category, $req['isIncome'] === '0' ? 'expense' : 'income');
                $this->userCategoryRepo->createUserCategory($req['user_id'], $req['category_id']);
            } else {
                $req['category_id'] = $category;

            }

            if ($req['isIncome'] === '0') { // expense

                $totalIncome = $this->incomeRepo->getAllTransactionsByUserId($req['user_id'])->sum('amount');
                if ($totalIncome < $req['amount']) {
                    return back()->with('errors', 'Your income amount is less than withdraw amount');
                }
            }
            // $req['created_at'] = $req['updated_at'] = time();
            $id = ($req['isIncome'] === '0') ? $this->expenseRepo->getLastestId() : $this->incomeRepo->getLastestId();

            $req['id'] = (is_null($id)) ? 1 : ($id['id'] + 1);

            $res = ($req['isIncome'] === '0') ? $this->expenseRepo->create($req) : $this->incomeRepo->create($req);

            if ($res) {
                return back()->with('status', 'success');
            } else {
                return back()->with('errors', 'failed');
            }
        } catch (\Exception $e) {
            return back()->with('errors', 'failed');
        }

    }

}
