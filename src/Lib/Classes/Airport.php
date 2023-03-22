<?php

Namespace Application\Lib\Classes;
    
class Airport
{
    
    private int $idAirport;
    private string $name;
    private string $country;
    private string $city;
    
    public function __construct(array $airport)
    {
        $this->idAirport = $airport['id_airport'];
        $this->name = $airport['name'];
        $this->country = $airport['country'];
        $this->city = $airport['city'];
        
    }
    
    public function getIdAirport()
    {
        return $this->idAirport;
    }

    public function setIdAirport(int $data)
    {
        $this->idAirport = $data;
    }
    
    
    public function getName()
    {
        return $this->name;
    }

    public function setName(string $data)
    {
        $this->name = $data;
    }
    
    
    public function getCountry()
    {
        return $this->country;
    }

    public function setCountry(string $data)
    {
        $this->country = $data;
    }
    
    
    public function getCity()
    {
        return $this->city;
    }

    public function setCity(string $data)
    {
        $this->city = $data;
    }
    
    
    
}