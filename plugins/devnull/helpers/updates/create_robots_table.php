<?php namespace Devnull\Helpers\Updates;

use DB;
use Schema;
use October\Rain\Database\Updates\Migration;


class CreateRobotsTable extends Migration
{
    function __construct()
    {
        $this->_robots_schema   =   'gp_helpers_robots_schema';
        $this->_robots_main     =   'gp_helpers_robots_main';
        $this->_robots_config   =   'gp_helpers_robots_config';
        $this->_robots_audit    =   'gp_helpers_robots_audit';
        $this->_robots_library  =   'gp_helpers_robots_library';
        $this->_robots_trap     =   'gp_helpers_robots_trap';
        $this->_table_engine    =   'InnoDB';
    }

    //----------------------------------------------------------------------//
    //	Main Functions - Start
    //----------------------------------------------------------------------//

    public function up()
    {
        $this->down();
        $this->install_schema();
        $this->install_main();
        $this->install_main_audit();
        $this->install_main_config();
    }

    public function down()
    {
        $this->remove_table($this->_robots_schema);
        $this->remove_table($this->_robots_main);
        $this->remove_table($this->_robots_audit);
        $this->remove_table($this->_robots_config);
    }

    //----------------------------------------------------------------------//
    //	Main Functions - End
    //----------------------------------------------------------------------//

    //----------------------------------------------------------------------//
    //	Robots Schema Table - Start
    //----------------------------------------------------------------------//

    private function install_schema()
    {
        $this->remove_table($this->_robots_schema);
        Schema::create($this->_robots_schema, function($table)
        {
            $table->engine = $this->_table_engine;
            $table->increments('schema_id')->index();
            $table->string('schema_slug', 100)->unique();
            $table->string('schema_desc', 250)->nullable();
            $table->string('schema_exam', 250)->nullable();
            $table->string('schema_order', 200)->nullable();
            $table->timestamps();
        });
    }

    private function install_main()
    {
        $this->remove_table($this->_robots_main);
        Schema::create($this->_robots_main, function($table) {
            $table->engine = $this->_table_engine;
            $table->increments('main_id')->index();
            $table->string('main_agents', 100);
            $table->enum('main_rules', array('-', 'Allow', 'Disallow'));
            $table->text('main_path');
            $table->tinyInteger('main_status');
            $table->string('main_hash', 32);
            $table->timestamps();
        });

        $this->install_main_set();
    }

    private function install_main_set()
    {
        DB::statement("ALTER TABLE `". $this->_robots_main . "` CHANGE `main_rules` `main_rules` SET('-', 'Allow', 'Disallow');");
    }

    private function remove_table($_table)
    {
        Schema::dropIfExists($_table);
    }

    private function install_main_audit()
    {
        $this->remove_table($this->_robots_audit);
        Schema::create($this->_robots_audit, function($table) {
            $table->engine = $this->_table_engine;
            $table->increments('audit_id')->index();
            $table->string('audit_action', 250);
            $table->string('audit_url', 250);
            $table->integer('audit_user')->unsigned();
            $table->foreign('audit_user')->references('id')->on('backend_users');
            $table->timestamps();
        });
    }

    private function install_main_config(){
        $this->remove_table($this->_robots_config);
        Schema::create($this->_robots_config, function($table) {
            $table->engine = $this->_table_engine;
            $table->increments('config_id')->index();
            $table->string('config_slug', 100);
            $table->string('config_title', 200);
            $table->text('config_desc');
            $table->enum('config_type', array('text', 'textarea', 'password', 'select', 'select-multiple','radio','checkbox'));
            $table->text('config_default')->nullable();
            $table->text('config_value')->nullable();
            $table->tinyinteger('config_status');
        });

        $this->install_main_config_set();
    }

    private function install_main_config_set()
    {
        DB::statement("ALTER TABLE `". $this->_robots_config ."` CHANGE `config_type` `config_type` SET('text', 'textarea', 'password', 'select', 'select-multiple','radio','checkbox');");
    }

    //----------------------------------------------------------------------//
    //	Robots Schema Table - End
    //----------------------------------------------------------------------//

}
