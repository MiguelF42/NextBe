<?php

Namespace Application\Lib\Classes;
    
class User
{
    
    private int $idUser;
    private string $firstname;
    private string $lastname;
    private string $email;
    private string $phone;
    private \DateTimeImmutable $birthday;
    private string $address;
    private string $postalCode;
    private string $country;
    private \DateTimeImmutable $creationDate;
    
    public function __construct(array $user)
    {
        $this->idUser = $user['id_user'];
        $this->firstname = $user['firstname'];
        $this->lastname = $user['lastname'];
        $this->email = $user['email'];
        $this->phone = $user['phone'];
        $this->birthday = new \DateTimeImmutable($user['birthday']);
        $this->address = $user['address'];
        $this->postalCode = $user['postal_code'];
        $this->country = $user['country'];
        $this->creationDate = new \DateTimeImmutable($user['creation_date']);
        
    }
    
    public function getIdUser()
    {
        return $this->idUser;
    }

    public function setIdUser(int $data)
    {
        $this->idUser = $data;
    }
    
    
    public function getFirstname()
    {
        return $this->firstname;
    }

    public function setFirstname(string $data)
    {
        $this->firstname = $data;
    }
    
    
    public function getLastname()
    {
        return $this->lastname;
    }

    public function setLastname(string $data)
    {
        $this->lastname = $data;
    }
    
    
    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail(string $data)
    {
        $this->email = $data;
    }
    
    
    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone(string $data)
    {
        $this->phone = $data;
    }
    
    
    public function getBirthday()
    {
        return $this->birthday;
    }

    public function setBirthday(\DateTimeImmutable $data)
    {
        $this->birthday = $data;
    }
    
    
    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress(string $data)
    {
        $this->address = $data;
    }
    
    
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    public function setPostalCode(string $data)
    {
        $this->postalCode = $data;
    }
    
    
    public function getCountry()
    {
        return $this->country;
    }

    public function setCountry(string $data)
    {
        $this->country = $data;
    }
    
    
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    public function setCreationDate(\DateTimeImmutable $data)
    {
        $this->creationDate = $data;
    }
    
    
    
}