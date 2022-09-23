<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class VisitorVisit extends Model
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

    public function book_read_statistics()
    {
        return $this->hasMany(BookReadStatistic::class, 'visitor_visit_id', 'id');
    }

    public function book_download_statistics()
    {
        return $this->hasMany(BookDownloadStatistic::class, 'visitor_visit_id', 'id');
    }
}