<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Characters extends Model
{
    use SoftDeletes;

    protected $table = 'characters';
    protected $fillable = ['name', 'role', 'school', 'house', 'patronus'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
}
