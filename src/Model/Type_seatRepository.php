<?php
Namespace Application\Model;

Use Application\Lib\Repository;
Use Application\Lib\Classes\Type_seat;

Class Type_seatRepository extends Repository
{
    const TABLE_NAME = 'type_seats';
    const CLASS_NAME = 'Type_seat';
    const ID_NAME = 'id_type_seat';
    const ATTRIBUTES_NAME = 'id_seats,name,price';
    const ATTRIBUTES_PREPARE = '?,?,?';

    public function getType_seats():array
    {
        try {
            $data = $this->getData();
            
            $name = 'Select all Type_seats';
            $log = 'Selection of all the data in Type_seats table';
            $action = 'SELECT';
            
            $this->newLog($name,$log,$action);

            return $data;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }
    
    public function getType_seatById(int $idType_seat):Type_seat
    {
        try {
            $data = $this->getDataById($idType_seat);
            
            $name = 'Select a(n) Type_seat';
            $log = 'Selection of the data in Type_seats table with an id_type_seat equal to $idType_seat';
            $action = 'SELECT';
            
            $this->newLog($name,$log,$action);

            return $data;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }

    public function insertType_seat(array $data):bool
    {
        try{
            $newId = $this->insertData($data);
            
            $name = 'Insert a(n) Type_seat';
            $log = 'Insert a new Type_seat in the type_seats table, an id_type_seat given for this new entry is '.$newId;
            $action = 'INSERT';
            
            $this->newLog($name,$log,$action);

            return true;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }

    public function updateType_seat(int $idType_seat,array $data):bool
    {
        try{
            $this->updateData($idType_seat,$data);
            
            $name = 'Update a(n) Type_seat';
            $log = 'Update the data of a(n)Type_seat in the type_seats table with an id_type_seat equal to '.$idType_seat;
            $action = 'UPDATE';
            
            $this->newLog($name,$log,$action);

            return true;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }

    public function deleteType_seat(int $idType_seat):bool
    {
        try{
            $this->deleteData($idType_seat);
            
            $name = 'Delete a(n) Type_seat';
            $log = 'Delete the entry in type_seats table with the id_type_seat equal to '.$idType_seat;
            $action = 'DELETE';
            
            $this->newLog($name,$log,$action);

            return true;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }

    public function deleteMultipleType_seat(array $data):bool
    {
        try{
            $this->deleteMultipleData($data);
            
            $c = count($data);

            $ids = $this->arrayInString($data);

            $name = 'Delete '.$c.' Type_seat';
            $log = 'Delete '.$c.' entry in type_seats table with the id_type_seat in ('.$ids.')';
            $action = 'DELETE';
            
            $this->newLog($name,$log,$action);

            return true;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }

}