<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Created by PhpStorm.
 * User: Ocky
 * Date: 15-Nov-19
 * Time: 4:30 PM
 */
class Controller_Festival extends Controller
{


    public function action_index() // display info lifetime from db via a user readable baloon (fetch time) and show re-fetch button

    {
        $festivals = ORM::factory('Festival')
            ->join('reviews', 'LEFT')->on('reviews.festival_id', '=', 'festival.id')
            ->select(DB::expr('count(reviews.id) as reviews_cnt'))
            ->select(DB::expr('avg(rating) as rating_avg'))
            ->group_by('festival.id')
            ->find_all();

        $view = View::factory('festivalList')
            ->set('festivals', $festivals);
        $this->response->body($view);

    }



    public function action_getFestivals()
    {
        $scrape = new Festival_Festivals();
        $scrape->getData();

    }


    /** If expire time of festival is already passed, re-fetch festival
     *  If scrape time was over one hour ago at the time of checking, allow re-fetch
     * @return mixed
     */
    public function action_refreshFestival()
    {
        /** @var Model_Festival $festival */
        $festival = ORM::factory('Festival', $this->request->param('id'));
        if (empty($festival->expiretime) || $festival->expiretime < time() || $festival->canManuallyRefresh()) {
$scrape = new Festival_Festivals();
            echo json_encode(array('success' => $scrape->getData(), 'message' => 'Refresh was attempted'));
        } else {
            echo json_encode(array('success' => false, 'message' => 'Festival doesn`t need a refresh'));
        }
    }

}


