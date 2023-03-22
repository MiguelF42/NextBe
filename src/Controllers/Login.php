<?php

namespace Application\Controllers;

use Application\Lib\Tools;
use Application\Lib\DatabaseConnection;
use Application\Lib\Logger;
use Application\Model\UserRepository;

class Login
{

    public function execute(?array $input) {

        if($input !== null)
        {
            if(!isset($input['email']) ||  !filter_var($input['email'],FILTER_VALIDATE_EMAIL) || !isset($input['password']) || empty($input['password']))
            {
                throw new \RuntimeException('Les identifiants ne correspondent à aucun compte existant');
            }

            $database = new DatabaseConnection;
            $logger = new Logger($database);
            $userRepository = new UserRepository($database,$logger);

            $success = $userRepository->connectUser($input);

            if($success) 
            {
                Tools::redirect('./');
            }
            
            $error = $success;
        }

        require('templates/login.php');
    
    }

}