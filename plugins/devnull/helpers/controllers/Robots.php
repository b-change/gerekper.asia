<?php namespace Devnull\Helpers\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * robots Back-end Controller
 */
class Robots extends Controller
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

        BackendMenu::setContext('Devnull.Helpers', 'helpers', 'robots');
    }
}