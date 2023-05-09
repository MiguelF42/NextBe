<?php

Namespace Application\Lib\Classes;
    
class Reservation
{
    
    private int $idReservation;
    private \DateTimeImmutable $reservationDate;
    private int $idTicket;
    private int $idUser;
    
    public function __construct(array $reservation)
    {
        $this->idReservation = $reservation['id_reservation'];
        $this->reservationDate = new \DateTimeImmutable($reservation['reservation_date']);
        $this->idTicket = $reservation['id_ticket'];
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
    
    
    public function getIdTicket()
    {
        return $this->idTicket;
    }

    public function setIdTicket(int $data)
    {
        $this->idTicket = $data;
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