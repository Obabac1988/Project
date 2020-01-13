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

        'reviews' => array(
            'model' => 'Review',
//            'through' => 'festival_users',
//            'foreign_key' => 'user_id',
        )

    );



    public function hasReviewedFestival($festival_id)
    {
        /** @var  Model_Review $review */
        $review = $this->reviews->where('festival_id', '=', $festival_id)->find();
        return $review->loaded();
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



    public function unique_key($value)
    {
        return Valid::email($value) ? 'email' : 'username';
    }

//

}