<?php namespace Acme\Blog\Updates;

use Illuminate\Database\Schema\Blueprint;
use Schema;
use October\Rain\Database\Updates\Migration;

class CreateShortURLsTable extends Migration
{
    public function up()
    {
        Schema::create('connor_shorturl_shorturls', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';

            $table->increments('id');

            $table->string('short', 32)->index();
            $table->string('url', 1024)->index();

            $table->integer('clicks')
                ->unsigned()
                ->default(0)
                ->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('connor_shorturl_shorturls');
    }
}