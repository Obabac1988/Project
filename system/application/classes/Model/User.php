<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Created by PhpStorm.
 * User: Ocky
 * Date: 11/18/2019
 * Time: 11:19 AM
 */
class Model_User extends Model_Auth_User
{

    protected $_has_many = array(
        'user_tokens' => array('model' => 'User_Token'),
        'roles' => array('model' => 'Role', 'through' => 'roles_users'),

        'festivals' => array(
            'model' => 'Festival',
            'through' => 'festival_users',
//            'foreign_key' => 'user_id',
        )

    );


    public static function get_password_validation($values)
    {
        return Validation::factory($values)
            ->rule('password', 'min_length', array(':value', 8))
            ->rule('password_confirm', 'matches', array(':validation', ':field', 'password'));
    }


    public function rules()
    {
        return array(
            'first_name' => array(array('not_empty')),
            'last_name' => array(array('not_empty')),
            'password' => array(
                array('not_empty'),
                array('min_length', array(':value', 8)),

            ),

            'email' => array(
                array('not_empty'),
                array('email'),
                array(array($this, 'unique'), array('email', ':value')),
            ),
        );
    }

}