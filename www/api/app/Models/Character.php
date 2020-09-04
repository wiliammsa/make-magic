<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Character extends Model
{
    use SoftDeletes;

    public $table = 'character';

    protected $fillable = ['name', 'role', 'school', 'house', 'patronus'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
}
