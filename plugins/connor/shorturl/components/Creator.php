<?php namespace Connor\ShortURL\Components;

use Cms\Classes\CmsPropertyHelper;
use Cms\Classes\ComponentBase;
use Connor\ShortURL\Models\ShortURL;
use October\Rain\Support\ValidationException;
use System\Classes\ApplicationException;
use Flash;
use Validator;

class Creator extends ComponentBase {

    /**
     * Returns information about this component, including name and description.
     */
    public function componentDetails()
    {
        return [
            'name'        => 'Creator',
            'description' => 'Creates a Short URL.'
        ];
    }

    public function defineProperties()
    {
        return [
            'redirector' => [
                'title'       => 'Redirector',
                'description' => 'Page name that holds to the Short URL \'Redirector\' component',
                'type'        => 'dropdown',
                'default'     => 'N/A'
            ]
        ];
    }

    /**
     * @return array
     * @throws \System\Classes\ApplicationException
     */
    public function getRedirectorOptions()
    {
        return array_merge(['' => 'N/A'], CmsPropertyHelper::listPages());
    }

    public function onCreate()
    {
        $data = post();

        $rules = [
            'targetUrl' => 'required|between:1,1024|url'
        ];

        $validation = Validator::make($data, $rules);
        if ($validation->fails())
            throw new ValidationException($validation);

        $shortUrl = ShortURL::where('url', $data['targetUrl'])
            ->select('short')
            ->first();

        if (!$shortUrl)
        {
            //	Incase of collision
            $key = null;
            for ($i = 0; $i < 12; $i++)
            {
                for ($j = 0; $j < 4; $j++)
                {
                    $key = static::get_short_key(4 + $i);

                    $shortUrl = ShortURL::whereRaw('BINARY short = ?', [$key])
                        ->select('id')
                        ->first();

                    if (!$shortUrl)
                        break;
                }

                if (!$shortUrl)
                    break;
            }

            if ($shortUrl)
                throw new ApplicationException('Failed to generate a unique Short URL.');

            $shortUrl = ShortURL::create([
                'short'  => $key,
                'url'    => $data['targetUrl'],
                'clicks' => 0
            ]);
        }

        $this->page['shortUrl'] = $shortUrl->short;
        $this->page['realUrl']  = $this->controller->pageUrl($this->property('redirector'), ['slug' => $shortUrl->short]);
    }

    protected static function crypto_rand_secure($min, $max)
    {
        $range = $max - $min;
        if ($range < 0) return $min;

        $log = log($range, 2);
        $bytes = (int) ($log / 8) + 1;
        $bits = (int) $log + 1;
        $filter = (int) (1 << $bits) - 1;

        do
        {
            $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
            $rnd = $rnd & $filter;
        } while ($rnd >= $range);

        return $min + $rnd;
    }

    protected static function get_short_key($length)
    {
        $token = '';

        $codeAlphabet  = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $codeAlphabet .= 'abcdefghijklmnopqrstuvwxyz';
        $codeAlphabet .= '0123456789';
        $codeAlphabet .= '-_';

        for($i=0; $i < $length; $i++)
            $token .= $codeAlphabet[static::crypto_rand_secure(0, strlen($codeAlphabet))];

        return $token;
    }

}