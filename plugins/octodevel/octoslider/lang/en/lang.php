<?php

return [
    // Plugin definitions
    'app' => [
        'name' => 'Slider',
        'description' => 'Create a slideshow for your website using jquery slideshow plugins.',
        'author' => 'Octo Devel',
        'icon' => 'icon-play-circle-o'
    ],
    'navigation' => [
        'items' => 'Sliders',
    ],
    'permissions' => [
        'access_items' => 'OctoSlider - Manage Slides',
    ],

    // Models Definitions
    'models' => [
        // Default translations for models
        'default' => [
            'fields' => [
                'options' => [
                    'yes' => 'Yes',
                    'no' => 'No',
                ],
            ],
        ],
        // Item model
        'item' => [
            'columns' => [
                'title' => 'Title',
                'created_at' => 'Created',
                'updated_at' => 'Updated',
            ],
            'fields' => [
                'label' => [
                    'title' => 'Title',
                    'images' => 'Images',
                ],
            ],
        ],
    ],

    // Controllers Definitions
    'controllers' => [
        // Default translations for controllers
        'default' => [
            'buttons' => [
                'new' => 'New Item',
                'delete' => 'Remove',
            ],
            'confirm' => [
                'delete' => 'Are you sure to remove this item?',
                'selected_delete' => 'Are you sure to remove all selected items?',
            ],
            'return_to_items' => 'Return to item list',
            'data_window_close_confirm' => 'The item is not saved.',
        ],
        // Items controller
        'items' => [
            'title' => 'Octo Slider Items',
            'config_form' => ['name' => 'Slide'],
            'config_list' => ['title' => 'Manage Slider Items'],
            'preview' => ['menu_label' => 'Slider'],
            'functions' => [
                'index_onDelete' => [
                    'success' => 'Successfully deleted those selected.',
                ],
            ],
        ],
    ],

    // Components Definitions
    'components' => [
        'octosliderCamera' => [
            'name' => 'Camera jQuery Plugin',
            'description' => 'Display a slideshow from a selected octoslider item using Camera free jQuery plugin by Pixedelic.',
            'default' => [
                'options' => [
                    'select_one' => '- select one -',
                    'none' => '- none -',
                    'yes' => 'Yes',
                    'no' => 'No',
                    'left' => 'Left',
                    'right' => 'Right',
                    'top' => 'Top',
                    'bottom' => 'Bottom',
                ],
            ],
            'propertyGroups' => [
                'libraries' => 'Libraries',
                'options' => 'Options',
                'loader' => 'Loader',
            ],
            'properties' => [
                'idSlide' => [
                    'title' => 'Slider',
                    'description' => 'Choose the slider item that will display.',
                ],
                'jqueryIncludeCamera' => [
                    'title' => 'Include jQuery',
                    'description' => 'If enabled the plugin will include jQuery library v1.7.1 in your theme. Requirement: jQuery library 1.4 or higher.',
                ],
                'jqueryMigrateIncludeCamera' => [
                    'title' => 'Include jQuery migration?',
                    'description' => 'If the plugin is not working with your library, enable this option. The Camera jQuery Plugin have some incompatibilities with new jQuery versions.',
                ],
                'skinCamera' => [
                    'title' => 'Camera skin',
                    'description' => 'Choose the skin the do you like to use with Camera Plugin.',
                ],
                'navigationCamera' => [
                    'title' => 'Display navigation',
                    'description' => 'If enabled the navigation button (prev, next and play/stop buttons) will be visible, if false they will be always hidden.',
                ],
                'hoverCamera' => [
                    'title' => 'Pause on hover',
                    'description' => 'Pause on state hover. Not available for mobile devices.',
                ],
                'thumbnailsCamera' => [
                    'title' => 'Display thumbnails',
                    'description' => 'Display thumbnails from the slider items image.',
                ],
                'playPauseCamera' => [
                    'title' => 'Display play/pause buttons',
                    'description' => 'Display play/pause buttons control.',
                ],
                'paginationCamera' => [
                    'title' => 'Display pagination',
                    'description' => 'Display slider pagination.',
                ],
                'captionEffectCamera' => [
                    'title' => 'Image caption effect',
                    'description' => 'Choose what effect the image captions will have.',
                ],
                'loaderCamera' => [
                    'title' => 'Display loader',
                    'description' => 'Display a loader status.',
                ],
                'loaderColorCamera' => [
                    'title' => 'Loader color',
                    'description' => 'Use a hexadecimal web color.',
                ],
                'loaderBgColorCamera' => [
                    'title' => 'Loader background color',
                    'description' => 'Use a hexadecimal web color.',
                ],
                'loaderOpacityCamera' => [
                    'title' => 'Loader opacity',
                    'description' => 'Accpted values are: 0, .1, .2, .3, .4, .5, .6, .7, .8, .9, 1',
                    'validationMessage' => 'Invalid format. Accpted values are: 0, .1, .2, .3, .4, .5, .6, .7, .8, .9, 1',
                ],
                'loaderPaddingCamera' => [
                    'title' => 'Loader padding',
                    'description' => 'How many empty pixels you want to display between the loader and its background.',
                    'validationMessage' => 'Invalid format.',
                ],
                'loaderStrokeCamera' => [
                    'title' => 'Loader stroke',
                    'description' => 'The thickness both of the pie loader and of the bar loader. Remember: for the pie, the loader thickness must be less than a half of the pie diameter.',
                    'validationMessage' => 'Invalid format.',
                ],
                'barPositionCamera' => [
                    'title' => 'Loader bar position',
                    'description' => 'Choose the loader bar position.',
                ],
                'barDirectionCamera' => [
                    'title' => 'Loader bar direction',
                    'description' => 'Choose the loader bar direction if your "Display loader" choice was "Bar".',
                ],
            ],
        ],
        'octosliderNivo' => [
            'name' => 'Nivo jQuery Plugin',
            'description' => 'Display a slideshow from a selected octoslider item using Nivo Slider jQuery Plugin by Dev7Studios.',
            'default' => [
                'options' => [
                    'select_one' => '- select one -',
                    'none' => '- none -',
                    'yes' => 'Yes',
                    'no' => 'No',
                    'left' => 'Left',
                    'right' => 'Right',
                    'top' => 'Top',
                    'bottom' => 'Bottom',
                ],
            ],
            'propertyGroups' => [
                'effects' => 'Effects',
                'options' => 'Options',
                'translations' => 'Translations',
            ],
            'properties' => [
                'idSlide' => [
                    'title' => 'Slider',
                    'description' => 'Choose the slider item that will display.',
                ],
                'jqueryIncludeNivo' => [
                    'title' => 'Include jQuery',
                    'description' => 'If enabled the plugin will include jQuery library v1.9 in your theme. Requirement: jQuery library 1.7 or higher.',
                ],
                'effectNivo' => [
                    'title' => 'Effect',
                    'description' => 'Specify the effect for your slides.',
                ],
                'slicesNivo' => [
                    'title' => 'Slice',
                    'description' => 'For slice animations.',
                    'validationMessage' => 'Invalid format.',
                ],
                'boxColsNivo' => [
                    'title' => 'Box Cols',
                    'description' => 'For box animations.',
                    'validationMessage' => 'Invalid format.',
                ],
                'boxRowsNivo' => [
                    'title' => 'Box Rows',
                    'description' => 'For box animations.',
                    'validationMessage' => 'Invalid format.',
                ],
                'animSpeedNivo' => [
                    'title' => 'Animation Speed',
                    'description' => 'Slide transition speed',
                    'validationMessage' => 'Invalid format.',
                ],
                'pauseTimeNivo' => [
                    'title' => 'Pause Time',
                    'description' => 'How long each slide will show',
                    'validationMessage' => 'Invalid format.',
                ],
                'startSlideNivo' => [
                    'title' => 'Start Slide',
                    'description' => 'Set starting Slide (0 index).',
                    'validationMessage' => 'Invalid format.',
                ],
                'directionNavNivo' => [
                    'title' => 'Direction Navigation',
                    'description' => 'Display Next & Prev navigation',
                ],
                'controlNavNivo' => [
                    'title' => 'Control Navigation',
                    'description' => 'Display 1,2,3... navigation.',
                ],
                'controlNavThumbsNivo' => [
                    'title' => 'Control Navigation Thumbs',
                    'description' => 'Use thumbnails for Control Navigation.',
                ],
                'pauseOnHoverNivo' => [
                    'title' => 'Pause on Hover',
                    'description' => 'Pause on state hover. Not available for mobile devices.',
                ],
                'manualAdvanceNivo' => [
                    'title' => 'Manual Advance',
                    'description' => 'Force manual transitions.',
                ],
                'randomStartNivo' => [
                    'title' => 'Random Start',
                    'description' => 'Start on a random slide.',
                ],
                'themeNivo' => [
                    'title' => 'Theme',
                    'description' => 'Set a theme for your Nivo Slider or set as none to use your own.',
                ],
                'prevTextNivo' => [
                    'title' => 'Prev Text',
                    'description' => 'Prev direction navigation text.',
                ],
                'nextTextNivo' => [
                    'title' => 'Next Text',
                    'description' => 'Next direction navigation text.',
                ],
            ],
        ],
        'octosliderSimple' => [
            'name' => 'Simple Item',
            'description' => 'Display a selected octoslider item. You can use any jQuery slideshow plugin you want.',
            'default' => [
                'options' => [
                    'select_one' => '- select one -',
                ],
            ],
            'properties' => [
                'idSlide' => [
                    'title' => 'Slider',
                    'description' => 'Choose the slider item that will display.',
                ],
            ],
        ],
    ],
];