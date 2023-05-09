<?php
Namespace Application\Model;

Use Application\Lib\Repository;
Use Application\Lib\Classes\Seat;

Class SeatRepository extends Repository
{
    const TABLE_NAME = 'seats';
    const CLASS_NAME = 'Seat';
    const ID_NAME = 'id_seat';
    const ATTRIBUTES_NAME = 'id_seat,id_model,id_seats';
    const ATTRIBUTES_PREPARE = '?,?,?';

    public function getSeats():array
    {
        try {
            $data = $this->getData();
            
            $name = 'Select all Seats';
            $log = 'Selection of all the data in Seats table';
            $action = 'SELECT';
            
            $this->newLog($name,$log,$action);

            return $data;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }
    
    public function getSeatById(int $idSeat):Seat
    {
        try {
            $data = $this->getDataById($idSeat);
            
            $name = 'Select a(n) Seat';
            $log = 'Selection of the data in Seats table with an id_seat equal to $idSeat';
            $action = 'SELECT';
            
            $this->newLog($name,$log,$action);

            return $data;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }

    public function getSeatsByIdPlane(int $idPlane):array
    {
        try {
            $query = $this->database->getConnection()->prepare('SELECT '.static::TABLE_NAME.'.id_seat FROM '.static::TABLE_NAME.' INNER JOIN models ON seats.id_model = models.id_model INNER JOIN planes ON planes.id_model = models.id_model WHERE planes.id_plane = '.$idPlane);
            $query->execute();

            $data = $query->fetchAll();

            $name = 'Select some Seats with id_plane';
            $log = 'Selection of the data in Seats table with an id_model equal to the id_model of the id_plane equal to '.$idPlane;
            $action = 'SELECT';

            $this->newLog($name,$log,$action);
            
            return $data;
        }
        catch(\Exception $e){

        }
    }

    public function getSeatsCountByIdModel(int $idModel):array|bool|string
    {
        try{
            $query = $this->database->getConnection()->prepare('SELECT name,COUNT(id_seat) as quantity FROM seats INNER JOIN type_seat ON type_seat.id_seats = seats.id_seats WHERE id_model = '.$idModel.' GROUP BY seats.id_seats');
            $query->execute();
            $data = $query->fetchAll();

            $name = 'Select Count of Seats by id_model';
            $log = 'Select count of the data in Seats table with an id_model equal to '.$idModel.' grouped by id_seats';
            $action = 'SELECT';
            
            $this->newLog($name,$log,$action);

            return $data;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }

    public function insertSeat(array $data):bool
    {
        try{
            $newId = $this->insertData($data);
            
            $name = 'Insert a(n) Seat';
            $log = 'Insert a new Seat in the seats table, an id_seat given for this new entry is '.$newId;
            $action = 'INSERT';
            
            $this->newLog($name,$log,$action);

            return true;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }

    public function updateSeat(int $idSeat,array $data):bool
    {
        try{
            $this->updateData($idSeat,$data);
            
            $name = 'Update a(n) Seat';
            $log = 'Update the data of a(n)Seat in the seats table with an id_seat equal to '.$idSeat;
            $action = 'UPDATE';
            
            $this->newLog($name,$log,$action);

            return true;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }

    public function deleteSeat(int $idSeat):bool
    {
        try{
            $this->deleteData($idSeat);
            
            $name = 'Delete a(n) Seat';
            $log = 'Delete the entry in seats table with the id_seat equal to '.$idSeat;
            $action = 'DELETE';
            
            $this->newLog($name,$log,$action);

            return true;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }

    public function deleteMultipleSeat(array $data):bool
    {
        try{
            $this->deleteMultipleData($data);
            
            $c = count($data);

            $ids = $this->arrayInString($data);

            $name = 'Delete '.$c.' Seat';
            $log = 'Delete '.$c.' entry in seats table with the id_seat in ('.$ids.')';
            $action = 'DELETE';
            
            $this->newLog($name,$log,$action);

            return true;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }

}