<?php namespace OctoDevel\OctoSlider\Components;

use \DB;
use \Lang;
use Validator;
use Cms\Classes\ComponentBase;
use October\Rain\Support\ValidationException;
use OctoDevel\OctoSlider\Models\Item as SliderItem;

class Nivo extends ComponentBase
{
    public $nivoItems;
    public $jqueryIncludeNivo;
    public $effectNivo;
    public $slicesNivo;
    public $boxColsNivo;
    public $boxRowsNivo;
    public $animSpeedNivo;
    public $pauseTimeNivo;
    public $startSlideNivo;
    public $directionNavNivo;
    public $controlNavNivo;
    public $controlNavThumbsNivo;
    public $pauseOnHoverNivo;
    public $manualAdvanceNivo;
    public $prevTextNivo;
    public $nextTextNivo;
    public $randomStartNivo;
    public $themeNivo;

    public function componentDetails()
    {
        return [
            'name' => 'octodevel.octoslider::lang.components.octosliderNivo.name',
            'description' => 'octodevel.octoslider::lang.components.octosliderNivo.description'
        ];
    }

    public function defineProperties()
    {
        return [
            'idSlide' => [
                'title' => 'octodevel.octoslider::lang.components.octosliderNivo.properties.idSlide.title',
                'description' => 'octodevel.octoslider::lang.components.octosliderNivo.properties.idSlide.description',
                'type'         => 'dropdown',
                'default'      => '',
                'showExternalParam' => false,
            ],
            'jqueryIncludeNivo' => [
                'title' => 'octodevel.octoslider::lang.components.octosliderNivo.properties.jqueryIncludeNivo.title',
                'description' => 'octodevel.octoslider::lang.components.octosliderNivo.properties.jqueryIncludeNivo.description',
                'type'         => 'dropdown',
                'default'      => 'no',
                'showExternalParam' => false,
            ],
            'effectNivo' => [
                'title' => 'octodevel.octoslider::lang.components.octosliderNivo.properties.effectNivo.title',
                'description' => 'octodevel.octoslider::lang.components.octosliderNivo.properties.effectNivo.description',
                'type'         => 'dropdown',
                'default'      => 'random',
                'group'        => Lang::get('octodevel.octoslider::lang.components.octosliderNivo.propertyGroups.effects'),
                'showExternalParam' => false,
            ],
            'slicesNivo' => [
                'title' => 'octodevel.octoslider::lang.components.octosliderNivo.properties.slicesNivo.title',
                'description' => 'octodevel.octoslider::lang.components.octosliderNivo.properties.slicesNivo.description',
                'type'         => 'string',
                'validationPattern' => '^[1-9]+$',
                'validationMessage' => Lang::get('octodevel.octoslider::lang.components.octosliderNivo.properties.slicesNivo.validationMessage'),
                'default'      => '15',
                'group'        => Lang::get('octodevel.octoslider::lang.components.octosliderNivo.propertyGroups.effects'),
                'showExternalParam' => false,
            ],
            'boxColsNivo' => [
                'title' => 'octodevel.octoslider::lang.components.octosliderNivo.properties.boxColsNivo.title',
                'description' => 'octodevel.octoslider::lang.components.octosliderNivo.properties.boxColsNivo.description',
                'type'        => 'string',
                'validationPattern' => '^[1-9]+$',
                'validationMessage' => Lang::get('octodevel.octoslider::lang.components.octosliderNivo.properties.boxColsNivo.validationMessage'),
                'default'     => '8',
                'group'       => Lang::get('octodevel.octoslider::lang.components.octosliderNivo.propertyGroups.effects'),
                'showExternalParam' => false,
            ],
            'boxRowsNivo' => [
                'title' => 'octodevel.octoslider::lang.components.octosliderNivo.properties.boxRowsNivo.title',
                'description' => 'octodevel.octoslider::lang.components.octosliderNivo.properties.boxRowsNivo.description',
                'type'        => 'string',
                'validationPattern' => '^[1-9]+$',
                'validationMessage' => Lang::get('octodevel.octoslider::lang.components.octosliderNivo.properties.boxRowsNivo.validationMessage'),
                'default'     => '4',
                'group'       => Lang::get('octodevel.octoslider::lang.components.octosliderNivo.propertyGroups.effects'),
                'showExternalParam' => false,
            ],
            'animSpeedNivo' => [
                'title' => 'octodevel.octoslider::lang.components.octosliderNivo.properties.animSpeedNivo.title',
                'description' => 'octodevel.octoslider::lang.components.octosliderNivo.properties.animSpeedNivo.description',
                'type'        => 'string',
                'validationPattern' => '^[0-9]+$',
                'validationMessage' => Lang::get('octodevel.octoslider::lang.components.octosliderNivo.properties.animSpeedNivo.validationMessage'),
                'default'     => '500',
                'group'       => Lang::get('octodevel.octoslider::lang.components.octosliderNivo.propertyGroups.effects'),
                'showExternalParam' => false,
            ],
            'pauseTimeNivo' => [
                'title' => 'octodevel.octoslider::lang.components.octosliderNivo.properties.pauseTimeNivo.title',
                'description' => 'octodevel.octoslider::lang.components.octosliderNivo.properties.pauseTimeNivo.description',
                'type'        => 'string',
                'validationPattern' => '^[0-9]+$',
                'validationMessage' => Lang::get('octodevel.octoslider::lang.components.octosliderNivo.properties.pauseTimeNivo.validationMessage'),
                'default'     => '3000',
                'group'       => Lang::get('octodevel.octoslider::lang.components.octosliderNivo.propertyGroups.options'),
                'showExternalParam' => false,
            ],
            'startSlideNivo' => [
                'title' => 'octodevel.octoslider::lang.components.octosliderNivo.properties.startSlideNivo.title',
                'description' => 'octodevel.octoslider::lang.components.octosliderNivo.properties.startSlideNivo.description',
                'type'        => 'string',
                'validationPattern' => '^[0-9]+$',
                'validationMessage' => Lang::get('octodevel.octoslider::lang.components.octosliderNivo.properties.startSlideNivo.validationMessage'),
                'default'     => '0',
                'group'       => Lang::get('octodevel.octoslider::lang.components.octosliderNivo.propertyGroups.options'),
                'showExternalParam' => false,
            ],
            'directionNavNivo' => [
                'title' => 'octodevel.octoslider::lang.components.octosliderNivo.properties.directionNavNivo.title',
                'description' => 'octodevel.octoslider::lang.components.octosliderNivo.properties.directionNavNivo.description',
                'type'        => 'dropdown',
                'default'     => 'true',
                'group'       => Lang::get('octodevel.octoslider::lang.components.octosliderNivo.propertyGroups.options'),
                'showExternalParam' => false,
            ],
            'controlNavNivo' => [
                'title' => 'octodevel.octoslider::lang.components.octosliderNivo.properties.controlNavNivo.title',
                'description' => 'octodevel.octoslider::lang.components.octosliderNivo.properties.controlNavNivo.description',
                'type'        => 'dropdown',
                'default'     => 'true',
                'group'       => Lang::get('octodevel.octoslider::lang.components.octosliderNivo.propertyGroups.options'),
                'showExternalParam' => false,
            ],
            'controlNavThumbsNivo' => [
                'title' => 'octodevel.octoslider::lang.components.octosliderNivo.properties.controlNavThumbsNivo.title',
                'description' => 'octodevel.octoslider::lang.components.octosliderNivo.properties.controlNavThumbsNivo.description',
                'type'        => 'dropdown',
                'default'     => 'false',
                'group'       => Lang::get('octodevel.octoslider::lang.components.octosliderNivo.propertyGroups.options'),
                'showExternalParam' => false,
            ],
            'pauseOnHoverNivo' => [
                'title' => 'octodevel.octoslider::lang.components.octosliderNivo.properties.pauseOnHoverNivo.title',
                'description' => 'octodevel.octoslider::lang.components.octosliderNivo.properties.pauseOnHoverNivo.description',
                'type'        => 'dropdown',
                'default'     => 'true',
                'group'       => Lang::get('octodevel.octoslider::lang.components.octosliderNivo.propertyGroups.options'),
                'showExternalParam' => false,
            ],
            'manualAdvanceNivo' => [
                'title' => 'octodevel.octoslider::lang.components.octosliderNivo.properties.manualAdvanceNivo.title',
                'description' => 'octodevel.octoslider::lang.components.octosliderNivo.properties.manualAdvanceNivo.description',
                'type'        => 'dropdown',
                'default'     => 'false',
                'group'       => Lang::get('octodevel.octoslider::lang.components.octosliderNivo.propertyGroups.options'),
                'showExternalParam' => false,
            ],
            'randomStartNivo' => [
                'title' => 'octodevel.octoslider::lang.components.octosliderNivo.properties.randomStartNivo.title',
                'description' => 'octodevel.octoslider::lang.components.octosliderNivo.properties.randomStartNivo.description',
                'type'        => 'dropdown',
                'default'     => 'false',
                'group'       => Lang::get('octodevel.octoslider::lang.components.octosliderNivo.propertyGroups.options'),
                'showExternalParam' => false,
            ],
            'themeNivo' => [
                'title' => 'octodevel.octoslider::lang.components.octosliderNivo.properties.themeNivo.title',
                'description' => 'octodevel.octoslider::lang.components.octosliderNivo.properties.themeNivo.description',
                'type'        => 'dropdown',
                'default'     => 'default',
                'group'       => Lang::get('octodevel.octoslider::lang.components.octosliderNivo.propertyGroups.options'),
                'showExternalParam' => false,
            ],
            'prevTextNivo' => [
                'title' => 'octodevel.octoslider::lang.components.octosliderNivo.properties.prevTextNivo.title',
                'description' => 'octodevel.octoslider::lang.components.octosliderNivo.properties.prevTextNivo.description',
                'type'        => 'string',
                'default'     => 'Prev',
                'group'       => Lang::get('octodevel.octoslider::lang.components.octosliderNivo.propertyGroups.translations'),
                'showExternalParam' => false,
            ],
            'nextTextNivo' => [
                'title' => 'octodevel.octoslider::lang.components.octosliderNivo.properties.nextTextNivo.title',
                'description' => 'octodevel.octoslider::lang.components.octosliderNivo.properties.nextTextNivo.description',
                'type'        => 'string',
                'default'     => 'Next',
                'group'       => Lang::get('octodevel.octoslider::lang.components.octosliderNivo.propertyGroups.translations'),
                'showExternalParam' => false,
            ],

        ];
    }

