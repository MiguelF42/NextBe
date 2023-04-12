<?php 

namespace Application\Lib;

use Application\Lib\DatabaseConnection;
use Application\Lib\Tools;
use Application\Lib\Logger;

abstract class Repository
{
    // CONST FOR REPOSITORY WORKING
    const TABLE_NAME = 'undefined';
    const CLASS_NAME = 'undefined';
    const ID_NAME = 'id';
    const ATTRIBUTES_NAME = 'undefined';
    const ATTRIBUTES_PREPARE = 'undefined';

    // CONST FOR LOGGER WORKING
    const LOG_TABLE = 'logs';

    protected DatabaseConnection $database;
    protected Logger $logger;

    public function __construct (DatabaseConnection $database, Logger $logger)
    {
        $this->database = $database;
        $this->logger = $logger;
    }

    protected function dataInClass(array $data)// Return an instance of static::CLASS_NAME with the data in argument
    {
        return new ${static::CLASS_NAME}($data);
    }

    protected function dataInArray(\PDOStatement $statement):array // Put all the data in an array of class
    {
        $data = [];

        while($row = $statement->fetch())
        {
            $data = $this->dataInClass($row);
        }

        return $data;
    }

    protected function arrayInString(array $data,?string $delimiter = null):string //Replace all the data in array ($data) into a string seperated by ($delimiter) if you don't give any argument for $delimiter, the delimiter will be ',' 
    {
        $string = '';

        if($delimiter === null) $delimiter = ',';
        
        foreach($data as $row)
        {
            $string = $string.$row.$delimiter;
        }
        
        rtrim($string,',');
        
        return $string;
    }

    protected function verifyNameData(array $data):bool //Verify if the array as the right keys to be insert in a SQL query
    {
        foreach($data as $key => $value)
        {
            if(!strpos(static::ATTRIBUTES_NAME,$key))
            {
                return false;
            }
        }

        return true;
    }

    protected function getData():array // Get all the data of a table and return it in an array maked by the method dataInArray();
    {
        $dataStatement = $this->database->getConnection()->query('SELECT * FROM '.static::TABLE_NAME);
        
        return $this->dataInArray($dataStatement);
    }

    protected function getDataById(int $id) // Get an element with his id and return an instance of static::CLASS_NAME
    {
        $dataStatement = $this->database->getConnection()->query('SELECT * FROM '.static::TABLE_NAME.' WHERE id = '.$id);

        $data = $dataStatement->fetch();

        if(empty($data)) {
            throw new \RuntimeException("Id renseigné ne correspond à aucun élément", 1);
        }

        return $this->dataInClass($data);
    }

    protected function insertData(array $data):int
    {
        $insertStatement = $this->database->getConnection()->prepare('INSERT INTO '.static::TABLE_NAME.'('.static::ATTRIBUTES_NAME.') VALUES('.static::ATTRIBUTES_PREPARE.')');
        $insertStatement->execute($data);
        $id = Tools::lastId();
        
        return $id;
    }

    // protected function patchData(int $id,array $data):bool
    // {
    //     //A modifier avec le system PATCH
    //     $attributes = explode(',',static::ATTRIBBUTES_NAME);
    //     $queryAttributes = $this->arrayInString($attributes,' = ?,');
    //     $data[] = $id;

    //     $updateStatement = $this->database->getConnection()->prepare('UPDATE '.static::TABLE_NAME.' SET '.$queryAttributes.' WHERE '.static::ID_NAME.' = '.$id);
    //     $updateStatement->execute($data);

    //     return true;
    // }

    protected function updateData(int $id,array $data):bool
    {
        
        if(!$this->verifyNameData($data))
        {
            throw new \RuntimeException('Nom de donnée inexistante');
        }
        $keys = \array_keys($data);
        $keysInString = $this->arrayInString($keys,' = ?,');

        $updateStatement = $this->database->getConnection()->prepare('UPDATE '.static::TABLE_NAME.' SET '.$keysInString.' WHERE '.static::ID_NAME.' = '.$id);
        $updateStatement->execute($data);

        return true;
    }

    protected function deleteData(int $id):bool
    {
        $deleteStatement = $this->database->getConnection()->prepare('DELETE FROM '.static::TABLE_NAME.' WHERE '.static::ID_NAME.' = ?');
        $deleteStatement->exectute([$id]);

        return true;
    }

    protected function deleteMultipleData(array $data):bool
    {
        $dataInString = $this->arrayInString($data);
        $deleteStatement = $this->database->getConnection()->query('DELETE FROM '.static::TABLE_NAME.' WHERE '.static::ID_NAME.' IN ('.$dataInString.')');
        $deleteStatement->fetch();

        return true;
    }

    protected function newLog(string $name,string $log,string $action):bool
    {
        try {
            return $this->logger->registerLog($name,$log,static::TABLE_NAME,$action);
        }
        catch(\Exception $e) {
            throw new \Exception('Erreur :'.$e->getMessage());
        }
    }
}