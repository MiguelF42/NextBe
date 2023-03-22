<?php

Namespace Application\Lib\Classes;
    
class Model
{
    
    private int $idModel;
    private string $name;
    private string $constructor;
    
    public function __construct(array $model)
    {
        $this->idModel = $model['id_model'];
        $this->name = $model['name'];
        $this->constructor = $model['constructor'];
        
    }
    
    public function getIdModel()
    {
        return $this->idModel;
    }

    public function setIdModel(int $data)
    {
        $this->idModel = $data;
    }
    
    
    public function getName()
    {
        return $this->name;
    }

    public function setName(string $data)
    {
        $this->name = $data;
    }
    
    
    public function getConstructor()
    {
        return $this->constructor;
    }

    public function setConstructor(string $data)
    {
        $this->constructor = $data;
    }
    
    
    
}