<?php

namespace App\Task17;

class Geocoding
{
    const API_KEY = 'AIzaSyCqgNU9G7BYnauTIzbmtQbg4zkuE7l2FiY';

    public function getApiKey()
    {
        return self::API_KEY;
    }

    /**
     * get response API google Geocoding
     * @param  string $url - link to API
     * @return array $code_array - parsed in array response
     */
    private function getResponse($url)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_URL, $url);
        $code = curl_exec($curl);
        curl_close($curl);
        $code_array = json_decode($code, true);

        return $code_array;
    }

    /**
     * make Geocoding
     * @param  string $address - place on map
     * @return array $cord - coordinates of place
     */
    public function geocode($address)
    {
        $url = 'https://maps.googleapis.com/maps/api/geocode/json?address=' . $address . '&key=' . self::API_KEY;
        $code_array = $this->getResponse($url);
        $cord[0] = $code_array['results'][0]['geometry']['location']['lat'];
        $cord[1] = $code_array['results'][0]['geometry']['location']['lng'];

        return $cord;
    }

    /**
     * make Reverse Geocoding
     * @param  float $lat - lat coordinate
     * @param  float $lng - lng coordinate
     * @return string $address - place on map
     */
    public function reverseGeocode($lat, $lng)
    {
        $url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng=' . $lat . ',' . $lng . '&key=' . self::API_KEY;
        $code_array = $this->getResponse($url);

        for ($i = 0; $i < count($code_array['results'][0]['address_components']); $i++) {
            $address[$i] = $code_array['results'][0]['address_components'][$i]['long_name'];
        }

        return $address;
    }
}

$object = new Geocoding();
print_r($object->geocode('Канев'));
print_r($object->reverseGeocode(49.751033, 31.4697));
