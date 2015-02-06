<?php namespace Lyra\Likebutton\Components;

use System\Classes\ApplicationException;
use Cms\Classes\ComponentBase;

class Likebutton extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'Likebutton',
            'description' => 'Add a like button to your page'
        ];
    }

    public function defineProperties()
    {
        return [
            'appId' => [
                'title' => 'App id',
                'description' => 'Your app id provided via Facebook',
            ],
            'faces' => [
                'title' => 'Show faces',
                'description' => 'Specifies whether to display profile photos below the button',
                'type' => 'checkbox',
                'default' => false,
            ],
            'layout' => [
                'title' => 'Layout',
                'description' => 'Select one of the different layouts that are available',
                'placeholder' => 'Select layout',
                'default' => 'standard',
                'type' => 'dropdown',
                'options' => ['standard' => 'Standard', 'button_count' => 'Button Count', 'button' => 'Button', 'box_count' => 'Box Count'],
            ],
            'url' => [
                'title' => 'URL',
                'description' => 'The absolute URL of the page that will be liked',
                'placeholder' => 'http://octobercms.com/',
            ],
            'action' => [
                'title' => 'Action',
                'description' => 'The verb to display on the button. Can be either "like" or "recommend"',
                'type' => 'dropdown',
                'options' => ['like' => 'Like', 'recommend' => 'Recommend'],
                'placeholder' => 'Select action',
            ],
            'colorscheme' => [
                'title' => 'Color Scheme',
                'description' => 'The color scheme used by the plugin. Can be "light" or "dark"',
                'type' => 'dropdown',
                'options' => ['light' => 'Light', 'dark' => 'Dark'],
                'placeholder' => 'Select color scheme',
            ],
            'locale' => [
                'title' => 'Locale',
                'description' => 'Enter the country code on the language you would like to have',
                'default' => 'en_US',
            ],
            'width' => [
                'title' => 'Width',
                'description' => 'The width of the plugin',
                'default' => '450',
            ],
            'height' => [
                'title' => 'Height',
                'description' => 'The height of the plugin',
                'default' => '80',
            ],
        ];
    }

    public function onRun()
    {
        $this->page['iframe'] = $this->buildIFrame();
        $this->page['width'] = $this->property('width', '450');
        $this->page['height'] = $this->property('width', '80');
    }

    public function buildIFrame()
    {
        $faces = $this->property('faces') ? 'true' : 'false';

        $iframe = sprintf("//www.facebook.com/plugins/like.php?href=%s&locale=%s&width=%s&layout=%s&action=%s&show_faces=%s&share=%s&height=%s&appId=%s",
            urlencode($this->property('url', 'http://octobercms.com/')),
            $this->property('locale'),
            $this->property('width', '450'),
            $this->property('layout', 'standard'),
            $this->property('action', 'like'),
            $faces,
            $this->property('share', 'false'),
            $this->property('height', '80'),
            $this->property('appId'));

        return $iframe;
    }
}