<?php

Namespace Application\Lib\Classes;
    
class Log
{
    
    private int $idLog;
    private string $name;
    private string $log;
    private string $category;
    private string $action;
    private string $ip;
    private \DateTimeImmutable $creationDate;
    private int $idUser;
    
    public function __construct(array $log)
    {
        $this->idLog = $log['id_log'];
        $this->name = $log['name'];
        $this->log = $log['log'];
        $this->category = $log['category'];
        $this->action = $log['action'];
        $this->ip = $log['ip'];
        $this->creationDate = new \DateTimeImmutable($log['creation_date']);
        $this->idUser = $log['id_user'];
        
    }
    
    public function getIdLog()
    {
        return $this->idLog;
    }

    public function setIdLog(int $data)
    {
        $this->idLog = $data;
    }
    
    
    public function getName()
    {
        return $this->name;
    }

    public function setName(string $data)
    {
        $this->name = $data;
    }
    
    
    public function getLog()
    {
        return $this->log;
    }

    public function setLog(string $data)
    {
        $this->log = $data;
    }
    
    
    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory(string $data)
    {
        $this->category = $data;
    }
    
    
    public function getAction()
    {
        return $this->action;
    }

    public function setAction(string $data)
    {
        $this->action = $data;
    }
    
    
    public function getIp()
    {
        return $this->ip;
    }

    public function setIp(string $data)
    {
        $this->ip = $data;
    }
    
    
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    public function setCreationDate(\DateTimeImmutable $data)
    {
        $this->creationDate = $data;
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