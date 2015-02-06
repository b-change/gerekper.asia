<?php namespace OctoDevel\OctoSlider\Components;

use \DB;
use \Lang;
use Validator;
use Cms\Classes\ComponentBase;
use October\Rain\Support\ValidationException;
use OctoDevel\OctoSlider\Models\Item as SliderItem;

class Camera extends ComponentBase
{
    public $cameraItems;
    public $jqueryIncludeCamera;
    public $jqueryMigrateIncludeCamera;
    public $skinCamera;
    public $navigationCamera;
    public $loaderCamera;
    public $loaderColorCamera;
    public $loaderBgColorCamera;
    public $loaderOpacityCamera;
    public $loaderPaddingCamera;
    public $loaderStrokeCamera;
    public $barPositionCamera;
    public $barDirectionCamera;
    public $hoverCamera;
    public $thumbnailsCamera;
    public $playPauseCamera;
    public $paginationCamera;
    public $captionEffectCamera;

    public function componentDetails()
    {
        return [
            'name' => 'octodevel.octoslider::lang.components.octosliderCamera.name',
            'description' => 'octodevel.octoslider::lang.components.octosliderCamera.description'
        ];
    }

    public function defineProperties()
    {
        return [
            'idSlide' => [
                'title' => 'octodevel.octoslider::lang.components.octosliderCamera.properties.idSlide.title',
                'description' => 'octodevel.octoslider::lang.components.octosliderCamera.properties.idSlide.description',
                'type'         => 'dropdown',
                'default'      => '',
                'showExternalParam' => false,
            ],
            'jqueryIncludeCamera' => [
                'title' => 'octodevel.octoslider::lang.components.octosliderCamera.properties.jqueryIncludeCamera.title',
                'description' => 'octodevel.octoslider::lang.components.octosliderCamera.properties.jqueryIncludeCamera.description',
                'type'         => 'dropdown',
                'default'      => 'no',
                'group'        => Lang::get('octodevel.octoslider::lang.components.octosliderCamera.propertyGroups.libraries'),
                'showExternalParam' => false,
            ],
            'jqueryMigrateIncludeCamera' => [
                'title' => 'octodevel.octoslider::lang.components.octosliderCamera.properties.jqueryMigrateIncludeCamera.title',
                'description' => 'octodevel.octoslider::lang.components.octosliderCamera.properties.jqueryMigrateIncludeCamera.description',
                'type'         => 'dropdown',
                'default'      => 'no',
                'group'        => Lang::get('octodevel.octoslider::lang.components.octosliderCamera.propertyGroups.libraries'),
                'showExternalParam' => false,
            ],
            'skinCamera' => [
                'title' => 'octodevel.octoslider::lang.components.octosliderCamera.properties.skinCamera.title',
                'description' => 'octodevel.octoslider::lang.components.octosliderCamera.properties.skinCamera.description',
                'type'         => 'dropdown',
                'default'      => 'camera_azure_skin',
                'group'        => Lang::get('octodevel.octoslider::lang.components.octosliderCamera.propertyGroups.options'),
                'showExternalParam' => false,
            ],
            'navigationCamera' => [
                'title' => 'octodevel.octoslider::lang.components.octosliderCamera.properties.navigationCamera.title',
                'description' => 'octodevel.octoslider::lang.components.octosliderCamera.properties.navigationCamera.description',
                'type'         => 'dropdown',
                'default'      => 'false',
                'group'        => Lang::get('octodevel.octoslider::lang.components.octosliderCamera.propertyGroups.options'),
                'showExternalParam' => false,
            ],
            'hoverCamera' => [
                'title' => 'octodevel.octoslider::lang.components.octosliderCamera.properties.hoverCamera.title',
                'description' => 'octodevel.octoslider::lang.components.octosliderCamera.properties.hoverCamera.description',
                'type'        => 'dropdown',
                'default'     => 'true',
                'group'       => Lang::get('octodevel.octoslider::lang.components.octosliderCamera.propertyGroups.options'),
                'showExternalParam' => false,
            ],
            'thumbnailsCamera' => [
                'title' => 'octodevel.octoslider::lang.components.octosliderCamera.properties.thumbnailsCamera.title',
                'description' => 'octodevel.octoslider::lang.components.octosliderCamera.properties.thumbnailsCamera.description',
                'type'        => 'dropdown',
                'default'     => 'true',
                'group'       => Lang::get('octodevel.octoslider::lang.components.octosliderCamera.propertyGroups.options'),
                'showExternalParam' => false,
            ],
            'playPauseCamera' => [
                'title' => 'octodevel.octoslider::lang.components.octosliderCamera.properties.playPauseCamera.title',
                'description' => 'octodevel.octoslider::lang.components.octosliderCamera.properties.playPauseCamera.description',
                'type'        => 'dropdown',
                'default'     => 'false',
                'group'       => Lang::get('octodevel.octoslider::lang.components.octosliderCamera.propertyGroups.options'),
                'showExternalParam' => false,
            ],
            'paginationCamera' => [
                'title' => 'octodevel.octoslider::lang.components.octosliderCamera.properties.paginationCamera.title',
                'description' => 'octodevel.octoslider::lang.components.octosliderCamera.properties.paginationCamera.description',
                'type'        => 'dropdown',
                'default'     => 'true',
                'group'       => Lang::get('octodevel.octoslider::lang.components.octosliderCamera.propertyGroups.options'),
                'showExternalParam' => false,
            ],
            'captionEffectCamera' => [
                'title' => 'octodevel.octoslider::lang.components.octosliderCamera.properties.captionEffectCamera.title',
                'description' => 'octodevel.octoslider::lang.components.octosliderCamera.properties.captionEffectCamera.description',
                'type'        => 'dropdown',
                'default'     => 'fadeFromBottom',
                'group'       => Lang::get('octodevel.octoslider::lang.components.octosliderCamera.propertyGroups.options'),
                'showExternalParam' => false,
            ],
            'loaderCamera' => [
                'title' => 'octodevel.octoslider::lang.components.octosliderCamera.properties.loaderCamera.title',
                'description' => 'octodevel.octoslider::lang.components.octosliderCamera.properties.loaderCamera.description',
                'type'        => 'dropdown',
                'default'     => 'pie',
                'group'       => Lang::get('octodevel.octoslider::lang.components.octosliderCamera.propertyGroups.loader'),
                'showExternalParam' => false,
            ],
            'loaderColorCamera' => [
                'title' => 'octodevel.octoslider::lang.components.octosliderCamera.properties.loaderColorCamera.title',
                'description' => 'octodevel.octoslider::lang.components.octosliderCamera.properties.loaderColorCamera.description',
                'type'        => 'string',
                'default'     => '#eeeeee',
                'group'       => Lang::get('octodevel.octoslider::lang.components.octosliderCamera.propertyGroups.loader'),
                'showExternalParam' => false,
            ],
            'loaderBgColorCamera' => [
                'title' => 'octodevel.octoslider::lang.components.octosliderCamera.properties.loaderBgColorCamera.title',
                'description' => 'octodevel.octoslider::lang.components.octosliderCamera.properties.loaderBgColorCamera.description',
                'type'        => 'string',
                'default'     => '#222222',
                'group'       => Lang::get('octodevel.octoslider::lang.components.octosliderCamera.propertyGroups.loader'),
                'showExternalParam' => false,
            ],
            'loaderOpacityCamera' => [
                'title' => 'octodevel.octoslider::lang.components.octosliderCamera.properties.loaderOpacityCamera.title',
                'description' => 'octodevel.octoslider::lang.components.octosliderCamera.properties.loaderOpacityCamera.description',
                'type'        => 'string',
                'validationPattern' => '^(\.[1-9]|0|1)$',
                'validationMessage' => Lang::get('octodevel.octoslider::lang.components.octosliderCamera.properties.loaderStrokeCamera.validationMessage'),
                'default'     => '.8',
                'group'       => Lang::get('octodevel.octoslider::lang.components.octosliderCamera.propertyGroups.loader'),
                'showExternalParam' => false,
            ],
            'loaderPaddingCamera' => [
                'title' => 'octodevel.octoslider::lang.components.octosliderCamera.properties.loaderPaddingCamera.title',
                'description' => 'octodevel.octoslider::lang.components.octosliderCamera.properties.loaderPaddingCamera.description',
                'type'        => 'string',
                'validationPattern' => '^[0-9]+$',
                'validationMessage' => Lang::get('octodevel.octoslider::lang.components.octosliderCamera.properties.loaderStrokeCamera.validationMessage'),
                'default'     => '2',
                'group'       => Lang::get('octodevel.octoslider::lang.components.octosliderCamera.propertyGroups.loader'),
                'showExternalParam' => false,
            ],
            'loaderStrokeCamera' => [
                'title' => 'octodevel.octoslider::lang.components.octosliderCamera.properties.loaderStrokeCamera.title',
                'description' => 'octodevel.octoslider::lang.components.octosliderCamera.properties.loaderStrokeCamera.description',
                'type'        => 'string',
                'validationPattern' => '^[0-9]+$',
                'validationMessage' => Lang::get('octodevel.octoslider::lang.components.octosliderCamera.properties.loaderStrokeCamera.validationMessage'),
                'default'     => '7',
                'group'       => Lang::get('octodevel.octoslider::lang.components.octosliderCamera.propertyGroups.loader'),
                'showExternalParam' => false,
            ],
            'barPositionCamera' => [
                'title' => 'octodevel.octoslider::lang.components.octosliderCamera.properties.barPositionCamera.title',
                'description' => 'octodevel.octoslider::lang.components.octosliderCamera.properties.barPositionCamera.description',
                'type'        => 'dropdown',
                'default'     => 'bottom',
                'group'       => Lang::get('octodevel.octoslider::lang.components.octosliderCamera.propertyGroups.loader'),
                'showExternalParam' => false,
            ],
            'barDirectionCamera' => [
                'title' => 'octodevel.octoslider::lang.components.octosliderCamera.properties.barDirectionCamera.title',
                'description' => 'octodevel.octoslider::lang.components.octosliderCamera.properties.barDirectionCamera.description',
                'type'        => 'dropdown',
                'default'     => 'leftToRight',
                'group'       => Lang::get('octodevel.octoslider::lang.components.octosliderCamera.propertyGroups.loader'),
                'showExternalParam' => false,
            ]
        ];
    }

