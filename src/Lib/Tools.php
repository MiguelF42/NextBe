<?php

namespace Application\Lib;

class Tools {

    public static int $counter = 0;
    public static int $timer = 10;

    public static function debugVar($var) 
    {
        echo '<pre>';
        \var_dump($var);
        echo '</pre>';
    }

    public static function sqlDump($var) 
    {
        while($row = $var->fetch()) 
        {
            self::debugVar($row);
            echo '--------------------------------------------------------------';
        }
    }

    public static function printLog()
    {
        echo 'test n°'.self::$counter.'</br>';
        self::$counter += 1;
    }

    public static function redirect(string $link) 
    {
        \header('refresh:'.self::$timer.';url='.$link);
        exit;
    }

    public static function isAPost()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') return $_POST;
        else return null;
    }

    public static function verifyDateInput(string $date):bool
    {
        $dateInArray = explode('-',$date);
        return checkdate($dateInArray[1],$dateInArray[2],$dateInArray[0]); 
    }
}