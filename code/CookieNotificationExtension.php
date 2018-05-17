<?php

/**
 * Created by PhpStorm.
 * User: Carey
 * Date: 5/17/2018
 * Time: 10:59 AM
 */
class CookieNotificationExtension extends Extension
{
    private static $url_handlers = array(
        'accept' => 'accept'
    );
    private static $allowed_actions = array(
        'accept'
    );

    public function onAfterInit()
    {
        Requirements::css('cookie-notification/css/main.css');
        Requirements::javascript('cookie-notification/js/main.js');
    }

    public function CookieNotice()
    {
        $config = SiteConfig::current_site_config();
        if ($config->CookieNotice) {
            $notice = $config->dbObject('CookieNotice');

            if ($this->owner->getRequest()->isAjax()) {
                return $this->jsonResponse(array('HTML' => $this->owner->customise(array('CookieNotice' => $notice))->renderWith('CookieNotice')->forTemplate()));
            }

            return $notice;
        }
    }

    public function accept()
    {
        Session::set('cookie-gdpr-accepted', true);
        $this->InjectScripts();
    }

    public function CookiesAccepted()
    {
        return Session::get('cookie-gdpr-accepted');
    }

    public function InjectScripts()
    {
        $config = SiteConfig::current_site_config();
        if ($this->cookiesAccepted()) {
            Requirements::insertHeadTags($config->ThirdPartyScripts);
        }
    }

    public function jsonResponse($array)
    {
        $response = new SS_HTTPResponse(Convert::raw2json($array));
        $response->addHeader('Content-Type', 'application/json');

        return $response;
    }
}