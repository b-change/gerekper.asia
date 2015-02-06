<?php namespace OctoDevel\OctoSlider\Components;

use \DB;
use \Lang;
use Validator;
use Cms\Classes\ComponentBase;
use October\Rain\Support\ValidationException;
use OctoDevel\OctoSlider\Models\Item as SliderItem;

class Simple extends ComponentBase
{
    public $simpleItems;

    public function componentDetails()
    {
        return [
            'name' => 'octodevel.octoslider::lang.components.octosliderSimple.name',
            'description' => 'octodevel.octoslider::lang.components.octosliderSimple.description'
        ];
    }

    public function defineProperties()
    {
        return [
            'idSlide' => [
                'title' => 'octodevel.octoslider::lang.components.octosliderSimple.properties.idSlide.title',
                'description' => 'octodevel.octoslider::lang.components.octosliderSimple.properties.idSlide.description',
                'type'         => 'dropdown',
                'default'      => '',
                'showExternalParam' => false,
            ]
        ];
    }

    public function getIdSlideOptions()
    {
        $slides = SliderItem::all();

        $array_dropdown = [0 => Lang::get('octodevel.octoslider::lang.components.octosliderSimple.default.options.select_one')];

        foreach ($slides as $slide)
        {
            $array_dropdown[$slide->id] = $slide->title;
        }

        return $array_dropdown;
    }

    public function onRun()
    {
        // Getting register
        $sliderItem = new SliderItem();
        $item = $sliderItem->where('id', '=', $this->property('idSlide'))->first();
        $this->simpleItems = $this->page['simpleItems'] = $item;
    }
}