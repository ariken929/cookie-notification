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
        $config = CookieNotificationConfig::current_config();
        if ($config->CookieNotice) {
            return $config->dbObject('CookieNotice');
        }
    }

    public function PrivacyPolicy()
    {
        $config = CookieNotificationConfig::current_config();
        if ($config->PrivacyPolicy) {
            return $config->dbObject('PrivacyPolicy');
        }
    }

    public function ThirdPartyScripts()
    {
        $config = CookieNotificationConfig::current_config();
        if ($config->ThirdPartyScripts) {
            return $config->dbObject('ThirdPartyScripts')->raw();
        }
    }

    public function acceptAll()
    {
        Session::set('cookie-all-accepted', true);
        $this->InjectScripts();
    }

    public function acceptEssential()
    {
        Session::set('cookie-essential-accepted', true);
    }

    public function AllAccepted()
    {
        return Session::get('cookie-all-accepted');
    }

    public function EssentialAccepted()
    {
        return Session::get('cookie-essential-accepted');
    }

    public function EssentialCookies(){
        return CookieNotificationConfig::current_config()->Cookies()->filter(array('Type' => 'Essential'))->sort('SortOrder');
    }

    public function OptionalCookies(){
        return CookieNotificationConfig::current_config()->Cookies()->filter(array('Type' => 'Optional'))->sort('SortOrder');
    }

    public function InjectScripts()
    {
        if ($this->AllAccepted()) {
            Requirements::insertHeadTags($this->ThirdPartyScripts());
        }
    }
}