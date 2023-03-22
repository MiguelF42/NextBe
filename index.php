<?php

session_start();

require_once('./Autoloader.php');

use Application\Lib\Tools;
use Application\Controllers\Homepage;
use Application\Controllers\Login;
use Application\Controllers\Signup;

if(!isset($_GET['action']))
{
    (new Homepage)->execute();
}

else
{
    switch ($_GET['action']) 
    {
        case 'login' :
            (new Login)->execute(Tools::isAPost());
        break;
        
        case 'signup' :
            (new Signup)->execute(Tools::isAPost());
        break;
        
        case 'admin' :
            //condition for admin access
            if(!$isAdmin)
            {
                (new Homepage)->execute();
            }
            else
            {
                if(!isset($_GET['menu']))
                {
                    (new Admin)->execute();
                }
                else
                {
                    switch ($_GET['menu'])
                    {
                        
                    }
                }
            }

        break;

        default:
        break;
    }
}