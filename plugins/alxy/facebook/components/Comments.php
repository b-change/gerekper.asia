<?php namespace Alxy\Facebook\Components;

use Cms\Classes\ComponentBase;
use HTML;
use Alxy\Facebook\Models\Settings;

class Comments extends ComponentBase
{

    public $appId;
    public $lang;
    public $attributes;

    public function componentDetails()
    {
        return [
            'name'        => 'Comments',
            'description' => 'Display a Facebook Comments Box.'
        ];
    }

    public function defineProperties()
    {
        return [
            'data-colorscheme' => [
                 'title'             => 'Color scheme',
                 'description'       => 'The color scheme used by the plugin.',
                 'default'           => 'light',
                 'type'              => 'dropdown',
                 'options'           => [
                    'light' => 'light',
                    'dark' => 'dark'
                 ]
            ],
            'data-href' => [
                 'title'             => 'URL',
                 'description'       => 'The absolute URL that comments posted in the plugin will be permanently associated with. Stories on Facebook about comments posted in the plugin will link to this URL.',
                 'type'              => 'string',
            ],
            'data-kid-directed-site' => [
                 'title'             => 'Kid directed site',
                 'description'       => 'If your web site or online service, or a portion of your service, is directed to children under 13 you must enable this.',
                 'default'           => 0,
                 'type'              => 'checkbox'
            ],
            'data-numposts' => [
                 'title'             => 'Number of Posts',
                 'description'       => 'The number of comments to show by default. The minimum value is 1.',
                 'default'           => '10',
                 'type'              => 'string',
                 'validationPattern' => '^(\d+)?$',
                 'validationMessage' => 'The width must be an integer.'
            ],
            'data-order-by' => [
                 'title'             => 'Order by',
                 'description'       => 'The order to use when displaying comments. ',
                 'default'           => 'social',
                 'type'              => 'dropdown',
                 'options'           => [
                    'social' => 'social',
                    'reverse_time' => 'reverse_time',
                    'time' => 'time'
                 ]
            ],
            'data-width' => [
                 'title'             => 'Width',
                 'description'       => 'The width of the plugin. Either a pixel value or the literal 100% for fluid width. The mobile version of the Comments plugin ignores the width parameter, and instead has a fluid width of 100%.',
                 'default'           => '550',
                 'type'              => 'string',
                 'validationPattern' => '^(\d+(px|%)?)?$',
                 'validationMessage' => 'The width must be either pixel value or percentage.'
            ],
            'lang' => [
                'title'             => 'Language',
                'type'              => 'dropdown',
                'default'           => 'en',
                'placeholder'       => 'Select language',
                'options'           => [
                    "aa" => "Afar",
                    "ab" => "Abkhazian",
                    "ae" => "Avestan",
                    "af" => "Afrikaans",
                    "ak" => "Akan",
                    "am" => "Amharic",
                    "an" => "Aragonese",
                    "ar" => "Arabic",
                    "as" => "Assamese",
                    "av" => "Avaric",
                    "ay" => "Aymara",
                    "az" => "Azerbaijani",
                    "ba" => "Bashkir",
                    "be" => "Belarusian",
                    "bg" => "Bulgarian",
                    "bh" => "Bihari",
                    "bi" => "Bislama",
                    "bm" => "Bambara",
                    "bn" => "Bengali",
                    "bo" => "Tibetan",
                    "br" => "Breton",
                    "bs" => "Bosnian",
                    "ca" => "Catalan",
                    "ce" => "Chechen",
                    "ch" => "Chamorro",
                    "co" => "Corsican",
                    "cr" => "Cree",
                    "cs" => "Czech",
                    "cu" => "Church Slavic",
                    "cv" => "Chuvash",
                    "cy" => "Welsh",
                    "da" => "Danish",
                    "de" => "German",
                    "dv" => "Divehi",
                    "dz" => "Dzongkha",
                    "ee" => "Ewe",
                    "el" => "Greek",
                    "en" => "English",
                    "eo" => "Esperanto",
                    "es" => "Spanish",
                    "et" => "Estonian",
                    "eu" => "Basque",
                    "fa" => "Persian",
                    "ff" => "Fulah",
                    "fi" => "Finnish",
                    "fj" => "Fijian",
                    "fo" => "Faroese",
                    "fr" => "French",
                    "fy" => "Western Frisian",
                    "ga" => "Irish",
                    "gd" => "Scottish Gaelic",
                    "gl" => "Galician",
                    "gn" => "Guarani",
                    "gu" => "Gujarati",
                    "gv" => "Manx",
                    "ha" => "Hausa",
                    "he" => "Hebrew",
                    "hi" => "Hindi",
                    "ho" => "Hiri Motu",
                    "hr" => "Croatian",
                    "ht" => "Haitian",
                    "hu" => "Hungarian",
                    "hy" => "Armenian",
                    "hz" => "Herero",
                    "ia" => "Interlingua (International Auxiliary Language Association)",
                    "id" => "Indonesian",
                    "ie" => "Interlingue",
                    "ig" => "Igbo",
                    "ii" => "Sichuan Yi",
                    "ik" => "Inupiaq",
                    "io" => "Ido",
                    "is" => "Icelandic",
                    "it" => "Italian",
                    "iu" => "Inuktitut",
                    "ja" => "Japanese",
                    "jv" => "Javanese",
                    "ka" => "Georgian",
                    "kg" => "Kongo",
                    "ki" => "Kikuyu",
                    "kj" => "Kwanyama",
                    "kk" => "Kazakh",
                    "kl" => "Kalaallisut",
                    "km" => "Khmer",
                    "kn" => "Kannada",
                    "ko" => "Korean",
                    "kr" => "Kanuri",
                    "ks" => "Kashmiri",
                    "ku" => "Kurdish",
                    "kv" => "Komi",
                    "kw" => "Cornish",
                    "ky" => "Kirghiz",
                    "la" => "Latin",
                    "lb" => "Luxembourgish",
                    "lg" => "Ganda",
                    "li" => "Limburgish",
                    "ln" => "Lingala",
                    "lo" => "Lao",
                    "lt" => "Lithuanian",
                    "lu" => "Luba-Katanga",
                    "lv" => "Latvian",
                    "mg" => "Malagasy",
                    "mh" => "Marshallese",
                    "mi" => "Maori",
                    "mk" => "Macedonian",
                    "ml" => "Malayalam",
                    "mn" => "Mongolian",
                    "mr" => "Marathi",
                    "ms" => "Malay",
                    "mt" => "Maltese",
                    "my" => "Burmese",
                    "na" => "Nauru",
                    "nb" => "Norwegian Bokmal",
                    "nd" => "North Ndebele",
                    "ne" => "Nepali",
                    "ng" => "Ndonga",
                    "nl" => "Dutch",
                    "nn" => "Norwegian Nynorsk",
                    "no" => "Norwegian",
                    "nr" => "South Ndebele",
                    "nv" => "Navajo",
                    "ny" => "Chichewa",
                    "oc" => "Occitan",
                    "oj" => "Ojibwa",
                    "om" => "Oromo",
                    "or" => "Oriya",
                    "os" => "Ossetian",
                    "pa" => "Panjabi",
                    "pi" => "Pali",
                    "pl" => "Polish",
                    "ps" => "Pashto",
                    "pt" => "Portuguese",
                    "qu" => "Quechua",
                    "rm" => "Raeto-Romance",
                    "rn" => "Kirundi",
                    "ro" => "Romanian",
                    "ru" => "Russian",
                    "rw" => "Kinyarwanda",
                    "sa" => "Sanskrit",
                    "sc" => "Sardinian",
                    "sd" => "Sindhi",
                    "se" => "Northern Sami",
                    "sg" => "Sango",
                    "si" => "Sinhala",
                    "sk" => "Slovak",
                    "sl" => "Slovenian",
                    "sm" => "Samoan",
                    "sn" => "Shona",
                    "so" => "Somali",
                    "sq" => "Albanian",
                    "sr" => "Serbian",
                    "ss" => "Swati",
                    "st" => "Southern Sotho",
                    "su" => "Sundanese",
                    "sv" => "Swedish",
                    "sw" => "Swahili",
                    "ta" => "Tamil",
                    "te" => "Telugu",
                    "tg" => "Tajik",
                    "th" => "Thai",
                    "ti" => "Tigrinya",
                    "tk" => "Turkmen",
                    "tl" => "Tagalog",
                    "tn" => "Tswana",
                    "to" => "Tonga",
                    "tr" => "Turkish",
                    "ts" => "Tsonga",
                    "tt" => "Tatar",
                    "tw" => "Twi",
                    "ty" => "Tahitian",
                    "ug" => "Uighur",
                    "uk" => "Ukrainian",
                    "ur" => "Urdu",
                    "uz" => "Uzbek",
                    "ve" => "Venda",
                    "vi" => "Vietnamese",
                    "vo" => "Volapuk",
                    "wa" => "Walloon",
                    "wo" => "Wolof",
                    "xh" => "Xhosa",
                    "yi" => "Yiddish",
                    "yo" => "Yoruba",
                    "za" => "Zhuang",
                    "zh" => "Chinese",
                    "zu" => "Zulu"
                ]
            ]
        ];
    }

    public function onRun() {
        $attributes = array_except($this->getProperties(), ['lang']);
        array_walk($attributes, function(&$value, $key) {
            switch ($value) {
                case '1':
                    $value = 'true';
                    break;

                case '0':
                    $value = 'false';
                    break;
                
                default:
                    $value = $value;
                    break;
            }
        });
        $this->attributes = HTML::attributes($attributes);
        $this->lang = $this->property('lang');
        $this->appId = Settings::get('app_id');
    }

}