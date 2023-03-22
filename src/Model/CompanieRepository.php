<?php
Namespace Application\Model;

Use Application\Lib\Repository;
Use Application\Lib\Classes\Companie;

Class CompanieRepository extends Repository
{
    const TABLE_NAME = 'companies';
    const CLASS_NAME = 'Companie';
    const ID_NAME = 'id_companie';
    const ATTRIBUTES_NAME = 'id_company,name,logo';
    const ATTRIBUTES_PREPARE = '?,?,?';

    public function getCompanies():array
    {
        try {
            $data = $this->getData();
            
            $name = 'Select all Companies';
            $log = 'Selection of all the data in Companies table';
            $action = 'SELECT';
            
            $this->newLog($name,$log,$action);

            return $data;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }
    
    public function getCompanieById(int $idCompanie):Companie
    {
        try {
            $data = $this->getDataById($idCompanie);
            
            $name = 'Select a(n) Companie';
            $log = 'Selection of the data in Companies table with an id_companie equal to $idCompanie';
            $action = 'SELECT';
            
            $this->newLog($name,$log,$action);

            return $data;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }

    public function insertCompanie(array $data):bool
    {
        try{
            $newId = $this->insertData($data);
            
            $name = 'Insert a(n) Companie';
            $log = 'Insert a new Companie in the companies table, an id_companie given for this new entry is '.$newId;
            $action = 'INSERT';
            
            $this->newLog($name,$log,$action);

            return true;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }

    public function updateCompanie(int $idCompanie,array $data):bool
    {
        try{
            $this->updateData($idCompanie,$data);
            
            $name = 'Update a(n) Companie';
            $log = 'Update the data of a(n)Companie in the companies table with an id_companie equal to '.$idCompanie;
            $action = 'UPDATE';
            
            $this->newLog($name,$log,$action);

            return true;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }

    public function deleteCompanie(int $idCompanie):bool
    {
        try{
            $this->deleteData($idCompanie);
            
            $name = 'Delete a(n) Companie';
            $log = 'Delete the entry in companies table with the id_companie equal to '.$idCompanie;
            $action = 'DELETE';
            
            $this->newLog($name,$log,$action);

            return true;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }

    public function deleteMultipleCompanie(array $data):bool
    {
        try{
            $this->deleteMultipleData($data);
            
            $c = count($data);

            $ids = $this->arrayInString($data);

            $name = 'Delete '.$c.' Companie';
            $log = 'Delete '.$c.' entry in companies table with the id_companie in ('.$ids.')';
            $action = 'DELETE';
            
            $this->newLog($name,$log,$action);

            return true;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }

}