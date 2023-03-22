<?php
Namespace Application\Model;

Use Application\Lib\Repository;
Use Application\Lib\Classes\Pilot;

Class PilotRepository extends Repository
{
    const TABLE_NAME = 'pilots';
    const CLASS_NAME = 'Pilot';
    const ID_NAME = 'id_pilot';
    const ATTRIBUTES_NAME = 'id_pilot,salary,start_date,id_company,id_user';
    const ATTRIBUTES_PREPARE = '?,?,?,?,?';

    public function getPilots():array
    {
        try {
            $data = $this->getData();
            
            $name = 'Select all Pilots';
            $log = 'Selection of all the data in Pilots table';
            $action = 'SELECT';
            
            $this->newLog($name,$log,$action);

            return $data;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }
    
    public function getPilotById(int $idPilot):Pilot
    {
        try {
            $data = $this->getDataById($idPilot);
            
            $name = 'Select a(n) Pilot';
            $log = 'Selection of the data in Pilots table with an id_pilot equal to $idPilot';
            $action = 'SELECT';
            
            $this->newLog($name,$log,$action);

            return $data;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }

    public function insertPilot(array $data):bool
    {
        try{
            $newId = $this->insertData($data);
            
            $name = 'Insert a(n) Pilot';
            $log = 'Insert a new Pilot in the pilots table, an id_pilot given for this new entry is '.$newId;
            $action = 'INSERT';
            
            $this->newLog($name,$log,$action);

            return true;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }

    public function updatePilot(int $idPilot,array $data):bool
    {
        try{
            $this->updateData($idPilot,$data);
            
            $name = 'Update a(n) Pilot';
            $log = 'Update the data of a(n)Pilot in the pilots table with an id_pilot equal to '.$idPilot;
            $action = 'UPDATE';
            
            $this->newLog($name,$log,$action);

            return true;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }

    public function deletePilot(int $idPilot):bool
    {
        try{
            $this->deleteData($idPilot);
            
            $name = 'Delete a(n) Pilot';
            $log = 'Delete the entry in pilots table with the id_pilot equal to '.$idPilot;
            $action = 'DELETE';
            
            $this->newLog($name,$log,$action);

            return true;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }

    public function deleteMultiplePilot(array $data):bool
    {
        try{
            $this->deleteMultipleData($data);
            
            $c = count($data);

            $ids = $this->arrayInString($data);

            $name = 'Delete '.$c.' Pilot';
            $log = 'Delete '.$c.' entry in pilots table with the id_pilot in ('.$ids.')';
            $action = 'DELETE';
            
            $this->newLog($name,$log,$action);

            return true;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }

}