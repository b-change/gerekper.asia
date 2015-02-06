<?php namespace Connor\ShortURL\Models;

use Model;

class Settings extends Model {

    public $implement = ['System.Behaviors.SettingsModel'];

    public $settingsCode = 'connor_shorturl_settings';

    public $settingsFields = 'fields.yaml';

} 