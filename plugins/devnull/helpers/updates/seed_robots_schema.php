<?php namespace Devnull\Helpers\Updates;

use Seeder;
use DB;
use devnull\helpers\Models\Robots;

class SeedRobotsSchema extends Seeder
{
    function __construct()
    {
        date_default_timezone_set(date_default_timezone_get());
        $this->_time_now = Date('Y-m-d H:i:s', time());
        $this->_schema = array();
        $this->_table = Robots::$tables;
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
        $this->_schema =[
                ['schema_slug' => 'robot-id', 					'schema_desc' => 'Short name for the robot,used internally as a unique reference. Should use [a-z-_]+', 'schema_exam' => 'webcrawler', 'schema_order' => '102', 'created_at' => $this->_time_now, 'updated_at' => $this->_time_now],
                ['schema_slug' => 'robot-name', 				'schema_desc' => 'Full name of the robot, for presentation purposes.', 'schema_exam' => 'WebCrawler','schema_order' => '103', 'created_at' => $this->_time_now, 'updated_at' => $this->_time_now],
                ['schema_slug' => 'robot-details-url', 			'schema_desc' => 'URL of the robot home page, containing further technical details on the robot, background information etc.', 'schema_exam' => 'http://webcrawler.com/WebCrawler/Facts/HowItWorks.html','schema_order' => '104', 'created_at' => $this->_time_now, 'updated_at' => $this->_time_now],
                ['schema_slug' => 'robot-cover-url', 			'schema_desc' => 'URL of the robot product, containing marketing details about either the robot, or the service to which the robot is related.', 'schema_exam' => 'http://webcrawler.com/', 'schema_order' => '105', 'created_at' => $this->_time_now, 'updated_at' => $this->_time_now],
                ['schema_slug' => 'robot-owner-name', 			'schema_desc' => 'Name of the owner. For service robots this is the person running the robot, who can be contacted in case of specific problems. In the case of robot products this is the person maintaining the product, who can be contacted if the robot has bugs.','schema_exam' =>  'Brian Pinkerton', 'schema_order' => '106', 'created_at' => $this->_time_now, 'updated_at' => $this->_time_now],
                ['schema_slug' => 'robot-owner-url', 			'schema_desc' => 'Home page of the robot-owner-name.', 'schema_exam' => 'http://info.webcrawler.com/bp/bp.html', 'schema_order' => '107', 'created_at' => $this->_time_now, 'updated_at' => $this->_time_now],
                ['schema_slug' => 'robot-owner-email', 			'schema_desc' => 'Email address of owner.', 'schema_exam' => 'np@webcrawler.com', 'schema_order' => '108', 'created_at' => $this->_time_now, 'updated_at' => $this->_time_now],
                ['schema_slug' => 'robot-status', 				'schema_desc' => 'Deployment status of the robot.', 'schema_exam' => 'development: robot under development, active: robot actively in use, retired: robot no longer used.', 'schema_order' => '109', 'created_at' => $this->_time_now, 'updated_at' => $this->_time_now],
                ['schema_slug' => 'robot-purpose', 				'schema_desc' => 'Purpose of the robot.', 'schema_exam' => 'indexing: gather content for an indexing service, maintenance: link validation, html validation etc. statistics: used to gather statistics. Further details can be given in the description', 'schema_order' => '110', 'created_at' => $this->_time_now, 'updated_at' => $this->_time_now],
                ['schema_slug' => 'robot-type', 				'schema_desc' => 'Type of robot software.', 'schema_exam' =>  'standalone: a separate program, browser: built into a browser, plugin: a plugin for a browser', 'schema_order' => '111', 'created_at' => $this->_time_now, 'updated_at' => $this->_time_now],
                ['schema_slug' => 'robot-platform', 			'schema_desc' => 'Platform robot runs on.', 'schema_exam' => 'unix, windows, windows95, windowsNT, os2, mac', 'schema_order' => '112', 'created_at' => $this->_time_now, 'updated_at' => $this->_time_now],
                ['schema_slug' => 'robot-availability', 		'schema_desc' => 'Availability of robot to general public', 'schema_exam' => 'source: source code available, binary: binary form available, data: bulk data gathered by robot available, none', 'schema_order' => '113', 'created_at' => $this->_time_now, 'updated_at' => $this->_time_now],
                ['schema_slug' => 'robot-exclusion', 			'schema_desc' => 'Standard for Robots Exclusion supported.', 'schema_exam' => 'yes or no', 'schema_order' => '114', 'created_at' => $this->_time_now, 'updated_at' => $this->_time_now],
                ['schema_slug' => 'robot-exclusion-useragent', 	'schema_desc' => 'HSubstring to use in /robots.txt.', 'schema_exam' => 'webcrawler', 'schema_order' => '115', 'created_at' => $this->_time_now, 'updated_at' => $this->_time_now],
                ['schema_slug' => 'robot-noindex', 				'schema_desc' => '<meta name=\"robots\" content=\"noindex\"> directive supported:', 'schema_exam' =>  'yes or no', 'schema_order' => '116', 'created_at' => $this->_time_now, 'updated_at' => $this->_time_now],
                ['schema_slug' => 'robot-nofollow', 			'schema_desc' => '<meta name=\"robots\" content=\"nofollow\"> directive supported:', 'schema_exam' =>  'yes or no', 'schema_order' => '117', 'created_at' => $this->_time_now, 'updated_at' => $this->_time_now],
                ['schema_slug' => 'robot-host', 				'schema_desc' => 'Host the robot is run from. Can be a pattern of DNS and/or IP', 'schema_exam' => 'If the robot is available to the general public, add \\\'*\\\', spidey.webcrawler.com, *.webcrawler.com, 192.216.46.*', 'schema_order' => '118', 'created_at' => $this->_time_now, 'updated_at' => $this->_time_now],
                ['schema_slug' => 'robot-useragent_1', 			'schema_desc' => 'The HTTP User-Agent field as defined in RFC 1945.', 'schema_exam' => 'WebCrawler/1.0 libwww/4.0', 'schema_order' => '119', 'created_at' => $this->_time_now, 'updated_at' => $this->_time_now],
                ['schema_slug' => 'robot-language', 			'schema_desc' => 'Languages the robot is written in.', 'schema_exam' => 'c,c++,perl,perl4,perl5,java,tcl,python, etc.', 'schema_order' => '120', 'created_at' => $this->_time_now, 'updated_at' => $this->_time_now],
                ['schema_slug' => 'robot-useragent_2', 			'schema_desc' => 'Text description of the robot\\\'s functions. More details should go on robot-url.', 'schema_exam' => 'The WebCrawler robot is used to build the database for the WebCrawler search service operated by GNN. The robot runs weekly, and visits sites in a random order.', 'schema_order' => '121', 'created_at' => $this->_time_now, 'updated_at' => $this->_time_now],
                ['schema_slug' => 'robot-history', 				'schema_desc' => 'Text description of the origins of the robot.', 'schema_exam' => 'This robot finds its roots in a research project at the University of Washington in 1994.', 'schema_order' => '122', 'created_at' => $this->_time_now, 'updated_at' => $this->_time_now],
                ['schema_slug' => 'robot-useragent_3', 			'schema_desc' => 'The environment the robot operates in.', 'schema_exam' => 'Wservice: builds a commercial service, commercial: is a commercial product, research: used for research, hobby: written as a hobby', 'schema_order' => '123', 'created_at' => $this->_time_now, 'updated_at' => $this->_time_now],
                ['schema_slug' => 'modified-date', 				'schema_desc' => 'The date this record was last modified. Format as in HTTP.', 'schema_exam' => 'Fri, 21 Jun 1996 17:28:52 GMT', 'schema_order' => '124', 'created_at' => $this->_time_now, 'updated_at' => $this->_time_now]

        ];

        DB::table($this->_table)->insert($this->_schema);
    }
}
?>