<?php namespace Connor\ShortURL\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * ShortURLs Back-end Controller
 */
class ShortURLs extends Controller
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

        BackendMenu::setContext('Connor.ShortURL', 'shorturls');
    }

}