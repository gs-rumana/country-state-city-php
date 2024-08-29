<?php

namespace CountryStateCity;

class City
{
    public static function getAll()
    {
        $jsonFile = file_get_contents(__DIR__ . '/data/cities.json');
        $cities = json_decode($jsonFile, true);
        return $cities;
    }

    public static function getOne($id)
    {
        $cities = self::getAll();
        $idToIndex = array_search($id, array_column($cities, 'id'));
        return $cities[$idToIndex];
    }

    public static function getCitiesByState($stateCode)
    {
        $jsonFile = file_get_contents(__DIR__ . '/data/states+cities.json');
        $states = json_decode($jsonFile, true);
        $citiesByState = array_search($stateCode, array_column($states, 'state_code'))['cities'];
        return $citiesByState;
    }

    public static function getCitiesByCountry($countryCode)
    {
        $jsonFile = file_get_contents(__DIR__ . '/data/countries+cities.json');
        $countries = json_decode($jsonFile, true);
        $citiesByCountry = array_search($countryCode, array_column($countries, 'iso2'))['cities'];
        return $citiesByCountry;
    }
}