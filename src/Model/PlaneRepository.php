<?php
Namespace Application\Model;

Use Application\Lib\Repository;
Use Application\Lib\Classes\Plane;

Class PlaneRepository extends Repository
{
    const TABLE_NAME = 'planes';
    const CLASS_NAME = 'Plane';
    const ID_NAME = 'id_plane';
    const ATTRIBUTES_NAME = 'id_plane,circulation_date,id_model,id_company';
    const ATTRIBUTES_PREPARE = '?,?,?,?';

    public function getPlanes():array
    {
        try {
            $data = $this->getData();
            
            $name = 'Select all Planes';
            $log = 'Selection of all the data in Planes table';
            $action = 'SELECT';
            
            $this->newLog($name,$log,$action);

            return $data;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }
    
    public function getPlaneById(int $idPlane):Plane
    {
        try {
            $data = $this->getDataById($idPlane);
            
            $name = 'Select a(n) Plane';
            $log = 'Selection of the data in Planes table with an id_plane equal to '.$idPlane;
            $action = 'SELECT';
            
            $this->newLog($name,$log,$action);

            return $data;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }

    public function getPlaneByIdCompanie(int $idCompanie):array|bool
    {
        try {  
            $query = $this->database->getConnection()->prepare('SELECT id_plane,circulation_date,model.name AS model,company.name AS company FROM '.static::TABLE_NAME.' INNER JOIN models ON models.id_model = planes.id_model INNER JOIN companies ON companies.id_companie = planes.id_companie WHERE planes.id_company = '.$idCompanie);
            $query->execute();
            $data = $query->fetchAll();
        
            $name = 'Select a(n) Planes by id_companie';
            $log = 'Selection of the data in Planes table with an id_companie equal to '.$idCompanie.' 2 INNER JOIN with models and comapnies tables';
            $action = 'SELECT';

            $this->newLog($name,$log,$action);

            return $data;
        }
        catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

    public function getPlanesWithInner():array|bool
    {
        try{
            $query = $this->database->getConnection()->prepare('SELECT id_plane,circulation_date,models.name AS model,companies.name AS company FROM '.static::TABLE_NAME.' INNER JOIN models ON models.id_model = planes.id_model INNER JOIN companies ON companies.id_company = planes.id_company');
            $query->execute();
            $data = $query->fetchAll();
        
            $name = 'Select a(n) Planes by id_companie';
            $log = 'Selection of the data in Planes table with 2 INNER JOIN with models and comapnies tables';
            $action = 'SELECT';

            $this->newLog($name,$log,$action);

            return $data;
        }
        catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

    public function insertPlane(array $data):bool
    {
        try{
            $newId = $this->insertData($data);
            
            $name = 'Insert a(n) Plane';
            $log = 'Insert a new Plane in the planes table, an id_plane given for this new entry is '.$newId;
            $action = 'INSERT';
            
            $this->newLog($name,$log,$action);

            return true;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }

    public function updatePlane(int $idPlane,array $data):bool
    {
        try{
            $this->updateData($idPlane,$data);
            
            $name = 'Update a(n) Plane';
            $log = 'Update the data of a(n)Plane in the planes table with an id_plane equal to '.$idPlane;
            $action = 'UPDATE';
            
            $this->newLog($name,$log,$action);

            return true;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }

    public function deletePlane(int $idPlane):bool
    {
        try{
            $this->deleteData($idPlane);
            
            $name = 'Delete a(n) Plane';
            $log = 'Delete the entry in planes table with the id_plane equal to '.$idPlane;
            $action = 'DELETE';
            
            $this->newLog($name,$log,$action);

            return true;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }

    public function deleteMultiplePlane(array $data):bool
    {
        try{
            $this->deleteMultipleData($data);
            
            $c = count($data);

            $ids = $this->arrayInString($data);

            $name = 'Delete '.$c.' Plane';
            $log = 'Delete '.$c.' entry in planes table with the id_plane in ('.$ids.')';
            $action = 'DELETE';
            
            $this->newLog($name,$log,$action);

            return true;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }

}