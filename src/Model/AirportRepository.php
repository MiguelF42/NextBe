<?php
Namespace Application\Model;

Use Application\Lib\Repository;
Use Application\Lib\Classes\Airport;

Class AirportRepository extends Repository
{
    const TABLE_NAME = 'airports';
    const CLASS_NAME = 'Airport';
    const ID_NAME = 'id_airport';
    const ATTRIBUTES_NAME = 'id_airport,name,country,city';
    const ATTRIBUTES_PREPARE = '?,?,?,?';

    public function getAirports():array|string
    {
        try {
            $data = $this->getData();
            
            $name = 'Select all Airports';
            $log = 'Selection of all the data in Airports table';
            $action = 'SELECT';
            
            $this->newLog($name,$log,$action);

            return $data;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }

    public function getAirportsOrderByName():array|string
    {
        try{
            $query = $this->database->getConnection()->query('SELECT * FROM '.static::TABLE_NAME.' ORDER BY name');

            $data = $this->dataInArray($query);

            $name = 'Select all Airports ordered by name';
            $log = 'Selection of all the data in Airports table ordered by the attribute name';
            $action = 'SELECT';
            
            $this->newLog($name,$log,$action);

            return $data;
        }
        catch(\Exception $e)
        {
            return 'Erreur :'.$e->getMessage();
        }
    }
    
    public function getAirportById(int $idAirport):Airport
    {
        try {
            $data = $this->getDataById($idAirport);
            
            $name = 'Select a(n) Airport';
            $log = 'Selection of the data in Airports table with an id_airport equal to $idAirport';
            $action = 'SELECT';
            
            $this->newLog($name,$log,$action);

            return $data;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }

    public function insertAirport(array $data):bool
    {
        try{
            $newId = $this->insertData($data);
            
            $name = 'Insert a(n) Airport';
            $log = 'Insert a new Airport in the airports table, an id_airport given for this new entry is '.$newId;
            $action = 'INSERT';
            
            $this->newLog($name,$log,$action);

            return true;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }

    public function updateAirport(int $idAirport,array $data):bool
    {
        try{
            $this->updateData($idAirport,$data);
            
            $name = 'Update a(n) Airport';
            $log = 'Update the data of a(n)Airport in the airports table with an id_airport equal to '.$idAirport;
            $action = 'UPDATE';
            
            $this->newLog($name,$log,$action);

            return true;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }

    public function deleteAirport(int $idAirport):bool
    {
        try{
            $this->deleteData($idAirport);
            
            $name = 'Delete a(n) Airport';
            $log = 'Delete the entry in airports table with the id_airport equal to '.$idAirport;
            $action = 'DELETE';
            
            $this->newLog($name,$log,$action);

            return true;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }

    public function deleteMultipleAirport(array $data):bool
    {
        try{
            $this->deleteMultipleData($data);
            
            $c = count($data);

            $ids = $this->arrayInString($data);

            $name = 'Delete '.$c.' Airport';
            $log = 'Delete '.$c.' entry in airports table with the id_airport in ('.$ids.')';
            $action = 'DELETE';
            
            $this->newLog($name,$log,$action);

            return true;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }

}