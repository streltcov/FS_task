<?php

namespace app\models\custom;

/**
 * Class GeoApi
 * @package app\models\custom
 */
class GeoApi
{

    private static $api_url = 'https://geocode-maps.yandex.ru/1.x/?geocode=';


    /**
     * returns featureElement from response where precision = exact
     *
     * @param $response
     * @return array
     */
    public static function getExact($response)
    {

        $searchresult = '';

        $response = json_decode(json_encode($response), TRUE);

        if (isset($response['GeoObjectCollection'])) {
            $result = $response['GeoObjectCollection'];
        } else {
            return false;
        }

        /*if (isset($result['featureMember'][0]['GeoObject']['metaDataProperty']['GeocoderMetaData']['precision'])) {
            $flag = $result['featureMember'][0]['GeoObject']['metaDataProperty']['GeocoderMetaData']['precision'];
        }*/

        return $result;

        if (is_array($result)) {
            foreach ($result as $key => $featureMember) {
                if ($key == 'featureMember') {
                    if (isset($featureMember['precision']) && $featureMember['precision'] == 'exact') {
                        $searchresult = $featureMember;
                    }
                }
            }
        }

        return $searchresult;

    } // end function



    /**
     * performs http-request to Yandex-Geocoder
     * returns xml-object
     *
     * @param array $parameters
     * @return \SimpleXMLElement|string
     */
    public static function request($parameters = ['address', 'json' => false, 'kind' => null])
    {

        if (isset($parameters['kind'])) {
            $kind = '&kind=' . $parameters['kind'];
        } else {
            $kind = '';
        }

        $parameters['json'] == true ? $format = '&format=json' : $format = '';

        $link = static::$api_url . $parameters['address'] . $format . $kind;

        $connection = curl_init();
        curl_setopt($connection, CURLOPT_URL, $link);
        curl_setopt($connection, CURLOPT_RETURNTRANSFER, 1);

        $response = curl_exec($connection);
        $responsecode = curl_getinfo($connection, CURLINFO_HTTP_CODE);

        curl_close($connection);

        if ($responsecode == '200') {
            return simplexml_load_string($response);
        } else {
            return $response . 'Response returned with code ' . $responsecode;
        }

    } // end function

} // end class
