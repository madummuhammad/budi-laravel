<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

class Visitor extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    public $incrementing = false;
    protected $keyType = "string";

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }

    public $guarded = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function book_read_statistics()
    {
        return $this->hasMany(BookReadStatistic::class, 'visitor_id', 'id');
    }

    public function book_download_statistics()
    {
        return $this->hasMany(BookDownloadStatistic::class, 'visitor_id', 'id');
    }

    public function mylibraries()
    {
        return $this->hasMany(Mylibrary::class, 'visitor_id', 'id');
    }

    public function read()
    {
        return $this->hasMany(Mylibrary::class, 'visitor_id', 'id');
    }

    public function downloaded()
    {
        return $this->hasMany(Mylibrary::class, 'visitor_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'visitor_id', 'id');
    }

    public function shares()
    {
        return $this->hasMany(BookShare::class, 'visitor_id', 'id');
    }

    // public function book_read_statistics()
    // {
    //     return $this->hasMany(BookReadStatistic::class,'visitor_id','id');
    // }

}