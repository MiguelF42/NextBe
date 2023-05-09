<?php
Namespace Application\Model;

Use Application\Lib\Repository;
Use Application\Lib\Classes\Flight;

Class FlightRepository extends Repository
{
    const TABLE_NAME = 'flights';
    const CLASS_NAME = 'Flight';
    const ID_NAME = 'id_flight';
    const ATTRIBUTES_NAME = 'id_flight,date_departure,date_arrival,airport_departure,airport_arrival,id_plane,id_pilot';
    const ATTRIBUTES_PREPARE = '?,?,?,?,?,?,?';

    public function getFlights():array
    {
        try {
            $data = $this->getData();
            
            $name = 'Select all Flights';
            $log = 'Selection of all the data in Flights table';
            $action = 'SELECT';
            
            $this->newLog($name,$log,$action);

            return $data;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }
    
    public function getFlightById(int $idFlight):Flight
    {
        try {
            $data = $this->getDataById($idFlight);
            
            $name = 'Select a(n) Flight';
            $log = 'Selection of the data in Flights table with an id_flight equal to $idFlight';
            $action = 'SELECT';
            
            $this->newLog($name,$log,$action);

            return $data;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }

    public function insertFlight(array $data):bool|int
    {
        try{
            $newId = $this->insertData($data);
            
            $name = 'Insert a(n) Flight';
            $log = 'Insert a new Flight in the flights table, an id_flight given for this new entry is '.$newId;
            $action = 'INSERT';
            
            $this->newLog($name,$log,$action);

            return $newId;
        }
        catch(\Exception $e){
            throw new \Exception('Erreur :'.$e->getMessage());
        }
    }

    public function updateFlight(int $idFlight,array $data):bool
    {
        try{
            $this->updateData($idFlight,$data);
            
            $name = 'Update a(n) Flight';
            $log = 'Update the data of a(n)Flight in the flights table with an id_flight equal to '.$idFlight;
            $action = 'UPDATE';
            
            $this->newLog($name,$log,$action);

            return true;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }

    public function deleteFlight(int $idFlight):bool
    {
        try{
            $this->deleteData($idFlight);
            
            $name = 'Delete a(n) Flight';
            $log = 'Delete the entry in flights table with the id_flight equal to '.$idFlight;
            $action = 'DELETE';
            
            $this->newLog($name,$log,$action);

            return true;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }

    public function deleteMultipleFlight(array $data):bool
    {
        try{
            $this->deleteMultipleData($data);
            
            $c = count($data);

            $ids = $this->arrayInString($data);

            $name = 'Delete '.$c.' Flight';
            $log = 'Delete '.$c.' entry in flights table with the id_flight in ('.$ids.')';
            $action = 'DELETE';
            
            $this->newLog($name,$log,$action);

            return true;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }

}