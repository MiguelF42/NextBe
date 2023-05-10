<?php

namespace Application\Controllers;

use Application\Lib\Tools;
use Application\Lib\DatabaseConnection;
use Application\Lib\Logger;
use Application\Lib\Repository;

class Panel
{
    private function getRepo(string $class):Repository
    {
        $fClass = 'Application\\Model\\'.$class.'Repository';
        
        $database = new DatabaseConnection();
        $logger = new Logger($database);
        return new $fClass($database,$logger);
    }

    public function panel()
    {
        Tools::redirect('./panel/account');
    }

    public function choosePanel():string
    {
        if(Tools::getSessionUserId() == 1) Tools::redirect('./');

        $admin = Tools::isAdmin();
        $pilot = Tools::isPilot();

        if(!empty($admin)) 
        {
            $panel = 'admin';
        }
        elseif(!empty($pilot))
        { 
            $panel = 'pilot';
        }
        else $panel = 'user';

        return $panel;
    }

    public function account()
    {
        $panel = $this->choosePanel();

        $userRepository = $this->getRepo('User');

        $user = $userRepository->getUserById(Tools::getSessionUserId());

        require('templates/panel/account.php');
    }

    public function reservation()
    {
        $panel = $this->choosePanel();

        $reservationRepository = $this->getRepo('Reservation');

        $reservations = $reservationRepository->getReservationsByUserId(Tools::getSessionUserId());
    }

    public function planes()
    {
        $admin = Tools::isAdmin();

        if(!$admin) Tools::redirect('./');

        $companieRepository = $this->getRepo('Companie');
        $planeRepository = $this->getRepo('Plane');
        $companies = [];
        $planes = [];

        if($admin->getIdCompany() !== 1)
        {
            $companies = $companieRepository->getCompanyById($admin->getIdCompany());
            $planes = $planeRepository->getPlaneByIdCompany($companies);
        }
        else
        {
            $companies = $companieRepository->getCompanies();
            $planes = $planeRepository->getPlanesWithInner();
        }

        require('templates/panel/planes.php');

    }

    public function models()
    {
        $admin = Tools::isAdmin();

        if(!$admin) Tools::redirect('./');

        $seatRepository = $this->getRepo('Seat');

        $modelRepository = $this->getRepo('Model');
        $models = $modelRepository->getModels();

        $modelsFull = [];

        foreach ($models as $model)
        {
            $seats = $seatRepository->getSeatsCountByIdModel($model->getIdModel());

            $modelsFull [] = [$model,$seats];
        }

        // Tools::debugVar($modelsFull);
        require('templates/panel/models.php');
    }

    public function flightManager()
    {
        $airportRepository = $this->getRepo('Airport');
        $planeRepository = $this->getRepo('Plane');
        $pilotRepository = $this->getRepo('Pilot');
        $flightRepository = $this->getRepo('Flight');

        $airports = $airportRepository->getAirportsOrderByName();
        $planes = $planeRepository->getPlanes();
        $pilots = $pilotRepository->getPilots();
        $flights = $flightRepository->getFlights();

        require_once('templates/panel/flightsManager.php');
    }

    public function addFlight()
    {
        $ticketRepository = $this->getRepo('Ticket');
        $seatRepository = $this->getRepo('Seat');
        $flightRepository = $this->getRepo('Flight');

        try{
            $flightId = $flightRepository->insertFlight($_POST);
            $seats = $seatRepository->getSeatsByIdPlane($_POST['id_plane']);

            $ticketRepository->generateTickets($seats,$flightId);

            Tools::redirect('./flights-manager');

        }
        catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

    public function reservations()
    {
        $panel = $this->choosePanel();

        $reservationRepository = $this->getRepo('Reservation');

        $reservations = $reservationRepository->getReservationsByIdUser(Tools::getSessionUserId());

        require('templates/panel/reservations.php');
    }
}