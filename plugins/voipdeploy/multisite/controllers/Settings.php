<?php namespace Voipdeploy\Multisite\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use System\Classes\SettingsManager;
use Voipdeploy\Multisite\Models\Setting;
use Cache;
use Flash;

/**
 * Settings Back-end Controller
 */
class Settings extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('October.System', 'system', 'settings');
        SettingsManager::setContext('Voipdeploy.Multisite', 'multisite');
    }

    public function onDelete()
    {
        $selected = post('checked');
        Setting::destroy($selected);
        return $this->listRefresh();
    }

    public function onClearCache()
    {
        Cache::forget('voipdeploy_multisite_settings');
        Flash::success('voipdeploy.multisite::flash.cache-clear');
    }
}

