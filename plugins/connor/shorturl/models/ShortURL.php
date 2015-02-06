<?php namespace Connor\ShortURL\Models;

use Carbon\Carbon;
use Model;

class ShortURL extends Model {

    /**
     * @var string The database table used by the model.
     */
    protected $table = 'connor_shorturl_shorturls';

    /**
     * @var array
     */
    public $rules = [
        'short'  => 'required|between:1,64|regex:/^[a-z0-9\-_]+$/i|unique:connor_shorturl_shorturls,short',
        'url'    => 'required|between:1,1024|url|unique:connor_shorturl_shorturls,url',
        'clicks' => 'integer|min:0'
    ];

    /**
     * @var array The attributes that are mass assignable.
     */
    protected $fillable = ['short', 'url', 'clicks'];

    public function setClicksAttribute($value)
    {
        $value = (int) $value;

        $click = Clicks::firstOrCreate([
                'day' => Carbon::now()->startOfDay()
            ]);

        $click->clicks++;
        $click->update();

        $this->attributes['clicks'] = $value;
    }

} 