<?php

namespace CountryStateCity;

/**
 * Class Country
 * @package CountryStateCity
 */
class Country
{
    /**
     * Get all countries
     * @return array
     */
    public static function getAll()
    {
        $jsonFile = file_get_contents(__DIR__ . '/data/countries.json');
        $countries = json_decode($jsonFile, true);
        return $countries;
    }

    /**
     * Get country by code
     * @param string $code
     * @return array
     */
    public static function getOne(string $code): array
    {
        $countries = self::getAll();
        $codeToIndex = array_search($code, array_column($countries, 'iso2'));
        return $countries[$codeToIndex];
    }

    /**
     * Get country by phone code
     * @param int $phoneCode
     * @return array
     */
    public function getByPhoneCode(int $phoneCode): array
    {
        $countries = self::getAll();
        $codeToIndex = array_search($phoneCode, array_column($countries, 'phonecode'));
        return $countries[$codeToIndex];
    }
}
