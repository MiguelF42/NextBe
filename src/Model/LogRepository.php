<?php
Namespace Application\Model;

Use Application\Lib\Repository;
Use Application\Lib\Classes\Log;

Class LogRepository extends Repository
{
    const TABLE_NAME = 'logs';
    const CLASS_NAME = 'Log';
    const ID_NAME = 'id_log';
    const ATTRIBUTES_NAME = 'id_log,name,log,category,action,ip,creation_date,id_user';
    const ATTRIBUTES_PREPARE = '?,?,?,?,?,?,?,?';

    public function getLogs():array
    {
        try {
            $data = $this->getData();
            
            $name = 'Select all Logs';
            $log = 'Selection of all the data in Logs table';
            $action = 'SELECT';
            
            $this->newLog($name,$log,$action);

            return $data;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }
    
    public function getLogById(int $idLog):Log
    {
        try {
            $data = $this->getDataById($idLog);
            
            $name = 'Select a(n) Log';
            $log = 'Selection of the data in Logs table with an id_log equal to $idLog';
            $action = 'SELECT';
            
            $this->newLog($name,$log,$action);

            return $data;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }

    public function insertLog(array $data):bool
    {
        try{
            $newId = $this->insertData($data);
            
            $name = 'Insert a(n) Log';
            $log = 'Insert a new Log in the logs table, an id_log given for this new entry is '.$newId;
            $action = 'INSERT';
            
            $this->newLog($name,$log,$action);

            return true;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }

    public function updateLog(int $idLog,array $data):bool
    {
        try{
            $this->updateData($idLog,$data);
            
            $name = 'Update a(n) Log';
            $log = 'Update the data of a(n)Log in the logs table with an id_log equal to '.$idLog;
            $action = 'UPDATE';
            
            $this->newLog($name,$log,$action);

            return true;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }

    public function deleteLog(int $idLog):bool
    {
        try{
            $this->deleteData($idLog);
            
            $name = 'Delete a(n) Log';
            $log = 'Delete the entry in logs table with the id_log equal to '.$idLog;
            $action = 'DELETE';
            
            $this->newLog($name,$log,$action);

            return true;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }

    public function deleteMultipleLog(array $data):bool
    {
        try{
            $this->deleteMultipleData($data);
            
            $c = count($data);

            $ids = $this->arrayInString($data);

            $name = 'Delete '.$c.' Log';
            $log = 'Delete '.$c.' entry in logs table with the id_log in ('.$ids.')';
            $action = 'DELETE';
            
            $this->newLog($name,$log,$action);

            return true;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }

}