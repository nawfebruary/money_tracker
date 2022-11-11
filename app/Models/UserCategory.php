<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserCategory extends Model
{
    use SoftDeletes;

    protected $table = 'user_categories';

    protected $fillable = ['id', 'user_id', 'category_id'];

}
