<?php
namespace Lorenum\Utils;

/**
 * Class Arrays
 * Array related helper functions
 *
 * @package Lorenum\Utils
 */
class Arrays{

    /**
     * Checks if ALL the values in $array1 exists in $array2
     *
     * @param $array1
     * @param $array2
     * @return Boolean True if all values exist, else false
     */
    public static function fullIntersect(array $array1, array $array2) {
        if (count(array_intersect($array1, $array2)) == count($array1))
            return true;

        else
            return false;
    }
}