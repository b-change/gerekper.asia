<?php namespace Devnull\Helpers\Models;

use Model;

/**
 * RobotsMain Model
 */
class RobotsMain extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'gp_helpers_robots_main';
    public static $tables = 'gp_helpers_robots_main';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];

}