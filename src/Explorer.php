<?php
namespace Lorenum\Utils;

/**
 * Class Explorer
 * Filesystem related helper functions
 * @package Lorenum\Ionian\Utils
 */
class Explorer {

    /**
     * Get all directory files and directories
     * 
     * @param string $dir directory location
     * @param boolean $subdir include subdirectories of directory
     * @return array 
     */
    public static function getAllFiles($dir, $subdir = false) {
        $path = '';
        $stack[] = $dir;
        while ($stack) {
            $thisdir = array_pop($stack);
            if ($dircont = scandir($thisdir)) {
                $i = 0;
                while (isset($dircont[$i])) {
                    if ($dircont[$i] !== '.' && $dircont[$i] !== '..') {
                        $current_file = "{$thisdir}/{$dircont[$i]}";
                        if (is_file($current_file)) {
                            $path[] = "{$thisdir}/{$dircont[$i]}";
                        } elseif (is_dir($current_file)) {
                            $path[] = "{$thisdir}/{$dircont[$i]}/";

                            if ($subdir === true)
                                $stack[] = $current_file;
                        }
                    }
                    $i++;
                }
            }
        }
        return $path;
    }

    /**
     * Get all subdirectories of directory
     * 
     * @param string $dir directory location
     * @param boolean $subdir include subdirectories of subdirectory
     * @return array 
     */
    public static function getAllSubdirectories($dir, $subdir = false) {
        $path = '';
        $stack[] = $dir;
        while ($stack) {
            $thisdir = array_shift($stack);
            if ($dircont = scandir($thisdir)) {
                $i = 0;
                while (isset($dircont[$i])) {
                    if ($dircont[$i] !== '.' && $dircont[$i] !== '..') {
                        $current_file = "{$thisdir}/{$dircont[$i]}";
                        if (is_dir($current_file)) {
                            $temp = explode("/", $current_file);
                            $path[$temp[count($temp) - 1]] = "{$thisdir}/{$dircont[$i]}";

                            if ($subdir === true)
                                $stack[] = $current_file;
                        }
                    }
                    $i++;
                }
            }
        }
        return $path;
    }

    /**
     * Get file extension from the filename
     * 
     * @param string $filename
     * @return string file extension
     */
    public static function getFileExtension($filename) {
        return pathinfo($filename, PATHINFO_EXTENSION);
    }

    /**
     * Check if class and method exists
     *
     * @param $class
     * @param $method
     * @return bool True of class and method exists, false otherwise
     */
    public static function classMethodExists($class, $method){
        if(!method_exists($class, $method))
            return false;
        return true;
    }

    /**
     * Check if class exists
     *
     * @param $class
     * @return bool
     */
    public static function classExists($class){
        if (!class_exists($class))
            return false;
        return true;
    }

    /**
     * if $action is NULL the function runs Explorer::classExists
     * else the function runs Explorer::classMethodExists
     *
     * @param $class
     * @param null $action
     * @return bool
     */
    public static function checkIfClassExists($class, $action = null){
        if(is_null($action) && Explorer::classExists($class))
            return true;

        else if(Explorer::classMethodExists($class, $action))
            return true;

        return false;
    }
}