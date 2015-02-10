<?php namespace Devnull\Helpers\Models;

use Model;
use DB;

/**
 * Robots Model
 */
class Robots extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'gp_helpers_robots_schema';
    public static $tables = 'gp_helpers_robots_schema';


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

    public static function optimize_table($_table) { DB::statement("OPTIMIZE TABLE `". $_table ."`");}
    public static function check_existing($_table)
    {
        if(DB::table($_table)->count() > 0) { DB::table($_table)->truncate(); }  else {}
    }

}