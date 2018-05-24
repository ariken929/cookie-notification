<?php
/**
 * Created by PhpStorm.
 * User: Carey
 * Date: 5/17/2018
 * Time: 11:19 AM
 */

class CookieNotificationConfig extends DataObject implements PermissionProvider
{
    private static $db = array(
        'CookieNotice' => 'HTMLText',
        'PrivacyPolicy' => 'HTMLText',
        'ThirdPartyHeadScripts' => 'Text',
        'ThirdPartyBodyScripts' => 'Text',
    );

    private static $many_many = array(
        'Cookies' => 'CookieDescription'
    );

    private static $many_many_extraFields = array(
        'Cookies' => array(
            'SortOrder' => 'Int'
        )
    );

    public function getCMSFields()
    {
        $fields = new FieldList(
            new TabSet("Root",
                new Tab('GDPR',
                    HtmlEditorField::create('CookieNotice', 'Cookie Notice'),
                    HtmlEditorField::create('PrivacyPolicy', 'Privacy Policy'),
                    TextareaField::create('ThirdPartyHeadScripts', 'Third Party Head Scripts')->setRows(20)
                        ->setDescription('paste any third-party scripts that you would like to place in the page head.'),
                    TextareaField::create('ThirdPartyBodyScripts', 'Third Party Body Scripts')->setRows(20)
                        ->setDescription('paste any third-party scripts that you would like to place in the page body.'),
                    GridField::create('Cookies', 'Cookies', $this->Cookies(),
                        GridFieldConfig_RelationEditor::create()->addComponent(GridFieldOrderableRows::create('SortOrder')))
                )
            )
        );

        $this->extend('updateCMSFields', $fields);
        return $fields;
    }

    public static function current_config()
    {
        $config = CookieNotificationConfig::get()->first();
        if (!$config) {
            $config = CookieNotificationConfig::create();
            $config->write();
        }
        return $config;
    }

    public function providePermissions()
    {
        return array(
            'EDIT_SITECONFIG' => array(
                'name' => _t('SiteConfig.EDIT_PERMISSION', 'Manage site configuration'),
                'category' => _t('Permissions.PERMISSIONS_CATEGORY', 'Roles and access permissions'),
                'help' => _t('SiteConfig.EDIT_PERMISSION_HELP', 'Ability to edit global access settings/top-level page permissions.'),
                'sort' => 400
            )
        );
    }

    public function getCMSActions()
    {
        if (Permission::check('ADMIN') || Permission::check('EDIT_SITECONFIG')) {
            $actions = new FieldList(
                FormAction::create('save_siteconfig', _t('CMSMain.SAVE', 'Save'))->addExtraClass('ss-ui-action-constructive')->setAttribute('data-icon', 'accept')
            );
        } else {
            $actions = new FieldList();
        }

        $this->extend('updateCMSActions', $actions);
        return $actions;
    }
}