    public function getIdSlideOptions()
    {
        $slides = SliderItem::all();

        $array_dropdown = [0 => Lang::get('octodevel.octoslider::lang.components.octosliderCamera.default.options.select_one')];

        foreach ($slides as $slide)
        {
            $array_dropdown[$slide->id] = $slide->title;
        }

        return $array_dropdown;
    }

    public function getJqueryIncludeCameraOptions()
    {
        return ['no' => Lang::get('octodevel.octoslider::lang.components.octosliderCamera.default.options.no'), 'yes' => Lang::get('octodevel.octoslider::lang.components.octosliderCamera.default.options.yes')];
    }

    public function getJqueryMigrateIncludeCameraOptions()
    {
        return ['no' => Lang::get('octodevel.octoslider::lang.components.octosliderCamera.default.options.no'), 'yes' => Lang::get('octodevel.octoslider::lang.components.octosliderCamera.default.options.yes')];
    }

    public function getSkinCameraOptions()
    {
        return [
            'camera_custom_skin'    => 'My Custom Skin',
            'camera_amber_skin'     => 'Camera amber',
            'camera_ash_skin'       => 'Camera ash',
            'camera_azure_skin'     => 'Camera azure',
            'camera_beige_skin'     => 'Camera beige',
            'camera_black_skin'     => 'Camera black',
            'camera_blue_skin'      => 'Camera blue',
            'camera_brown_skin'     => 'Camera brown',
            'camera_burgundy_skin'  => 'Camera burgundy',
            'camera_charcoal_skin'  => 'Camera charcoal',
            'camera_chocolate_skin' => 'Camera chocolate',
            'camera_coffee_skin'    => 'Camera coffee',
            'camera_cyan_skin'      => 'Camera cyan',
            'camera_fuchsia_skin'   => 'Camera fuchsia',
            'camera_gold_skin'      => 'Camera gold',
            'camera_green_skin'     => 'Camera green',
            'camera_grey_skin'      => 'Camera grey',
            'camera_indigo_skin'    => 'Camera indigo',
            'camera_khaki_skin'     => 'Camera khaki',
            'camera_lime_skin'      => 'Camera lime',
            'camera_magenta_skin'   => 'Camera magenta',
            'camera_maroon_skin'    => 'Camera maroon',
            'camera_orange_skin'    => 'Camera orange',
            'camera_olive_skin'     => 'Camera olive',
            'camera_pink_skin'      => 'Camera pink',
            'camera_pistachio_skin' => 'Camera pistachio',
            'camera_pink_skin'      => 'Camera pink',
            'camera_red_skin'       => 'Camera red',
            'camera_tangerine_skin' => 'Camera tangerine',
            'camera_turquoise_skin' => 'Camera turquoise',
            'camera_violet_skin'    => 'Camera violet',
            'camera_white_skin'     => 'Camera white',
            'camera_yellow_skin'    => 'Camera yellow',
        ];
    }

