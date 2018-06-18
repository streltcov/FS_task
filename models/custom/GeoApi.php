<?php

namespace app\models\custom;

/**
 * Class GeoApi
 * @package app\models\custom
 */
class GeoApi
{

    private static $api_url = 'https://geocode-maps.yandex.ru/1.x/?geocode=';

    public static function geoRequest($parameters = ['adress', 'json' => false, 'kind' => null])
    {

        //$parameters['kind'] != null ? $kind = '&kind=' . $parameters['kind'] : '';
        if (isset($parameters['kind'])) {
            $kind = '&kind=' . $parameters['kind'];
        } else {
            $kind = '';
        }

        $parameters['json'] == true ? $format = '&format=json' : $format = '';

        $link = static::$api_url . $parameters['adress'] . $format . $kind;

        $connection = curl_init();
        curl_setopt($connection, CURLOPT_URL, $link);
        curl_setopt($connection, CURLOPT_RETURNTRANSFER, 1);

        $response = curl_exec($connection);
        $responsecode = curl_getinfo($connection, CURLINFO_HTTP_CODE);

        curl_close($connection);

        if ($responsecode == '200') {
            return simplexml_load_file($response);
        } else {
            return $response . 'Response returned with code ' . $responsecode;
        }

        //return $link;

    } // end function

} // end class
