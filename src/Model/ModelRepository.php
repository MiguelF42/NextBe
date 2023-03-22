<?php
Namespace Application\Model;

Use Application\Lib\Repository;
Use Application\Lib\Classes\Model;

Class ModelRepository extends Repository
{
    const TABLE_NAME = 'models';
    const CLASS_NAME = 'Model';
    const ID_NAME = 'id_model';
    const ATTRIBUTES_NAME = 'id_model,name,constructor';
    const ATTRIBUTES_PREPARE = '?,?,?';

    public function getModels():array
    {
        try {
            $data = $this->getData();
            
            $name = 'Select all Models';
            $log = 'Selection of all the data in Models table';
            $action = 'SELECT';
            
            $this->newLog($name,$log,$action);

            return $data;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }
    
    public function getModelById(int $idModel):Model
    {
        try {
            $data = $this->getDataById($idModel);
            
            $name = 'Select a(n) Model';
            $log = 'Selection of the data in Models table with an id_model equal to $idModel';
            $action = 'SELECT';
            
            $this->newLog($name,$log,$action);

            return $data;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }

    public function insertModel(array $data):bool
    {
        try{
            $newId = $this->insertData($data);
            
            $name = 'Insert a(n) Model';
            $log = 'Insert a new Model in the models table, an id_model given for this new entry is '.$newId;
            $action = 'INSERT';
            
            $this->newLog($name,$log,$action);

            return true;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }

    public function updateModel(int $idModel,array $data):bool
    {
        try{
            $this->updateData($idModel,$data);
            
            $name = 'Update a(n) Model';
            $log = 'Update the data of a(n)Model in the models table with an id_model equal to '.$idModel;
            $action = 'UPDATE';
            
            $this->newLog($name,$log,$action);

            return true;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }

    public function deleteModel(int $idModel):bool
    {
        try{
            $this->deleteData($idModel);
            
            $name = 'Delete a(n) Model';
            $log = 'Delete the entry in models table with the id_model equal to '.$idModel;
            $action = 'DELETE';
            
            $this->newLog($name,$log,$action);

            return true;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }

    public function deleteMultipleModel(array $data):bool
    {
        try{
            $this->deleteMultipleData($data);
            
            $c = count($data);

            $ids = $this->arrayInString($data);

            $name = 'Delete '.$c.' Model';
            $log = 'Delete '.$c.' entry in models table with the id_model in ('.$ids.')';
            $action = 'DELETE';
            
            $this->newLog($name,$log,$action);

            return true;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }

}