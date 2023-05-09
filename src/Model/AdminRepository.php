<?php
Namespace Application\Model;

Use Application\Lib\Repository;
Use Application\Lib\Classes\Admin;

Class AdminRepository extends Repository
{
    const TABLE_NAME = 'admins';
    const CLASS_NAME = 'Admin';
    const ID_NAME = 'id_admin';
    const ATTRIBUTES_NAME = 'id_admin,id_company,id_user';
    const ATTRIBUTES_PREPARE = '?,?,?';

    public function getAdmins():array
    {
        try {
            $data = $this->getData();
            
            $name = 'Select all Admins';
            $log = 'Selection of all the data in Admins table';
            $action = 'SELECT';
            
            $this->newLog($name,$log,$action);

            return $data;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }
    
    public function getAdminById(int $idAdmin):Admin|bool
    {
        try {
            $data = $this->getDataById($idAdmin);
            
            $name = 'Select a(n) Admin';
            $log = 'Selection of the data in Admins table with an id_admin equal to '.$idAdmin;
            $action = 'SELECT';
            
            $this->newLog($name,$log,$action);

            return $data;
        }
        catch(\Exception $e){
           throw new \Exception ('Erreur :'.$e->getMessage());
        }
    }

    public function getAdminByUserId(int $idUser):Admin|bool
    {
        try{
            $query = $this->database->getConnection()->query('SELECT * FROM '.static::TABLE_NAME.' WHERE id_user = '.$idUser);

            $data = $query->fetch();

            if(!$data) return false;

            $admin = $this->dataInClass($data);

            $name = 'Select a(n) Admin by id_user';
            $log = 'Selection of the data in Admins table with an id_user equal to '.$idUser;
            $action = 'SELECT';
            
            $this->newLog($name,$log,$action);

            return $admin;
        }
        catch(\Exception $e)
        {
            throw new \Exception ('Erreur :'.$e->getMessage());
        }
    }

    public function insertAdmin(array $data):bool
    {
        try{
            $newId = $this->insertData($data);
            
            $name = 'Insert a(n) Admin';
            $log = 'Insert a new Admin in the admins table, an id_admin given for this new entry is '.$newId;
            $action = 'INSERT';
            
            $this->newLog($name,$log,$action);

            return true;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }

    public function updateAdmin(int $idAdmin,array $data):bool
    {
        try{
            $this->updateData($idAdmin,$data);
            
            $name = 'Update a(n) Admin';
            $log = 'Update the data of a(n)Admin in the admins table with an id_admin equal to '.$idAdmin;
            $action = 'UPDATE';
            
            $this->newLog($name,$log,$action);

            return true;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }

    public function deleteAdmin(int $idAdmin):bool
    {
        try{
            $this->deleteData($idAdmin);
            
            $name = 'Delete a(n) Admin';
            $log = 'Delete the entry in admins table with the id_admin equal to '.$idAdmin;
            $action = 'DELETE';
            
            $this->newLog($name,$log,$action);

            return true;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }

    public function deleteMultipleAdmin(array $data):bool
    {
        try{
            $this->deleteMultipleData($data);
            
            $c = count($data);

            $ids = $this->arrayInString($data);

            $name = 'Delete '.$c.' Admin';
            $log = 'Delete '.$c.' entry in admins table with the id_admin in ('.$ids.')';
            $action = 'DELETE';
            
            $this->newLog($name,$log,$action);

            return true;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }

}