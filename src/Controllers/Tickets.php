<?php

namespace Application\Controllers;

use Application\Lib\Tools;
use Application\Lib\DatabaseConnection;
use Application\Lib\Logger;
use Application\Lib\Repository;

class Tickets
{
    private function getRepo(string $class):Repository
    {
        $fClass = 'Application\\Model\\'.$class.'Repository';
        
        $database = new DatabaseConnection();
        $logger = new Logger($database);
        return new $fClass($database,$logger);
    }

    public function list()
    {
        $ticketRepository = $this->getRepo('Ticket');

        $tickets = $ticketRepository->getTicketsFull();

        require_once('templates/tickets.php');
    }
}