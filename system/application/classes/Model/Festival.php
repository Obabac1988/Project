<?php
/**
 * Created by PhpStorm.
 * User: Ocky
 * Date: 22-Nov-19
 * Time: 2:42 PM
 */

class Model_Festival extends ORM
{
//    protected $_primary_key = 'id';

    protected $_has_many = array(
        'users' => array(
            'model' => 'User',
            'through' => 'festival_users',
//            'foreign_key' => 'festival_id'
        )
    );

}