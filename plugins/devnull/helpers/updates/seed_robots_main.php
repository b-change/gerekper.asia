<?php namespace Devnull\Helpers\Updates;

Use Seeder;
Use DB;
use devnull\helpers\Models\RobotsMain;
use devnull\helpers\Models\Robots;

class SeedRobotsMain extends Seeder {

    function __construct()
    {
        date_default_timezone_set(date_default_timezone_get());
        $this->_time_now = Date('Y-m-d H:i:s', time());
        $this->_schema = array();
        $this->_table = RobotsMain::$tables;
    }

    //----------------------------------------------------------------------//
    //	Main Functions - Start
    //----------------------------------------------------------------------//

    public function run()
    {
        Robots::check_existing($this->_table);
        $this->install_schema();
        Robots::optimize_table($this->_table);
    }

    //----------------------------------------------------------------------//
    //	Main Functions - End
    //----------------------------------------------------------------------//

    private function install_schema()
    {
        $this->_schema = [
            ['main_agents' => '*','main_rules' => 'Disallow','main_path' => '/language/','main_status' => '1','main_hash' => 'a856268afec32465101803b000068ee6',    'created_at' => $this->_time_now, 'updated_at' => $this->_time_now],
            ['main_agents' => '*','main_rules' => 'Disallow','main_path' => '/codeigniter/','main_status' => '1','main_hash' => 'c8fdd194450775adacc4d246b7f78322', 'created_at' => $this->_time_now, 'updated_at' => $this->_time_now],
            ['main_agents' => '*','main_rules' => 'Disallow','main_path' => '/installer/','main_status' => '1','main_hash' => '5875ca90d00e408583664eee755d3f97',   'created_at' => $this->_time_now, 'updated_at' => $this->_time_now],
            ['main_agents' => '*','main_rules' => 'Disallow','main_path' => '/themes/','main_status' => '1','main_hash' => '31da26e7c7c6140ecc4bb67bd043be79',      'created_at' => $this->_time_now, 'updated_at' => $this->_time_now],
            ['main_agents' => '*','main_rules' => 'Disallow','main_path' => '/views/','main_status' => '1','main_hash' => '38737e7a46cd1c75ee37171938b5fc41',       'created_at' => $this->_time_now, 'updated_at' => $this->_time_now],
            ['main_agents' => '*','main_rules' => 'Disallow','main_path' => '/migrations/','main_status' => '1','main_hash' => '1ba67af1f5a1dd412742138d62a7350f',  'created_at' => $this->_time_now, 'updated_at' => $this->_time_now],
            ['main_agents' => '*','main_rules' => 'Disallow','main_path' => '/sparks/','main_status' => '1','main_hash' => 'd2aa73cb2ada86a99a98720633ea5f98',      'created_at' => $this->_time_now, 'updated_at' => $this->_time_now],
            ['main_agents' => '*','main_rules' => 'Disallow','main_path' => '/logs/','main_status' => '1','main_hash' => '9a8f02e08c89777690ea2881ef2e024b',        'created_at' => $this->_time_now, 'updated_at' => $this->_time_now],
            ['main_agents' => '*','main_rules' => 'Disallow','main_path' => '/errors/','main_status' => '1','main_hash' => 'c428b0470d4474513125dd483673565a',      'created_at' => $this->_time_now, 'updated_at' => $this->_time_now]

        ];

        DB::table($this->_table)->insert($this->_schema);
    }
}
?>