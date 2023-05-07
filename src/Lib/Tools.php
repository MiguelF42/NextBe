<?php

namespace Application\Lib;

use Application\Lib\Classes\User;
use Application\Model\AdminRepository;
use Application\Model\PilotRepository;

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

    public static function getSession():User
    {
        return unserialize($_SESSION['user']);
    }

    public static function defaultUser():void
    {
        if(isset($_SESSION['token'])) $token = $_SESSION['token'];

        session_destroy();
        session_start();

        $data = [
            'id_user' => 1,
            'firstname' => 'default',
            'lastname' => 'default',
            'email' => 'default@default.com',
            'phone' => '+0 00 00 00 00',
            'birthday' => '2000-01-01',
            'address' => '1 default',
            'postal_code' => '00000',
            'country' => 'default',
            'creation_date' => '2023-04-12 15:30:59',
        ];
        
        $_SESSION['user'] = serialize(new User($data));
        if(isset($token)) $_SESSION['token'] = $token;
    }

    public static function getSessionUserId():int
    {
        return unserialize($_SESSION['user'])->getIdUser();
    }

    public static function isAdmin():bool
    {
        $db = new DatabaseConnection();
        $logger = new Logger($db);
        $adminRepository = new AdminRepository($db, $logger);

        $id = self::getSessionUserId();

        try {
            if(!$adminRepository->getAdminById($id)) return false;
            else return true;
        }
        catch(Exception $e) {
            return false;
        }
    }

    public static function isPilot():bool
    {
        $db = new DatabaseConnection();
        $logger = new Logger($db);
        $pilotRepository = new PilotRepository($db, $logger);

        $id = self::getSessionUserId();

        try {
            if(!$pilotRepository->getPilotById($id)) return false;
            else return true;
        }
        catch(Exception $e) {
            return false;
        }
    }
}