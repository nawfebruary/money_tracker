<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expense extends Model
{
    protected $table = 'expenses';

    protected $primaryKey = 'id';

    protected $fillable = ['id', 'amount', 'category_id', 'user_id', 'note', 'schedule', 'flash'];

    public function categories()
    {
        return $this->hasMany(Category::class, 'id');
    }
}
