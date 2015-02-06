<?php namespace Connor\ShortURL\Components;

use Cms\Classes\CmsPropertyHelper;
use Cms\Classes\ComponentBase;
use Connor\ShortURL\Models\Settings;
use Connor\ShortURL\Models\ShortURL;
use Redirect;
use BackendAuth;

class Redirector extends ComponentBase {

    /**
     * Returns information about this component, including name and description.
     */
    public function componentDetails()
    {
        return [
            'name'        => 'Redirector',
            'description' => 'Redirects a Short URL.'
        ];
    }

    public function defineProperties()
    {
        return [
            'slug'    => [
                'title'             => 'Slug',
                'description'       => 'The URL route parameter to look up the Short URL by.',
                'type'              => 'string',
                'default'           => 'slug'
            ],
            'redirect' => [
                'title'       => 'Redirect to',
                'description' => 'Page name to redirect if the Short URL doesn\'t exist.',
                'type'        => 'dropdown',
                'default'     => 'N/A'
            ]
        ];
    }

    /**
     * @return array
     * @throws \System\Classes\ApplicationException
     */
    public function getRedirectOptions()
    {
        return array_merge(['' => 'N/A'], CmsPropertyHelper::listPages());
    }

    /**
     * Executed when this component is bound to a page or layout.
     */
    public function onRun()
    {
        $slug = $this->param($this->property('slug'));

        $info = stripos(strrev($slug), 'ofni.') === 0;
        if ($info)
            $slug = substr($slug, 0, strlen($slug) - 5);

        $shortURL = ShortURL::whereRaw('BINARY short = ?', [$slug])
            ->select('id', 'short', 'url', 'clicks', 'updated_at')
            ->first();

        if ($shortURL)
        {
            $allowed = false;
            $allow_info =  Settings::get('allow_info', 'nobody');

            if ($allow_info == 'anybody' || ($allow_info == 'logged_in' && BackendAuth::check()))
                $allowed = true;

            if ($info && $allowed)
            {
                $this->page['clicks'] = $shortURL->clicks;
                $this->page['lastClick'] = $shortURL->updated_at;
            }
            else
            {
                $shortURL->clicks++;
                $shortURL->update();

                return Redirect::to($shortURL->url);
            }
        }
        else if ($this->property('redirect', 'N/A') !== 'N/A')
                return Redirect::to($this->controller->pageUrl($this->property('redirect')));

        $this->page['shortUrl'] = $slug;

        if ($shortURL)
            $this->page['targetUrl'] = $shortURL->url;
    }

    protected static function get_domain()
    {
        $domain = $_SERVER['SERVER_NAME'];
        if (preg_match('/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i', $domain, $regs)) {
            return $regs['domain'];
        }

        return '';
    }

}