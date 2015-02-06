<?php namespace OctoDevel\OctoSlider;

use Backend;
use \Lang;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function pluginDetails()
    {
        return [
            'name' => Lang::get('octodevel.octoslider::lang.app.name'),
            'description' => Lang::get('octodevel.octoslider::lang.app.description'),
            'author' => Lang::get('octodevel.octoslider::lang.app.author'),
            'icon' => Lang::get('octodevel.octoslider::lang.app.icon')
        ];
    }

    public function registerComponents()
    {
        return [
            'OctoDevel\OctoSlider\Components\Camera' => 'octosliderCamera',
            'OctoDevel\OctoSlider\Components\Nivo' => 'octosliderNivo',
            'OctoDevel\OctoSlider\Components\Simple' => 'octosliderSimple',
        ];
    }

    public function registerNavigation()
    {
        return [
            'octoslider' => [
                'label'       => Lang::get('octodevel.octoslider::lang.app.name'),
                'url'         => Backend::url('octodevel/octoslider/items'),
                'icon'        => 'icon-play-circle-o',
                'permissions' => ['octoslider.*'],
                'order'       => 500,
                'sideMenu' => [
                    'items' => [
                        'label'       => Lang::get('octodevel.octoslider::lang.navigation.items'),
                        'icon'        => 'icon-picture-o',
                        'url'         => Backend::url('octodevel/octoslider/items'),
                        'permissions' => ['octoslider.access_items'],
                    ]
                ]
            ]
        ];
    }

    public function registerPermissions()
    {
        return [
            'octodevel.octoslider.access_items' => ['label' => Lang::get('octodevel.octoslider::lang.permissions.access_items'), 'tab' => 'OctoDevel'],
        ];
    }
}