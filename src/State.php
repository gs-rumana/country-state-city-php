<?php

namespace CountryStateCity;

/**
 * Class State
 * @package CountryStateCity
 */
class State
{
    /**
     * Get all states
     * @return array
     */
    public static function getAll()
    {
        $jsonFile = file_get_contents(__DIR__ . '/data/states.json');
        $states = json_decode($jsonFile, true);
        return $states;
    }

    /**
     * Get state by code
     * @param string $code
     * @return array
     */
    public static function getOne($code)
    {
        $states = self::getAll();
        $codeToIndex = array_search($code, array_column($states, 'state_code'));
        return $states[$codeToIndex];
    }

    /**
     * Get states by country
     * @param string $countryCode
     * @return array
     */
    public static function getStatesByCountry($countryCode)
    {
        $jsonFile = file_get_contents(__DIR__ . '/data/countries+states.json');
        $countries = json_decode($jsonFile, true);
        $statesByCountry = array_search($countryCode, array_column($countries, 'iso2'))['states'];
        return $statesByCountry;
    }
}