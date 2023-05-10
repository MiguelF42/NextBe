<?php
Namespace Application\Model;

Use Application\Lib\Repository;
Use Application\Lib\Classes\Reservation;

Class ReservationRepository extends Repository
{
    const TABLE_NAME = 'reservations';
    const CLASS_NAME = 'Reservation';
    const ID_NAME = 'id_reservation';
    const ATTRIBUTES_NAME = 'id_reservation,reservation_date,id_ticket,id_user';
    const ATTRIBUTES_PREPARE = '?,?,?';

    public function getReservations():array
    {
        try {
            $data = $this->getData();
            
            $name = 'Select all Reservations';
            $log = 'Selection of all the data in Reservations table';
            $action = 'SELECT';
            
            $this->newLog($name,$log,$action);

            return $data;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }
    
    public function getReservationById(int $idReservation):Reservation
    {
        try {
            $data = $this->getDataById($idReservation);
            
            $name = 'Select a(n) Reservation';
            $log = 'Selection of the data in Reservations table with an id_reservation equal to $idReservation';
            $action = 'SELECT';
            
            $this->newLog($name,$log,$action);

            return $data;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }

    // public function getReservationByIdTicket(int $idTicket):Ticket
    // {
    //     try{
    //         $query = $this->database->getConnection()->
    //     }
    // }

    public function getReservationsByIdUser(int $idUser):array|string
    {
        try{
            $query = $this->database->getConnection()->prepare('SELECT id_reservation, reservation_date, airports.name as airport_departure, airports2.name as airport_arrival, airports.country as country_departure, airports2.country as country_arrival, flights.date_departure, flights.date_arrival, tickets.id_seat, type_seat.name as seat_cat FROM reservations INNER JOIN tickets ON tickets.id_ticket = reservations.id_ticket INNER JOIN flights ON tickets.id_flight = flights.id_flight INNER JOIN airports ON flights.airport_departure = airports.id_airport INNER JOIN airports as airports2 ON flights.airport_arrival = airports2.id_airport INNER JOIN seats ON seats.id_seat = tickets.id_seat INNER JOIN type_seat ON seats.id_seats = type_seat.id_seats WHERE reservations.id_user = '.$idUser);
            $query->execute();

            $data = $query->fetchAll();

            $name = 'Select Reservations by id_user with inner join';
            $log = 'Selection of the data in Reservations table with inner joins and having an id_user equal to '.$idUser;
            $action = 'SELECT';
            
            $this->newLog($name,$log,$action);

            return $data;
        
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }

    public function insertReservation(array $data):bool
    {
        try{
            $newId = $this->insertData($data);
            
            $name = 'Insert a(n) Reservation';
            $log = 'Insert a new Reservation in the reservations table, an id_reservation given for this new entry is '.$newId;
            $action = 'INSERT';
            
            $this->newLog($name,$log,$action);

            return true;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }

    public function updateReservation(int $idReservation,array $data):bool
    {
        try{
            $this->updateData($idReservation,$data);
            
            $name = 'Update a(n) Reservation';
            $log = 'Update the data of a(n)Reservation in the reservations table with an id_reservation equal to '.$idReservation;
            $action = 'UPDATE';
            
            $this->newLog($name,$log,$action);

            return true;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }

    public function deleteReservation(int $idReservation):bool
    {
        try{
            $this->deleteData($idReservation);
            
            $name = 'Delete a(n) Reservation';
            $log = 'Delete the entry in reservations table with the id_reservation equal to '.$idReservation;
            $action = 'DELETE';
            
            $this->newLog($name,$log,$action);

            return true;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }

    public function deleteMultipleReservation(array $data):bool
    {
        try{
            $this->deleteMultipleData($data);
            
            $c = count($data);

            $ids = $this->arrayInString($data);

            $name = 'Delete '.$c.' Reservation';
            $log = 'Delete '.$c.' entry in reservations table with the id_reservation in ('.$ids.')';
            $action = 'DELETE';
            
            $this->newLog($name,$log,$action);

            return true;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }

}