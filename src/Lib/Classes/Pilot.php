<?php

Namespace Application\Lib\Classes;
    
class Pilot
{
    
    private int $idPilot;
    private int $salary;
    private \DateTimeImmutable $startDate;
    private int $idCompany;
    private int $idUser;
    
    public function __construct(array $pilot)
    {
        $this->idPilot = $pilot['id_pilot'];
        $this->salary = $pilot['salary'];
        $this->startDate = new \DateTimeImmutable($pilot['start_date']);
        $this->idCompany = $pilot['id_company'];
        $this->idUser = $pilot['id_user'];
        
    }
    
    public function getIdPilot()
    {
        return $this->idPilot;
    }

    public function setIdPilot(int $data)
    {
        $this->idPilot = $data;
    }
    
    
    public function getSalary()
    {
        return $this->salary;
    }

    public function setSalary(int $data)
    {
        $this->salary = $data;
    }
    
    
    public function getStartDate()
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTimeImmutable $data)
    {
        $this->startDate = $data;
    }
    
    
    public function getIdCompany()
    {
        return $this->idCompany;
    }

    public function setIdCompany(int $data)
    {
        $this->idCompany = $data;
    }
    
    
    public function getIdUser()
    {
        return $this->idUser;
    }

    public function setIdUser(int $data)
    {
        $this->idUser = $data;
    }
    
    
    
}