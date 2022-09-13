<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Theme extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $primaryKey;
    public $guarded=[];

    public $incrementing = false;
    protected $keyType = "string";

    protected static function boot() {
      parent::boot();
      static::creating(function ($model) {
          $model->id = (string) Str::uuid();
      });
    }
}
