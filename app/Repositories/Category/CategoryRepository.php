<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Models\UserCategory;
use App\Repositories\Category\CategoryRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function getAllCategories()
    {
        $userCategory = UserCategory::where('user_id', Auth::user()->id)->pluck('category_id');

        $default = Category::where('status', 'default');
        if (count($userCategory) > 0) {

            return $default->orWhere(function ($q) use($userCategory) {
                $q->where('status', 'custom')->whereIn('id', $userCategory);
            })->get();
        }
        return $default->get();
    }

    public function getAllTransactionsByUserId($userId)
    {

        $incomes = DB::table('incomes')
            ->select(
                'incomes.amount as amount',
                'incomes.note as note',
                'incomes.created_at as created_at',
                'categories.name as category_name',
                'categories.id as category_id',
                DB::raw('"1" as is_income')
            )
            ->join('categories', 'categories.id', '=', 'incomes.category_id')
            ->where('user_id', '=', $userId);

        $expenses = DB::table('expenses')
            ->select(
                'expenses.amount as amount',
                'expenses.note as note',
                'expenses.created_at as created_at',
                'categories.name as category_name',
                'categories.id as category_id',
                DB::raw('"0" as is_income')
            )
            ->join('categories', 'categories.id', '=', 'expenses.category_id')
            ->where('user_id', '=', $userId)
            ->union($incomes)
            ->orderBy('created_at', 'DESC')->paginate(10);

        return $expenses;
    }

    public function getCountOfAllTransactionsByUserId($userId)
    {
        return DB::table('categories')
            ->join('incomes', 'incomes.category_id', '=', 'categories.id')
            ->join('expenses', 'expenses.category_id', '=', 'categories.id')
            ->where('expenses.user_id', '=', $userId)
            ->where('incomes.user_id', '=', $userId)
            ->select('categories.name as category_name', 'categories.type as category_type',
                'incomes.amount as income_amount', 'expenses.amount as expense_amount',
                'incomes.note as income_note', 'expenses.note as expense_note',
                'incomes.category_id as income_category_id', 'expenses.category_id as expenses_category_id',
                'incomes.created_at as income_created_at', 'expenses.created_at as expenses_created_at',
                'incomes.id as income_id', 'expenses.id as expenses_id',
            )
            ->orderBy('expenses_created_at', 'DESC')
            ->count();
    }

    public function checkCategory($input)
    {
        return Category::where(function ($query) use ($input) {
            $query->where('id', '=', $input)
                ->orWhere('name', '=', $input);
        })->first();
    }

    public function createCategory($input, $type)
    {
        $id = Category::orderBy('id', 'DESC')->first();
        $created = Category::create([
            'id' => $id->id + 1,
            'name' => trim($input),
            'type' => $type,
            'status' => 'custom',
            'icon_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        if ($created) {
            return $id->id + 1;
        } else {
            throw new \Exception('Invalid');
        }

    }
}
