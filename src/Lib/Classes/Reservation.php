<?php

Namespace Application\Lib\Classes;
    
class Reservation
{
    
    private int $idReservation;
    private \DateTimeImmutable $reservationDate;
    private string $idSeat;
    private int $idFlight;
    private int $idUser;
    
    public function __construct(array $reservation)
    {
        $this->idReservation = $reservation['id_reservation'];
        $this->reservationDate = new \DateTimeImmutable($reservation['reservation_date']);
        $this->idSeat = $reservation['id_seat'];
        $this->idFlight = $reservation['id_flight'];
        $this->idUser = $reservation['id_user'];
        
    }
    
    public function getIdReservation()
    {
        return $this->idReservation;
    }

    public function setIdReservation(int $data)
    {
        $this->idReservation = $data;
    }
    
    
    public function getReservationDate()
    {
        return $this->reservationDate;
    }

    public function setReservationDate(\DateTimeImmutable $data)
    {
        $this->reservationDate = $data;
    }
    
    
    public function getIdSeat()
    {
        return $this->idSeat;
    }

    public function setIdSeat(string $data)
    {
        $this->idSeat = $data;
    }
    
    
    public function getIdFlight()
    {
        return $this->idFlight;
    }

    public function setIdFlight(int $data)
    {
        $this->idFlight = $data;
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