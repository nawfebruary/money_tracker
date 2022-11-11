<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Income extends Model
{
    protected $table = 'incomes';

    protected $primaryKey = 'id';

    protected $fillable = ['id', 'amount', 'category_id', 'user_id', 'note', 'schedule', 'flash'];

    public function categories()
    {
        return $this->hasMany(Category::class, 'id');
    }
}