    public function getNavigationCameraOptions()
    {
        return ['false' => Lang::get('octodevel.octoslider::lang.components.octosliderCamera.default.options.no'), 'true' => Lang::get('octodevel.octoslider::lang.components.octosliderCamera.default.options.yes')];
    }

    public function getLoaderCameraOptions()
    {
        return ['pie' => 'Pie', 'bar' => 'Bar', 'none' => 'None'];
    }

    public function getHoverCameraOptions()
    {
        return ['false' => Lang::get('octodevel.octoslider::lang.components.octosliderCamera.default.options.no'), 'true' => Lang::get('octodevel.octoslider::lang.components.octosliderCamera.default.options.yes')];
    }

    public function getThumbnailsCameraOptions()
    {
        return ['false' => Lang::get('octodevel.octoslider::lang.components.octosliderCamera.default.options.no'), 'true' => Lang::get('octodevel.octoslider::lang.components.octosliderCamera.default.options.yes')];
    }

    public function getPlayPauseCameraOptions()
    {
        return ['false' => Lang::get('octodevel.octoslider::lang.components.octosliderCamera.default.options.no'), 'true' => Lang::get('octodevel.octoslider::lang.components.octosliderCamera.default.options.yes')];
    }

    public function getPaginationCameraOptions()
    {
        return ['false' => Lang::get('octodevel.octoslider::lang.components.octosliderCamera.default.options.no'), 'true' => Lang::get('octodevel.octoslider::lang.components.octosliderCamera.default.options.yes')];
    }

