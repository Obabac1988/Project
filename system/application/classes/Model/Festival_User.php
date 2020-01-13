<?php
/**
 * Created by PhpStorm.
 * User: Ocky
 * Date: 22-Nov-19
 * Time: 2:43 PM
 */

class Model_Festival_User extends ORM
{
    protected $_belongs_to = array(
        'users' => array(
            'model' => 'User',
            'foreign_key' => 'user_id'
        ),

        'festivals' => array(
            'model' => 'Festival',
            'foreign_key' => 'festival_id',

        ),

    );
}