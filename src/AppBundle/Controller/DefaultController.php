<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Template("AppBundle:Default:index.html.twig")
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // get all crisis
        $data = $this->getDoctrine()->getManager()->getRepository('AppBundle:Crisis')->findAll();
        $haze = $this->getDoctrine()->getManager()->getRepository('AppBundle:Haze')->findAll();
        dump($haze);
        dump($data);
        $weatherData = $this->getWeatherData();
        return array(
            'data' => $data,
            'weatherData' => $weatherData,
            'hazeInfo' => $haze
        );
    }

    //$url = "https://api.data.gov.sg/v1/environment/24-hour-weather-forecast?date=2017-04-08"

    public function getWeatherData()
    {
        date_default_timezone_set("Asia/Singapore");
        //curl logic
        $ch = curl_init();
        $header = array('api-key: hUGj5N4dlvebrVDN7vGGaiWrffRPoUlu',);
        $timeout = 5;
        $date = date("Y-m-d");
        $hour = date("H");
        $minute = date("i");
        $second = date("s");


        // The api from data.gov.sg is unstable and does not work on some days.
        // An alternate static link is given below to demonstrate the working api.

        //$url = "https://api.data.gov.sg/v1/environment/24-hour-weather-forecast?date_time=" . $date . "T" . $hour . "%3A" . $minute . "%3A" . $second;
        $url = "https://api.data.gov.sg/v1/environment/24-hour-weather-forecast?date=2017-04-07";

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);

        $weatherDataResponse = curl_exec($ch);
        curl_close($ch);
        $weatherData = json_decode(strstr($weatherDataResponse, "{"), true);
        return $weatherData;

    }

}
