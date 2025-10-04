<?php

namespace CountryStateCity;

use JsonMachine\Items;

/**
 * Class City
 * @package CountryStateCity
 */
class City
{
    /**
     * Get all cities
     * @return array
     */
    public static function getAll()
    {
        $jsonFile = file_get_contents(__DIR__ . '/data/cities.json');
        $cities = json_decode($jsonFile, true);
        return $cities;
    }

    /**
     * Get city by id
     * @param int $id
     * @return array
     */
    public static function getOne($id)
    {
        $cities = self::getAll();
        $idToIndex = array_search($id, array_column($cities, 'id'));
        return $cities[$idToIndex];
    }

    /**
     * Get cities by state
     * @param string $stateCode
     * @return array
     */
    public static function getCitiesByState($stateCode)
    {
        $path = __DIR__ . '/data/states+cities.json';

        // Stream the outer JSON array (list of states)
        $jsonStream = Items::fromFile($path);

        foreach ($jsonStream as $state) {
            if (isset($state['state_code']) && $state['state_code'] === $stateCode) {
                // Return immediately once we find the matching state
                return $state['cities'] ?? [];
            }
        }

        // If state not found
        return [];
    }

    /**
     * Get cities by country
     * @param string $countryCode
     * @return array
     */
    public static function getCitiesByCountry($countryCode)
    {
        $path = __DIR__ . '/data/countries+cities.json';
        $jsonStream = Items::fromFile($path);

        foreach ($jsonStream as $country) {
            if (isset($country['iso2']) && $country['iso2'] === $countryCode) {
                return $country['cities'] ?? [];
            }
        }
        return [];
    }
}