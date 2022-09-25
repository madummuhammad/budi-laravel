<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class ReferenceBook extends Model
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

    public function reference_themes()
    {
        return $this->hasMany(ReferenceTheme::class, 'id', 'theme');
    }

    public function book_types()
    {
        return $this->hasMany(Book_type::class, 'id', 'book_type');
    }

    public function reference_book_types()
    {
        return $this->hasMany(ReferenceBookType::class, 'id', 'reference_book_type');
    }

    public function book_pdfs()
    {
        return $this->belongsTo(Book_pdf::class, 'id', 'book_id');
    }

    public function mylibraries()
    {
        return $this->hasMany(Mylibrary::class, 'book_id', 'id');
    }

    public function reference_book_downloads()
    {
        return $this->hasMany(ReferenceBookDownload::class, 'book_id', 'id');
    }

    public function reference_book_likeds()
    {
        return $this->hasMany(ReferenceBookLiked::class, 'book_id', 'id');
    }

    public function reference_comments()
    {
        return $this->hasMany(ReferenceComment::class, 'book_id', 'id');
    }

}