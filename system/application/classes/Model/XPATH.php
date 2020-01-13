<?php
/**
 * Created by PhpStorm.
 * User: Ocky
 * Date: 11/27/2019
 * Time: 12:26 PM
 */

class Model_XPATH
{
    public $dom, $xpath;

    public function __construct($url)
    {
        $html = $this->_curl($url);
        $this->dom = new DOMDocument();
        @$this->dom->loadHTML($html);
        $this->xpath = new DOMXPath($this->dom);


    }

    private function _curl($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_AUTOREFERER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

        $result = curl_exec($ch);
        if (!$result) {
            echo "<br/>cURL error number:" . curl_error($ch);
            echo "<br/>cURL error :" . curl_error($ch) . "on URL -" . $url;
            var_dump(curl_getinfo($ch));
            var_dump(curl_error($ch));
            exit;
        }
        return $result;
    }

    public function query($q)
    {
        $result = $this->xpath->query($q);
        return $result;
    }

    public function preview($results)
    {
//        echo "<pre>";
//        print_r($results);
//        echo "<br>Node Values <br>";
        foreach ($results as $result) {
//            echo trim($result->nodeValue) . "<br>";
            $array[] = $result->nodeValue;
        }
//        echo "<br><br>";

        print_r($array);
        return $array;
    }
}