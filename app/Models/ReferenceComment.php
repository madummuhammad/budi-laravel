<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class ReferenceComment extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $primaryKey;
    public $guarded = [];

    public $incrementing = false;
    protected $keyType = "string";

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }

    public function visitors()
    {
        return $this->hasOne(Visitor::class, 'id', 'visitor_id');
    }

    public function reference_books()
    {
        return $this->hasMany(Reference_Book::class, 'id', 'book_id');
    }
}