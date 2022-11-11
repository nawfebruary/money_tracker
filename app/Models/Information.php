<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Information extends Model
{
    use SoftDeletes;

    protected $table = 'informations';

    protected $primaryKey = 'id';

    protected $fillable = ['id', 'user_id', 'question_one', 'question_two', 'question_three'];

}
