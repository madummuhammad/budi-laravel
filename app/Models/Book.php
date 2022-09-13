<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Book extends Model
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

    public function authors()
    {
        return $this->hasMany(Author::class, 'id', 'author');
    }

    public function levels()
    {
        return $this->hasMany(Level::class, 'id', 'level');
    }

    public function themes()
    {
        return $this->hasMany(Theme::class, 'id', 'theme');
    }

    public function book_types()
    {
        return $this->hasMany(Book_type::class, 'id', 'book_type');
    }

    public function book_pdfs()
    {
        return $this->belongsTo(Book_pdf::class, 'id', 'book_id');
    }
}