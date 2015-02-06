<?php namespace Acme\Blog\Updates;

use Illuminate\Database\Schema\Blueprint;
use Schema;
use October\Rain\Database\Updates\Migration;

class CreateClicksTable extends Migration
{
    public function up()
    {
        Schema::create('connor_shorturl_clicks', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';

            $table->increments('id');

            $table->integer('clicks')
                ->unsigned()
                ->default(0)
                ->nullable();

            $table->date('day');
        });
    }

    public function down()
    {
        Schema::drop('connor_shorturl_clicks');
    }
}