    public function getIdSlideOptions()
    {
        $slides = SliderItem::all();

        $array_dropdown = [0 => Lang::get('octodevel.octoslider::lang.components.octosliderNivo.default.options.select_one')];

        foreach ($slides as $slide)
        {
            $array_dropdown[$slide->id] = $slide->title;
        }

        return $array_dropdown;
    }

    public function getJqueryIncludeNivoOptions()
    {
        return ['no' => Lang::get('octodevel.octoslider::lang.components.octosliderNivo.default.options.no'), 'yes' => Lang::get('octodevel.octoslider::lang.components.octosliderNivo.default.options.yes')];
    }

    public function getEffectNivoOptions()
    {
        return [
            'random'             => 'Random',
            'sliceDown'          => 'Slice Down',
            'sliceDownLeft'      => 'Slice Down Left',
            'sliceUp'            => 'Slice Up',
            'sliceUpLeft'        => 'Slice up Left',
            'sliceUpDown'        => 'Slice up Down',
            'sliceUpDownLeft'    => 'Slice up Down Left',
            'fold'               => 'Fold',
            'fade'               => 'Fade',
            'slideInRight'       => 'Slide in Right',
            'slideInLeft'        => 'Slide in Left',
            'boxRandom'          => 'Box Random',
            'boxRain'            => 'Box Rain',
            'boxRainReverse'     => 'Box Rain Reverse',
            'boxRainGrow'        => 'Box Rain Grow',
            'boxRainGrowReverse' => 'Box Rain Grow Reverse'
        ];
    }

