<?php namespace Devnull\Helpers;

use System\Classes\PluginBase;

/**
 * This is a gerekper.helpers[] for OctoberCMS
 *
 * @category   Gerekper+ Addons | Main Plugin File
 * @package    Devnull\Helpers
 * @author     devnull <www.gerekper.asia>
 * @copyright  2012-2015 Gerekper Inc
 * @license    http://www.gerekper.asia/license/modules.txt
 * @version    1.0.1
 * @link       http://www.gerekper.asia/package/helpers
 * @see        -
 * @since      File available since Release 1.0.0
 * @deprecated -
 */

class Plugin extends PluginBase
{
    public function pluginDetails()
    {
        return [
            'name'          => 'Gerekper Asia helpers',
            'description'   => 'Gerekper Helpers for October CMS',
            'author'        => 'devnull',
            'icon'          => 'icon-css3',
            'homepage'      => 'http://www.gerekper.asia'
        ];
    }

    public function registerNavigation()
    {
        return [
            'helpers' => [
                'label'       => 'Gerekper Helpers',
                'url'         => Backend::url('devnull/helpers/theme'),
                'icon'        => 'icon-css3',
                'permissions' => ['devnull.helpers.admin'],
                'order'       => 500,

                'sideMenu'    => [
                    'robots'    => [
                        'label'         => 'Robots',
                        'url'           =>  Backend::url('devnull/helpers/robots'),
                        'icon'          =>  'icon-css3',
                        'permissions'   =>  ['devnull.helpers.robots'],
                    ],
                    'themes'  => [
                        'label'       => 'Themes',
                        'url'         => Backend::url('devnull/helpers/theme'),
                        'icon'        => 'icon-css3',
                        'permissions' => ['user:*'],
                    ],
                    'rooms'  => [
                        'label'       => 'Rooms',
                        'url'         => Backend::url('tiipiik/booking/rooms'),
                        'icon'        => 'icon-gear',
                        'permissions' => ['user:*'],
                    ],
                    'payplans'  => [
                        'label'       => 'Pay PLans',
                        'url'         => Backend::url('tiipiik/booking/payplans'),
                        'icon'        => 'icon-money',
                        'permissions' => ['user:*'],
                    ],
                ]
            ]
        ];
    }

    public function registerSettings()
    {

    }

    public function registerPermissions()
    {
        return [
            'devnull.helpers'                   =>  ['label' =>  'Manage Helpers Modules'],
            'devnull.helpers.robots'             => ['label' =>  'Manage the helpers'],
            'devnull.helpers.robots.settings'    => ['label' =>  'Manage the helpers settings']
        ];
    }

    public function registerComponents() {}
    public function registerFormWidgets() {}
    public function register() {}
}
