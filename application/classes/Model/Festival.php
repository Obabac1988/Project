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
        'reviews' => array(
            'model' => 'Review',
//            'through' => 'review',
//            'foreign_key' => 'festival_id'
        )
    );




    public function canManuallyRefresh()
    {

        $previous_fetch_time = $this->expiretime - Date::DAY;
        if ($previous_fetch_time < time() - Date::HOUR) {
            return true;
        } else {
            return false;
        }
    }


//    public function getReview()
//    {
//        return $this->reviews->find_all();
//    }
}