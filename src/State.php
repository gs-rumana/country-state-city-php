<?php

namespace CountryStateCity;

class State
{
    public static function getAll()
    {
        $jsonFile = file_get_contents(__DIR__ . '/data/states.json');
        $states = json_decode($jsonFile, true);
        return $states;
    }

    public static function getOne($code)
    {
        $states = self::getAll();
        $codeToIndex = array_search($code, array_column($states, 'state_code'));
        return $states[$codeToIndex];
    }

    public static function getStatesByCountry($countryCode)
    {
        $jsonFile = file_get_contents(__DIR__ . '/data/countries+states.json');
        $countries = json_decode($jsonFile, true);
        $statesByCountry = array_search($countryCode, array_column($countries, 'iso2'))['states'];
        return $statesByCountry;
    }
}