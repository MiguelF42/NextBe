<?php

Namespace Application\Lib\Classes;
    
class Type_seat
{
    
    private int $idSeats;
    private string $name;
    private int $price;
    
    public function __construct(array $type_seat)
    {
        $this->idSeats = $type_seat['id_seats'];
        $this->name = $type_seat['name'];
        $this->price = $type_seat['price'];
        
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