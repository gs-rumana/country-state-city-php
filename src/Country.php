<?php

namespace CountryStateCity;

class Country
{
    public static function getAll()
    {
        $jsonFile = file_get_contents(__DIR__ . '/data/countries.json');
        $countries = json_decode($jsonFile, true);
        return $countries;
    }

    public static function getOne($code)
    {
        $countries = self::getAll();
        $codeToIndex = array_search($code, array_column($countries, 'iso2'));
        return $countries[$codeToIndex];
    }
}
