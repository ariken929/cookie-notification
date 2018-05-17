<?php
/**
 * Created by PhpStorm.
 * User: Carey
 * Date: 5/17/2018
 * Time: 11:19 AM
 */

class CookieNotificationSiteConfig extends DataExtension
{
    private static $db = array(
        'CookieNotice' => 'HTMLText',
        'ThirdPartyScripts' => 'Text'
    );

    public function updateCMSFields(FieldList $fields)
    {
        $fields->addFieldsToTab('Root.GDPR', array(
            HtmlEditorField::create('CookieNotice', 'Cookie Notice'),
            TextareaField::create('ThirdPartyScripts', 'Third Party Scripts')
                ->setDescription('paste any third-party scripts that you would like to place in the page head that requires user consent.'),
        ));
    }
}