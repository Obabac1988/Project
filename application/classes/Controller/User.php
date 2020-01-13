<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Created by PhpStorm.
 * User: Ocky
 * Date: 15-Nov-19
 * Time: 4:30 PM
 */
class Controller_User extends Controller
{
    public function action_create()
    {
        /** @var Model_User $user */
        $user = ORM::factory('User');
        $user = $user->values($this->request->post());

        try {

            if (!ORM::factory('User')->unique('email', $this->request->post('email'))) {
                echo "User already exist, please try again!";
            }

            $user->create_user($this->request->post(), array('email', 'password'));

            $mail = $this->request->post('email');
            $subject = "Register account";
            $message = "<h1>Please activate your account on the link:</h1><a href='https://o_babac.internship.rankingcoach.com/user/addRole/" . base64_encode($mail) . "'>Click Here";
            $headers = "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
            mail($mail, $subject, $message, $headers);

            // Redirect the user to his page

            HTTP::redirect('/');
        } catch (ORM_Validation_Exception $e) {

            $errors = $e->errors();
//            echo Debug::vars($errors);
            echo "<h1>Email already taken! Please try again</h1>";
        }
        die;


    }


    public function action_addRole()
    {
        $mail = $this->request->param('id');
        $mailDecoded = base64_decode($mail);
        $user = ORM::factory('User')->where('email', '=', $mailDecoded)->find();
        $user->add('roles', ORM::factory('Role', array('name' => 'login')));

    }


    public function action_login()
    {
        $remember = $this->request->post('remember');
        if (!empty($remember)) {
            $remember = true;
        }

        $success = Auth::instance()->login($this->request->post('email'), $this->request->post('password'), $remember);


        if ($success) {
//            echo "Login succces!";
            HTTP::redirect('/');

//            header('location:/');
            // Login successful, send to app
        } else {
            echo "Login failed!";
            // Login failed, send back to form with error message
        }

    }

    public function action_logout()
    {
        Auth::instance()->logout();
        HTTP::redirect('/');
    }

    //for testing relationship between user and festival models
//    public function action_test()
//    {
//        $fest = ORM::factory('Festival', 1);
//        $fest = $fest->users->find_all();
//        echo Debug::vars($fest);
//        foreach ($fest as $test) {
//            echo $test->email;
//        }
//    }


}


