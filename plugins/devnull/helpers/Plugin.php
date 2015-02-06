<?php namespace Devnull\Helpers;

use System\Classes\PluginBase;

/**
 * helpers Plugin Information File
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
            'name'        => 'helpers',
            'description' => 'No description provided yet...',
            'author'      => 'devnull',
            'icon'        => 'icon-leaf'
        ];
    }

}