    public function getDirectionNavNivoOptions()
    {
        return ['false' => Lang::get('octodevel.octoslider::lang.components.octosliderNivo.default.options.no'), 'true' => Lang::get('octodevel.octoslider::lang.components.octosliderNivo.default.options.yes')];
    }

    public function getControlNavNivoOptions()
    {
        return ['false' => Lang::get('octodevel.octoslider::lang.components.octosliderNivo.default.options.no'), 'true' => Lang::get('octodevel.octoslider::lang.components.octosliderNivo.default.options.yes')];
    }

    public function getControlNavThumbsNivoOptions()
    {
        return ['false' => Lang::get('octodevel.octoslider::lang.components.octosliderNivo.default.options.no'), 'true' => Lang::get('octodevel.octoslider::lang.components.octosliderNivo.default.options.yes')];
    }

    public function getPauseOnHoverNivoOptions()
    {
        return ['false' => Lang::get('octodevel.octoslider::lang.components.octosliderNivo.default.options.no'), 'true' => Lang::get('octodevel.octoslider::lang.components.octosliderNivo.default.options.yes')];
    }

    public function getManualAdvanceNivoOptions()
    {
        return ['false' => Lang::get('octodevel.octoslider::lang.components.octosliderNivo.default.options.no'), 'true' => Lang::get('octodevel.octoslider::lang.components.octosliderNivo.default.options.yes')];
    }

