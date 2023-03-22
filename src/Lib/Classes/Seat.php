<?php

Namespace Application\Lib\Classes;
    
class Seat
{
    
    private string $idSeat;
    private int $idModel;
    private int $idSeats;
    
    public function __construct(array $seat)
    {
        $this->idSeat = $seat['id_seat'];
        $this->idModel = $seat['id_model'];
        $this->idSeats = $seat['id_seats'];
        
    }
    
    public function getIdSeat()
    {
        return $this->idSeat;
    }

    public function setIdSeat(string $data)
    {
        $this->idSeat = $data;
    }
    
    
    public function getIdModel()
    {
        return $this->idModel;
    }

    public function setIdModel(int $data)
    {
        $this->idModel = $data;
    }
    
    
    public function getIdSeats()
    {
        return $this->idSeats;
    }

    public function setIdSeats(int $data)
    {
        $this->idSeats = $data;
    }
    
    
    
}