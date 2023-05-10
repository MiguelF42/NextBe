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

    public function seeTicket($id)
    {
        $ticketRepository = $this->getRepo('Ticket');

        $ticket = $ticketRepository->getTicketFullById($id);

        require('templates/seeTicket.php');
        // Tools::debugVar($ticket);
    }

    public function reserveTicket($id)
    {
        $idUser = Tools::getSessionUserId();

        if($idUser === 1) {
            $_SESSION['redirect'] = './tickets/'.$id;
            Tools::redirect('../login');
        }

        $ticketRepository = $this->getRepo('Ticket');

        $data = $ticketRepository->getTicketById($id);

        if(!$data) Tools::redirect('./');

        $reservationRepository = $this->getRepo('Reservation');

        $data = [
            'id_ticket' => intVal($id),
            'id_user' => $idUser
        ];

       $reservationRepository->insertReservation($data);

       Tools::redirect('../panel/reservations');

    }
}