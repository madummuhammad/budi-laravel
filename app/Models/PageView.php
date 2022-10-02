<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageView extends Model
{
    /** @var array */
    protected $fillable = [
        'session',
        'ip',
        'uri',
        'source',
        'country',
        'browser',
        'device',
    ];

    public function setSourceAttribute($value): void
    {
        $this->attributes['source'] = $value
            ? preg_replace('/https?:\/\/(www\.)?([a-z\-\.]+)\/?.*/i', '$2', $value)
            : $value;
    }

    // public function setCountryAttribute($value): void
    // {
    //     $this->attributes['country'] = \Locale::getDisplayRegion($value, 'en');
    // }

    public function getTypeAttribute($value): string
    {
        return ucfirst($value);
    }

    public function scopeFilter($query, $period = 'today')
    {
        if (! in_array($period, ['today', 'yesterday'])) {
            [$interval, $unit] = explode('_', $period);

            return $query->where('created_at', '>=', now()->sub($unit, $interval));
        }

        if ($period === 'yesterday') {
            return $query->whereDate('created_at', today()->subDay()->toDateString());
        }

        return $query->whereDate('created_at', today());
    }

    public function session_data()
    {
        return $this->belongsTo('App\Models\AnalyticsUser', 'session');
    }
}