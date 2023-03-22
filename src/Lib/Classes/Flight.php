<?php

Namespace Application\Lib\Classes;
    
class Flight
{
    
    private int $idFlight;
    private \DateTimeImmutable $dateDeparture;
    private \DateTimeImmutable $dateArrival;
    private int $avaibleSeats;
    private int $idAirport;
    private int $idAirport1;
    private int $idPlane;
    private int $idPilot;
    
    public function __construct(array $flight)
    {
        $this->idFlight = $flight['id_flight'];
        $this->dateDeparture = new \DateTimeImmutable($flight['date_departure']);
        $this->dateArrival = new \DateTimeImmutable($flight['date_arrival']);
        $this->avaibleSeats = $flight['avaible_seats'];
        $this->idAirport = $flight['id_airport'];
        $this->idAirport1 = $flight['id_airport_1'];
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
    
    
    public function getAvaibleSeats()
    {
        return $this->avaibleSeats;
    }

    public function setAvaibleSeats(int $data)
    {
        $this->avaibleSeats = $data;
    }
    
    
    public function getIdAirport()
    {
        return $this->idAirport;
    }

    public function setIdAirport(int $data)
    {
        $this->idAirport = $data;
    }
    
    
    public function getIdAirport1()
    {
        return $this->idAirport1;
    }

    public function setIdAirport1(int $data)
    {
        $this->idAirport1 = $data;
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