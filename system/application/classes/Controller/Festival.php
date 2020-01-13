<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Created by PhpStorm.
 * User: Ocky
 * Date: 15-Nov-19
 * Time: 4:30 PM
 */
class Controller_Festival extends Controller
{

    public function action_index()

    {

        $url = 'https://rockstadtextremefest.ro/';
        $q_title = "//title";
        $url2 = 'https://rockstadtextremefest.ro/bands/';
        $q_bands = '//h2[@class=\'portfolio-entry-title entry-title\']/a/@title';

        $q_image = "//img[@class='logo-img']/@src";

        $title = $this->getCurl($url,$q_title);
        $lineup = $this->getCurl($url2,$q_bands);
        $image = $this->getCurl($url, $q_image);


        $view = View::factory('index')

            ->bind('image',$image)
            ->bind('title', $title)
            ->bind('lineup', $lineup);
//        $this->action_test2();
        $this->response->body($view);



//        echo Request::factory('curl/getCurl2', array('url' => $url))->execute();
//        $cul = new Controller_Curl();
//        $cul->action_getCurl2($url);
//        $cul->response->body(View::factory('index')->bind('title', $title));
//        $curl = Request::factory('curl/getCurl2/'.$url)->execute();
//        var_dump($curl->body($this->response));
//        var_dump($curl);
//        $this->request->param('curl/getCurl');
//        View::factory('index')->bind('title',$Xpath_title);
//        View::factory('index')->bind('title',$Xpath_title);
//        $curl->action_getCurl();

    }


    public function  action_test2()
    {
        echo "test";
        $test = "test";


        $this->response->body(View::factory('index')->bind('test',$test));

    }

    public function getCurl($url,$query)
    {
//        $url = 'https://rockstadtextremefest.ro/bands/';
        $req = Request::factory($url);
        $res = $req->execute();
        $html = $res->body();
        $dom = new DOMDocument();
        @$dom->loadHTML($html);
        $xpath = new DOMXPath($dom);
        $response = $xpath->query($query);
        $node = array();
        foreach ($response as $key) {
            $node[] = $key->nodeValue;
//            echo $node."<br>";
        }
       return $node;
    }


//    public function getCurl2($url)
//    {
//
//        echo Debug::vars($url);
//        $xpath = new Model_XPATH($url);
////        $Xpath_title = new Model_XPATH('https://rockstadtextremefest.ro/');
//        $query = "//h2[@class='portfolio-entry-title entry-title']/a/@title";
//        $res = $xpath->query('//h2[@class=\'portfolio-entry-title entry-title\']/a/@title');
//        $main_title = $xpath->query('//title');
//
////        $xpath->preview($title);
////        $some =$Xpath_title->preview($main_title);
////        $this->response->body($Xpath_title);
////        $this->response->body(Request::factory('index')->body($title));
////        $this->response->body(View::factory('index')->bind('title', $title));
//
//        return $res;
//    }


//    public function action_create()
//    {
//        $view = View::factory('members/create')
//            ->set('values', $_POST)
//            ->bind('errors', $errors);
//
//        if ($_POST)
//        {
//            $member = ORM::factory('Member')
//                // The ORM::values() method is a shortcut to assign many values at once
//                ->values($_POST, array('username', 'password'));
//
//            $external_values = array(
//                    // The unhashed password is needed for comparing to the password_confirm field
//                    'password' => Arr::get($_POST, 'password'),
//                    // Add all external values
//                ) + Arr::get($_POST, '_external', array());
//            $extra = Validation::factory($external_values)
//                ->rule('password_confirm', 'matches', array(':validation', ':field', 'password'));
//
//            try
//            {
//                $member->save($extra);
//                // Redirect the user to his page
//                $this->request->redirect('members/'.$member->id);
//            }
//            catch (ORM_Validation_Exception $e)
//            {
//                $errors = $e->errors('models');
//            }
//        }
//
//        $this->response->body($view);
//    }

    public function logged_in($role = NULL)
    {
        // Get the user from the session
        $user = $this->get_user();

        if (!$user)
            return FALSE;
        if ($user instanceof Model_User AND $user->loaded()) {
            // If we don't have a roll no further checking is needed
            if (!$role)
                return TRUE;
            if (is_array($role)) {
                // Get all the roles
                $roles = ORM::factory('role')
                    ->where('name', 'IN', $role)
                    ->find_all()
                    ->as_array(NULL, 'id');
                // Make sure all the roles are valid ones
                if (count($roles) !== count($role))
                    return FALSE;
            } else {
                if (!is_object($role)) {
                    // Load the role
                    $roles = ORM::factory('role', array('name' => $role));
                    if (!$roles->loaded())
                        return FALSE;
                }
            }
            return $user->has('roles', $roles);
        }
    }


    public function action_create()
    {
        $user = ORM::factory('User');
        $user = $user->values($this->request->post());

        try {

//            if (!ORM::factory('user')->unique('email', $this->request->post('email'))) {
//                echo "User already exist, please try again!";
//            }

            $user->create_user($this->request->post(), array('email', 'password'));

            $mail = $this->request->post('email');
            $subject = "Register account";
            $message = "<h1>Please activate your account on the link:</h1><a href='https://o_babac.internship.rankingcoach.com/festival/addRole/" . base64_encode($mail) . "'>Click Here";
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


//        try {
//
//
//            //need to send token for activation
//
////            $token = Model_User_Token::factory('user_token');
////            var_dump($token);
//
//            if (!ORM::factory('user')->unique('email', $this->request->post('email'))) {
//                echo "User already exist, please try again!";
//            }
//
//
//            $user->save();
//
//
////            $token = ORM::factory('User_Token')->find()->where('id');
//
//
//            $user->add('roles', ORM::factory('Role', array('name' => 'login')));
//            HTTP::redirect('/');
//        } catch (ORM_Validation_Exception $error) {
//            echo Debug::vars($error->errors());
//            die();
//        }

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
//            setcookie('user', $this->request->post('email'), time() + (86400 * 30), '/');
        }

        $success = Auth::instance()->login($this->request->post('email'), $this->request->post('password'), $remember);

//        if (Auth::instance()->logged_in()) {
//            echo "User is logged in, continue on";
//            $log = "<a href='/festival/logout'><button class='btn btn-secondary'>Log Out</button></a>";
//            $this->response->body(View::factory('index')->bind('log', $log));
//            header('Location:/');
//            header('Location:/index/login');
//        }

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

    public function action_test()
    {
        $fest = ORM::factory('Festival', 1);
        $fest = $fest->users->find_all();
        echo Debug::vars($fest);
        foreach ($fest as $test) {
            echo $test->email;
        }
    }


}


