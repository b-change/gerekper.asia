<?php namespace Connor\ShortURL;

use Backend;
use System\Classes\PluginBase;

/**
 * ShortURL Plugin Information File
 */
class Plugin extends PluginBase
{

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'ShortURL',
            'description' => 'A short url service for OctoberCMS.',
            'author'      => 'Connor S. Parks',
            'icon'        => 'icon-leaf'
        ];
    }

    public function registerSettings()
    {
        return [
            'settings' => [
                'label'       => 'Settings',
                'description' => 'The general Short URL settings.',
                'category'    => 'Short URL',
                'icon'        => 'icon-cog',
                'class'       => 'Connor\ShortURL\Models\Settings',
                'order'       => 1
            ],
            'shorturls' => [
                'label'       => 'Short URLs',
                'description' => 'Manage registered Short URLs.',
                'category'    => 'Short URL',
                'icon'        => 'icon-link',
                'url'         => Backend::url('connor/shorturl/shorturls'),
                'order'       => 2
            ]
        ];
    }

//    public function registerReportWidgets()
//    {
//        return [
//            'Connor\ShortURL\ReportWidgets\Statistics' => [
//                'label'   => 'Short URL Statistics',
//                'context' => 'dashboard'
//            ]
//        ];
//    }

    public function registerComponents()
    {
        return [
            'Connor\ShortURL\Components\Redirector' => 'redirector',
            'Connor\ShortURL\Components\Creator'    => 'creator',
        ];
    }

}
