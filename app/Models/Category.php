<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['id', 'name', 'type', 'icon_id', 'status', 'flash', 'created_at', 'updated_at'];

    public function income()
    {
        return $this->belongTo('App\Models\Income');
    }

    public function expense()
    {
        return $this->belongTo('App\Models\Expense');
    }

}
