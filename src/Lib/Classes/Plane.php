<?php

Namespace Application\Lib\Classes;
    
class Plane
{
    
    private int $idPlane;
    private \DateTimeImmutable $circulationDate;
    private int $idModel;
    private int $idCompany;
    
    public function __construct(array $plane)
    {
        $this->idPlane = $plane['id_plane'];
        $this->circulationDate = new \DateTimeImmutable($plane['circulation_date']);
        $this->idModel = $plane['id_model'];
        $this->idCompany = $plane['id_company'];
        
    }
    
    public function getIdPlane()
    {
        return $this->idPlane;
    }

    public function setIdPlane(int $data)
    {
        $this->idPlane = $data;
    }
    
    
    public function getCirculationDate()
    {
        return $this->circulationDate;
    }

    public function setCirculationDate(\DateTimeImmutable $data)
    {
        $this->circulationDate = $data;
    }
    
    
    public function getIdModel()
    {
        return $this->idModel;
    }

    public function setIdModel(int $data)
    {
        $this->idModel = $data;
    }
    
    
    public function getIdCompany()
    {
        return $this->idCompany;
    }

    public function setIdCompany(int $data)
    {
        $this->idCompany = $data;
    }
    
    
    
}