    public function getBarDirectionCameraOptions()
    {
        return ['leftToRight' => 'Left to right', 'rightToLeft' => 'Right to left', 'topToBottom' => 'Top to bottom', 'bottomToTop' => 'Bottom to top'];
    }

    public function getBarPositionCameraOptions()
    {
        return [
            'left' => Lang::get('octodevel.octoslider::lang.components.octosliderCamera.default.options.left'),
            'right' => Lang::get('octodevel.octoslider::lang.components.octosliderCamera.default.options.right'),
            'top' => Lang::get('octodevel.octoslider::lang.components.octosliderCamera.default.options.top'),
            'bottom' => Lang::get('octodevel.octoslider::lang.components.octosliderCamera.default.options.bottom')
        ];
    }

    public function getCaptionEffectCameraOptions()
    {
        return ['moveFromLeft' => 'Move from left', 'moveFomRight' => 'Move from right', 'moveFromTop' => 'Move from top', 'moveFromBottom' => 'Move from bottom', 'fadeIn' => 'Fade in', 'fadeFromLeft' => 'Fade from left', 'fadeFromRight' => 'Fade from right', 'fadeFromTop' => 'Fade from top', 'fadeFromBottom' => 'Fade from bottom'];
    }

    public function onRun()
    {
        // Getting register
        $sliderItem = new SliderItem();
        $item = $sliderItem->where('id', '=', $this->property('idSlide'))->first();
        $this->cameraItems = $this->page['cameraItems'] = $item;

        // Setting parameters
        $this->jqueryIncludeCamera = $this->page['jqueryIncludeCamera'] = $this->property('jqueryIncludeCamera');
        $this->jqueryMigrateIncludeCamera = $this->page['jqueryMigrateIncludeCamera'] = $this->property('jqueryMigrateIncludeCamera');
        $this->skinCamera = $this->page['skinCamera'] = $this->property('skinCamera');
        $this->navigationCamera = $this->page['navigationCamera'] = $this->property('navigationCamera');
        $this->loaderCamera = $this->page['loaderCamera'] = $this->property('loaderCamera');
        $this->loaderColorCamera = $this->page['loaderColorCamera'] = $this->property('loaderColorCamera');
        $this->loaderBgColorCamera = $this->page['loaderBgColorCamera'] = $this->property('loaderBgColorCamera');
        $this->loaderOpacityCamera = $this->page['loaderOpacityCamera'] = $this->property('loaderOpacityCamera');
        $this->loaderPaddingCamera = $this->page['loaderPaddingCamera'] = $this->property('loaderPaddingCamera');
        $this->loaderStrokeCamera = $this->page['loaderStrokeCamera'] = $this->property('loaderStrokeCamera');
        $this->barPositionCamera = $this->page['barPositionCamera'] = $this->property('barPositionCamera');
        $this->barDirectionCamera = $this->page['barDirectionCamera'] = $this->property('barDirectionCamera');
        $this->hoverCamera = $this->page['hoverCamera'] = $this->property('hoverCamera');
        $this->thumbnailsCamera = $this->page['thumbnailsCamera'] = $this->property('thumbnailsCamera');
        $this->playPauseCamera = $this->page['playPauseCamera'] = $this->property('playPauseCamera');
        $this->paginationCamera = $this->page['paginationCamera'] = $this->property('paginationCamera');
        $this->captionEffectCamera = $this->page['captionEffectCamera'] = $this->property('captionEffectCamera');

        // Add vendors
        $this->addCss('assets/vendor/pixedelic/camera/css/camera.css');

        // Include jQuery
        if($this->jqueryIncludeCamera == 'yes')
            $this->addJs('assets/js/jquery-1.7.1.min.js');

        // Include jQuery Migration
        if($this->jqueryMigrateIncludeCamera == 'yes')
            $this->addJs('assets/js/jquery-migrate-1.2.1.min.js');

        $this->addJs('assets/vendor/pixedelic/camera/scripts/jquery.mobile.customized.min.js');
        $this->addJs('assets/vendor/pixedelic/camera/scripts/jquery.easing.1.3.js');
        $this->addJs('assets/vendor/pixedelic/camera/scripts/camera.min.js');
    }
}