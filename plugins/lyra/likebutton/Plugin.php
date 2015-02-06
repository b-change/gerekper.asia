<?php namespace Lyra\Likebutton;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function pluginDetails()
    {
        return [
            'name' => 'Likebutton',
            'description' => 'Add the Facebook Like Button to your pages',
            'author' => 'John Svensson',
            'icon' => 'icon-facebook-square'
        ];
    }

    public function registerComponents()
    {
        return [
            '\Lyra\Likebutton\Components\Likebutton' => 'likeButton'
        ];
    }
}