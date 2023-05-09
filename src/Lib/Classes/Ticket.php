<?php

Namespace Application\Lib\Classes;
    
class Ticket
{
    
    private int $idTicket;
    private string $idSeat;
    private int $idFlight;
    
    public function __construct(array $ticket)
    {
        $this->idTicket = $ticket['id_ticket'];
        $this->idSeat = $ticket['id_seat'];
        $this->idFlight = $ticket['id_flight'];
        
    }
    
    public function getIdTicket()
    {
        return $this->idTicket;
    }

    public function setIdTicket(int $data)
    {
        $this->idTicket = $data;
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
    
    
    
}