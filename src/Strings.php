<?php
namespace Lorenum\Utils;

/**
 * Class Strings
 * String generating helper functions
 *
 * @package Lorenum\Utils
 */
class Strings{

    /**
     * Generate a random string with repeatable letters.
     *
     * @param int $length Length of desired random string
     * @return string Random string
     */
    public static function generateRandomAlphaNumericString($length) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $size = strlen($chars);

        $randomChars = array();
        for ($i = 0; $i < $length; $i++) {
            $randomChars[] = $chars[mt_rand(0, $size - 1)];
        }

        return implode('', $randomChars);
    }
}