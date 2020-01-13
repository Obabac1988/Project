<?php
/**
 * Created by PhpStorm.
 * User: Ocky
 * Date: 12/2/2019
 * Time: 10:23 AM
 */

class Festival_Festivals extends Festival_Template
{

    protected $url = array(
        'https://www.musicfestivalwizard.com/all-festivals/?festival_guide=romania&month=&festivalgenre=&festivaltype=&festival_length=&festival_size=&camping=&artist=&company=&sdate=Dec+14%2C+2019&edate=Dec+31%2C+2020',
        'https://www.musicfestivalwizard.com/festivals/',
    );

    protected $query = array(
        "//h2",
        "//div[@class='image-wrap']/a/img/@src",
        "//div[@class='image-wrap']/a/@href",
        "//div/a[contains(text(),'OFFICIAL WEBSITE')]/@href"

    );

    /**
     * @return bool
     */
    public function getData()
    {


        $titles = $this->getCurl($this->url[0], $this->query[0]);
        $images = $this->getCurl($this->url[0], $this->query[1]);
        $redirect_id = $this->getCurl($this->url[0], $this->query[2]);
        $domains = array();
        foreach ($redirect_id as $item) {
            $domains[] = $this->getCurl($item, $this->query[3]);
        }

        $id = array();
//        echo Debug::vars($redirect_id);
        foreach ($redirect_id as $key) {
            $id[] = preg_replace('~.*\/.*\.*\.*\/festivals\/~', '', $key);

        }

        $array = array_combine($titles, $images);
        $array2 = array_combine($titles, $redirect_id);
        $array3 = array_combine($titles, $domains);

        foreach ($array as $title => $image) {
            /** @var Model_Festival $fest */
            $fest = ORM::factory('Festival')->where('title', '=', $title)
                ->or_where('img', '=', $image)
                ->find();
            $fest->title = $title;
            $fest->img = $image;
            $fest->expiretime = time() + Date::DAY;
            $fest->save();
        }

        foreach ($array2 as $title => $redirect_id) {
            $fest = ORM::factory('Festival')->where('title', '=', $title)
                ->or_where('redirect_id', '=', $redirect_id)
                ->find();
            $fest->redirect_id = $redirect_id;
            $fest->save();
        }

        foreach ($array3 as $title => $domains) {
            $fest = ORM::factory('Festival')->where('title', '=', $title)
                ->find();
            $fest->domain = $domains;
            $fest->save();
        }

        return $fest->saved();
    }

    protected function getCurl($url, $query)
    {
        return parent::getCurl($url, $query);

    }

}


