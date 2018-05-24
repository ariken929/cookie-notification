<?php

/**
 * Created by PhpStorm.
 * User: Carey
 * Date: 5/24/2018
 * Time: 5:07 PM
 */
class CookieDescription extends DataObject
{
    private static $db = array(
        'Title' => 'Varchar(100)',
        'Description' => 'Text',
        'Type' => "Enum('Essential,Optional','Essential')"
    );

    private static $summary_fields = array(
         'Title' => 'Title',
         'Description' => 'Description',
         'Type' => 'Type'
    );
}