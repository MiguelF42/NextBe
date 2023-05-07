<?php

Namespace Application\Lib\Classes;
    
class TypeSeat
{
    
    private int $idSeats;
    private string $name;
    private int $price;
    
    public function __construct(array $typeSeat)
    {
        $this->idSeats = $typeSeat['id_seats'];
        $this->name = $typeSeat['name'];
        $this->price = $typeSeat['price'];
        
    }
    
    public function getIdSeats()
    {
        return $this->idSeats;
    }

    public function setIdSeats(int $data)
    {
        $this->idSeats = $data;
    }
    
    
    public function getName()
    {
        return $this->name;
    }

    public function setName(string $data)
    {
        $this->name = $data;
    }
    
    
    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice(int $data)
    {
        $this->price = $data;
    }
    
    
    
}