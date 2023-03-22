<?php
Namespace Application\Model;

Use Application\Lib\Repository;
Use Application\Lib\Classes\Reservation;

Class ReservationRepository extends Repository
{
    const TABLE_NAME = 'reservations';
    const CLASS_NAME = 'Reservation';
    const ID_NAME = 'id_reservation';
    const ATTRIBUTES_NAME = 'id_reservation,reservation_date,id_seat,id_flight,id_user';
    const ATTRIBUTES_PREPARE = '?,?,?,?,?';

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