<?php namespace Connor\ShortURL\Models;

use Model;

class Clicks extends Model {

    /**
     * @var string The database table used by the model.
     */
    protected $table = 'connor_shorturl_clicks';

    /**
     * @var array The attributes that are mass assignable.
     */
    protected $fillable = ['day', 'clicks'];

    /**
     * @var bool
     */
    public $timestamps = false;

} 