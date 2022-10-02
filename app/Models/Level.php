<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;
    public $primaryKey;

    public function book()
    {
        return $this->hasMany('App\Models\Book', 'level', 'id');
    }
}