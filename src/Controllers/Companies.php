<?php

namespace Application\Controllers;

use Application\Lib\Tools;
use Application\Lib\DatabaseConnection;
use Application\Lib\Logger;
use Application\Model\CompanieRepository;

class Companies {

    function execute() {
        try {
            Tools::isAdmin();
        }
        catch (\Exception $e) {
            Tools::redirect('./');
        }
        $db = new DatabaseConnection();
        $logger = new Logger($db);
        $companieRepository = new CompanieRepository($db,$logger);

        $data = $companieRepository->getCompanies();

        $properties = explode(',',CompanieRepository::ATTRIBUTES_NAME);
        $propertieName = [
            'id',
            'Nom de la compagnie',
            'Logo'
        ];

        $table = 'companie';

        require('./templates/menu_table.php');
    }

}
