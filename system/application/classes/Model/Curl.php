<?php
/**
 * Created by PhpStorm.
 * User: Ocky
 * Date: 11/26/2019
 * Time: 10:50 AM
 */

class Model_Curl extends Kohana_Request_Client_Curl
{

    public function getCurl()
    {
        $url = 'https://rockstadtextremefest.ro/';
        $req = Request::factory($url);
        $res = $req->execute();
        echo Debug::vars($res);

    }
}