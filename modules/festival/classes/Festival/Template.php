<?php
/**
 * Created by PhpStorm.
 * User: Ocky
 * Date: 12/2/2019
 * Time: 10:18 AM
 */

abstract class Festival_Template
{
    private $query;
    private $url;

    protected function getCurl($url,$query)
    {


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
//            echo $node[]."<br>";
        }
        return $node;
    }


}