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
        'acceptAll' => 'acceptAll',
        'acceptEssential' => 'acceptEssential',
    );

    private static $allowed_actions = array(
        'acceptAll',
        'acceptEssential'
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

    public function EssentialNotice()
    {
        $config = CookieNotificationConfig::current_config();
        if ($config->EssentialNotice) {
            return $config->dbObject('EssentialNotice');
        }
    }

    public function OptionalNotice()
    {
        $config = CookieNotificationConfig::current_config();
        if ($config->OptionalNotice) {
            return $config->dbObject('OptionalNotice');
        }
    }

    public function ThirdPartyHeadScripts()
    {
        $config = CookieNotificationConfig::current_config();
        if ($config->ThirdPartyHeadScripts) {
            return $config->dbObject('ThirdPartyHeadScripts')->raw();
        }
    }

    public function ThirdPartyBodyScripts()
    {
        $config = CookieNotificationConfig::current_config();
        if ($config->ThirdPartyBodyScripts) {
            return $config->dbObject('ThirdPartyBodyScripts')->raw();
        }
    }

    public function acceptAll()
    {
        /*Session::set('cookie-all-accepted', true);*/
        Cookie::set('cookie-all-accepted', true,90);
        $this->InjectScripts();
    }

    public function acceptEssential()
    {
        /*Session::set('cookie-essential-accepted', true);*/
        Cookie::set('cookie-essential-accepted', true,90);
    }

    public function AllAccepted()
    {
        /*return Session::get('cookie-all-accepted');*/
        return Cookie::get('cookie-all-accepted');
    }

    public function EssentialAccepted()
    {
        /*return Session::get('cookie-essential-accepted');*/
        return Cookie::get('cookie-essential-accepted');
    }

    public function EssentialCookies()
    {
        return CookieNotificationConfig::current_config()->Cookies()->filter(array('Type' => 'Essential'))->sort('SortOrder');
    }

    public function OptionalCookies()
    {
        return CookieNotificationConfig::current_config()->Cookies()->filter(array('Type' => 'Optional'))->sort('SortOrder');
    }

    public function InjectScripts()
    {
        if ($this->AllAccepted()) {
            Requirements::insertHeadTags($this->ThirdPartyHeadScripts());
        }
    }
}