    public function getRandomStartNivoOptions()
    {
        return ['false' => Lang::get('octodevel.octoslider::lang.components.octosliderNivo.default.options.no'), 'true' => Lang::get('octodevel.octoslider::lang.components.octosliderNivo.default.options.yes')];
    }

    public function getThemeNivoOptions()
    {
        return ['none' => Lang::get('octodevel.octoslider::lang.components.octosliderNivo.default.options.none'), 'default' => 'Default', 'bar' => 'Bar', 'dark' => 'Dark', 'light' => 'Light'];
    }

    public function onRun()
    {
        // Getting register
        $sliderItem = new SliderItem();
        $item = $sliderItem->where('id', '=', $this->property('idSlide'))->first();
        $this->nivoItems = $this->page['nivoItems'] = $item;

        // Setting parameters
        $this->jqueryIncludeNivo = $this->page['jqueryIncludeNivo'] = $this->property('jqueryIncludeNivo');
        $this->effectNivo = $this->page['effectNivo'] = $this->property('effectNivo');
        $this->slicesNivo = $this->page['slicesNivo'] = $this->property('slicesNivo');
        $this->boxColsNivo = $this->page['boxColsNivo'] = $this->property('boxColsNivo');
        $this->boxRowsNivo = $this->page['boxRowsNivo'] = $this->property('boxRowsNivo');
        $this->animSpeedNivo = $this->page['animSpeedNivo'] = $this->property('animSpeedNivo');
        $this->pauseTimeNivo = $this->page['pauseTimeNivo'] = $this->property('pauseTimeNivo');
        $this->startSlideNivo = $this->page['startSlideNivo'] = $this->property('startSlideNivo');
        $this->directionNavNivo = $this->page['directionNavNivo'] = $this->property('directionNavNivo');
        $this->controlNavNivo = $this->page['controlNavNivo'] = $this->property('controlNavNivo');
        $this->controlNavThumbsNivo = $this->page['controlNavThumbsNivo'] = $this->property('controlNavThumbsNivo');
        $this->pauseOnHoverNivo = $this->page['pauseOnHoverNivo'] = $this->property('pauseOnHoverNivo');
        $this->manualAdvanceNivo = $this->page['manualAdvanceNivo'] = $this->property('manualAdvanceNivo');
        $this->prevTextNivo = $this->page['prevTextNivo'] = $this->property('prevTextNivo');
        $this->nextTextNivo = $this->page['nextTextNivo'] = $this->property('nextTextNivo');
        $this->randomStartNivo = $this->page['randomStartNivo'] = $this->property('randomStartNivo');
        $this->themeNivo = $this->page['themeNivo'] = $this->property('themeNivo');

        // Add vendors
        $this->addCss('assets/vendor/dev7studios/nivo-slider/css/nivo-slider.css');

        // Add theme
        if($this->themeNivo != 'none')
            $this->addCss('assets/vendor/dev7studios/nivo-slider/css/themes/'. $this->themeNivo .'/'. $this->themeNivo .'.css');

        // Include jQuery
        if($this->jqueryIncludeNivo == 'yes')
            $this->addJs('assets/js/jquery-1.9.0.min.js');

        $this->addJs('assets/vendor/dev7studios/nivo-slider/scripts/jquery.nivo.slider.pack.js');
    }
}