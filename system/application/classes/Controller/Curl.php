<?php
//use Rct567\DomQuery;

/**
 * Created by PhpStorm.
 * User: Ocky
 * Date: 11/26/2019
 * Time: 12:09 PM
 */
class Controller_Curl extends Controller
{
    public function action_getCurl()
    {
        $url = 'https://rockstadtextremefest.ro/bands/';
        $req = Request::factory($url);
        $res = $req->execute();
        $html = $res->body();
        $dom = new DOMDocument();
        @$dom->loadHTML($html);
        $xpath = new DOMXPath($dom);
        $response = $xpath->query('//h2[@class=\'portfolio-entry-title entry-title\']/a/@title');
        foreach ($response as $key) {
//            $node = $response->item(4); /*select 1 from the list*/
//            echo $key->nodeValue . "<br>"; /*select all*/
        }



    }

    public function action_getCurl2()
    {

        $startUrl = 'https://rockstadtextremefest.ro/bands/';

//        var_dump($this->request->param('view'));

        $xpath = new Model_XPATH($startUrl);
        $Xpath_title = new Model_XPATH('https://rockstadtextremefest.ro/');

        $query = "//h2[@class='portfolio-entry-title entry-title']/a/@title";

        $title = $xpath->query('//h2[@class=\'portfolio-entry-title entry-title\']/a/@title');
        $main_title = $xpath->query('//title');
//        $xpath->preview($title);

        $some = $Xpath_title->preview($main_title);
        echo View::factory('index')->bind('test', $test);

//        $this->response->body($Xpath_title);
//        $this->response->body(Request::factory('index')->body($title));
//        $this->response->body(View::factory('index')->bind('title', $title));
        return $title;
    }

    static function action_next()
    {

    }

//    public function action_gethtml()
//    {
//        $html = file_get_contents('https://rockstadtextremefest.ro/bands/');
////        $html = 'https://rockstadtextremefest.ro/bands/';
//
//        $dom = new domDocument;
//        @$dom->loadHTML($html);
//        $dom->preserveWhiteSpace = false;
//        $divs = $dom->getElementsByTagName('a');
//        foreach ($divs as $div) {
//            foreach ($div->attributes as $attr) {
//                $name = $attr->nodeName;
//                $value = $attr->nodeValue;
//                echo "Attribute '$name'::'$value'<br/>";
//            }
//        }
//    }


//    public function action_gethtml2()
//    {
//        $url = 'https://rockstadtextremefest.ro/bands/';
//        $req = Request::factory($url);
//        $res = $req->execute();
//        $html = $res->body();
//
//        $title = array();
//        preg_match_all('~<a href=".*?"\stitle="(.*?)"~',$html,$match);
//        $title['name'] = $match[1];
//        print_r($title['name']);
//        die();
//    }


//    public function action_show()
//    {
////        $dom = new Rct567\DomQuery\DomQuery('<div><h1 class="title">Hello</h1></div>');
//
//        echo $dom->find('h1')->text(); // output: Hello
//        echo $dom->find('div')->prop('outerHTML'); // output: <div><h1 class="title">Hello</h1></div>
//        echo $dom->find('div')->html(); // output: <h1 class="title">Hello</h1>
//        echo $dom->find('div > h1')->class; // output: title
//        echo $dom->find('div > h1')->attr('class'); // output: title
//        echo $dom->find('div > h1')->prop('tagName'); // output: h1
//        echo $dom->find('div')->children('h1')->prop('tagName'); // output: h1
//        echo (string)$dom->find('div > h1'); // output: <h1 class="title">Hello</h1>
//        echo count($dom->find('div, h1')); // output: 2
//    }


}