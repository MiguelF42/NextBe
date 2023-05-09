<?php

Namespace Application\Lib\Classes;
    
class Flight
{
    
    private int $idFlight;
    private \DateTimeImmutable $dateDeparture;
    private \DateTimeImmutable $dateArrival;
    private int $airportDeparture;
    private int $airportArrival;
    private int $idPlane;
    private int $idPilot;
    
    public function __construct(array $flight)
    {
        $this->idFlight = $flight['id_flight'];
        $this->dateDeparture = new \DateTimeImmutable($flight['date_departure']);
        $this->dateArrival = new \DateTimeImmutable($flight['date_arrival']);
        $this->airportDeparture = $flight['airport_departure'];
        $this->airportArrival = $flight['airport_arrival'];
        $this->idPlane = $flight['id_plane'];
        $this->idPilot = $flight['id_pilot'];
        
    }
    
    public function getIdFlight()
    {
        return $this->idFlight;
    }

    public function setIdFlight(int $data)
    {
        $this->idFlight = $data;
    }
    
    
    public function getDateDeparture()
    {
        return $this->dateDeparture;
    }

    public function setDateDeparture(\DateTimeImmutable $data)
    {
        $this->dateDeparture = $data;
    }
    
    
    public function getDateArrival()
    {
        return $this->dateArrival;
    }

    public function setDateArrival(\DateTimeImmutable $data)
    {
        $this->dateArrival = $data;
    }
    
    
    public function getAirportDeparture()
    {
        return $this->airportDeparture;
    }

    public function setAirportDeparture(int $data)
    {
        $this->airportDeparture = $data;
    }
    
    
    public function getAirportArrival()
    {
        return $this->airportArrival;
    }

    public function setAirportArrival(int $data)
    {
        $this->airportArrival = $data;
    }
    
    
    public function getIdPlane()
    {
        return $this->idPlane;
    }

    public function setIdPlane(int $data)
    {
        $this->idPlane = $data;
    }
    
    
    public function getIdPilot()
    {
        return $this->idPilot;
    }

    public function setIdPilot(int $data)
    {
        $this->idPilot = $data;
    }
    
    
    
}