<?php

Namespace Application\Lib\Classes;
    
class Admin
{
    
    private int $idAdmin;
    private int $idCompany;
    private int $idUser;
    
    public function __construct(array $admin)
    {
        $this->idAdmin = $admin['id_admin'];
        $this->idCompany = $admin['id_company'];
        $this->idUser = $admin['id_user'];
        
    }
    
    public function getIdAdmin()
    {
        return $this->idAdmin;
    }

    public function setIdAdmin(int $data)
    {
        $this->idAdmin = $data;
    }
    
    
    public function getIdCompany()
    {
        return $this->idCompany;
    }

    public function setIdCompany(int $data)
    {
        $this->idCompany = $data;
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