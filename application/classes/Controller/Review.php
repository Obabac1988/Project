<?php
/**
 * Created by PhpStorm.
 * User: Ocky
 * Date: 12/9/2019
 * Time: 10:50 AM
 */

class Controller_Review extends Controller
{


    public function action_index()
    {
        $fest = ORM::factory('Festival', $this->request->param('id'));
        if (!$fest->loaded()) {
            echo "festival not found";
            die();
        }

        /** @var Model_User $logged_in_user */
        $logged_in_user = Auth::instance()->get_user();

        if ($this->request->method() == Request::POST) {

            if ($logged_in_user) {
                $this->addRating($logged_in_user, $fest->id, $this->request->post());
            } else {
                echo "You need to log-in to leave a review!";
            }

            HTTP::redirect('/review/index/' . $this->request->param('id'));
            return;
        }

        $reviews = ORM::factory('Review')->where('festival_id', '=', $fest->id)->find_all();

        if ($logged_in_user) {
            $current_user_review = $logged_in_user->reviews->where('festival_id', '=', $fest->id)->find();
            $view = View::factory('review')->set('festival', $fest)->set('reviews', $reviews)->set('current_user_review', $current_user_review);
        }else{
            $view = View::factory('review')->set('festival', $fest)->set('reviews', $reviews);
        }
        $this->response->body($view);

    }




    /**
     * @param Model_User $user_id
     * @param $festival_id
     * @param array $post - the request post used for extracting parameters
     */
    public function addRating($user, $festival_id, $post)
    {
        $review = $user->reviews->where('festival_id', '=', $festival_id)->find();
//        echo Debug::vars($user);


        //If the user has not reviewed festival yet!!!
        if (!$review->loaded()) {
            $review->festival_id = $festival_id;
            $review->user_id = $user->id;
        }
//                echo "Already reviewed this festival!";

//        echo Debug::vars($review);
//        die();
//        $review->where('user_id', '=', $user)->find();

        $review->values($post, array('comment', 'rating'));

        $review->created = time() + Date::DAY;
        $review->save();

    }

//not working
    public function action_deleteRating()
    {

        $fest = ORM::factory('Festival', $this->request->param('id'));
        if (!$fest->loaded()) {
            echo "festival not found";
            die();
        }
        $logged_user = Auth::instance()->logged_in();
        if ($this->request->method() == Request::POST) {
            if($logged_user)
            $review = $logged_user->reviews->where('festival_id', '=', $fest->id)->find();

        }

        //If the user has not reviewed festival yet!!!
        if (!$review->loaded()) {
            $review->festival_id = $fest->id;
            $review->user_id = $logged_user->id;
        }

        $review->delete();
    }

}