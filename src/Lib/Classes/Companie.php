<?php

Namespace Application\Lib\Classes;
    
class Companie
{
    
    private int $idCompany;
    private string $name;
    private string $logo;
    
    public function __construct(array $companie)
    {
        $this->idCompany = $companie['id_company'];
        $this->name = $companie['name'];
        $this->logo = $companie['logo'];
        
    }
    
    public function getIdCompany()
    {
        return $this->idCompany;
    }

    public function setIdCompany(int $data)
    {
        $this->idCompany = $data;
    }
    
    
    public function getName()
    {
        return $this->name;
    }

    public function setName(string $data)
    {
        $this->name = $data;
    }
    
    
    public function getLogo()
    {
        return $this->logo;
    }

    public function setLogo(string $data)
    {
        $this->logo = $data;
    }
    
    
    
}