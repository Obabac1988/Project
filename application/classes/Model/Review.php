<?php
/**
 * Created by PhpStorm.
 * User: Ocky
 * Date: 22-Nov-19
 * Time: 2:43 PM
 */

class Model_Review extends ORM
{
    protected $_belongs_to = array(
        'user' => array(
            'model' => 'User',
            'foreign_key' => 'user_id'
        ),

        'festival' => array(
            'model' => 'Festival',
            'foreign_key' => 'festival_id',

        ),

    );


    public function rules()
    {
        return array(
            'user_id' => array(array('not_empty')),
            'festival_id' => array(array('not_empty'))
        );
    }

}