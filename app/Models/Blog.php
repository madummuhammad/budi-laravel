<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Blog extends Model
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

    public function tags()
    {
        return $this->hasMany(Tag::class, 'blog_id', 'id');
    }

    public function writers()
    {
        return $this->hasMany(BlogWriter::class, 'id', 'writer');
    }
}