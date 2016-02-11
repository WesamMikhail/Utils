<?php
namespace Lorenum\Utils;

use Exception;

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

    /**
     * Generate random alphanumstring of size $length
     * This function uses openssl_random_pseudo_bytes()
     *
     * @param $length
     * @return string
     * @throws \Exception
     */
    public static function generateUniqueRandomAlphaNumericString($length){
        if(!function_exists('openssl_random_pseudo_bytes'))
            throw new Exception("openssl_random_pseudo_bytes is not defined!");

        if($length % 2 == 0)
            return bin2hex(openssl_random_pseudo_bytes($length));

        return substr(bin2hex(openssl_random_pseudo_bytes($length + 1)), 0, -1);
    }

}