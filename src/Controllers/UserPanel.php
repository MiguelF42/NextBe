<?php

namespace Application\Controllers;

use Application\Lib\Tools;

class UserPanel
{
    public function execute()
    {
        if(Tools::getSessionUserId() == 1) Tools::redirect('./');

        if(Tools::isAdmin()) $this->adminPanel();
        elseif(Tools::isPilot()) $this->pilotPanel();
        else $this->userPanel();
    }

    private function userPanel()
    {
        require('templates/userPanelLayout.php');
    }

    private function pilotPanel()
    {

    }

    private function adminPanel()
    {

    }
}