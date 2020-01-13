<?php
/**
 * Created by PhpStorm.
 * User: Ocky
 * Date: 11/18/2019
 * Time: 11:50 AM
 */

class Model_Member extends ORM {

    public function rules()
    {
        return array(
            'username' => array(
                array('not_empty'),
                array('min_length', array(':value', 4)),
                array('max_length', array(':value', 32)),
                array(array($this, 'username_available')),
            ),
            'password' => array(
                array('not_empty'),
            ),
        );
    }

    public function filters()
    {
        return array(
            'password' => array(
                array(array($this, 'hash_password')),
            ),
        );
    }

    public function username_available($username)
    {
        // There are simpler ways to do this, but I will use ORM for the sake of the example
        return ORM::factory('Member', array('username' => $username))->loaded();
    }

    public function hash_password($password)
    {
        // Do something to hash the password
    }
}