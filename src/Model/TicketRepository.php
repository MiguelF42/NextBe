<?php
Namespace Application\Model;

use Application\Lib\Tools;
Use Application\Lib\Repository;
Use Application\Lib\Classes\Ticket;

Class TicketRepository extends Repository
{
    const TABLE_NAME = 'tickets';
    const CLASS_NAME = 'Ticket';
    const ID_NAME = 'id_ticket';
    const ATTRIBUTES_NAME = 'id_ticket,id_seat,id_flight';
    const ATTRIBUTES_PREPARE = '?,?,?';

    public function getTickets():array
    {
        try {
            $data = $this->getData();
            
            $name = 'Select all Tickets';
            $log = 'Selection of all the data in Tickets table';
            $action = 'SELECT';
            
            $this->newLog($name,$log,$action);

            return $data;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }
    
    public function getTicketById(int $idTicket):Ticket
    {
        try {
            $data = $this->getDataById($idTicket);
            
            $name = 'Select a(n) Ticket';
            $log = 'Selection of the data in Tickets table with an id_ticket equal to $idTicket';
            $action = 'SELECT';
            
            $this->newLog($name,$log,$action);

            return $data;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }

    public function insertTicket(array $data):bool
    {
        try{
            $newId = $this->insertData($data);
            
            $name = 'Insert a(n) Ticket';
            $log = 'Insert a new Ticket in the tickets table, an id_ticket given for this new entry is '.$newId;
            $action = 'INSERT';
            
            $this->newLog($name,$log,$action);

            return true;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }

    public function updateTicket(int $idTicket,array $data):bool
    {
        try{
            $this->updateData($idTicket,$data);
            
            $name = 'Update a(n) Ticket';
            $log = 'Update the data of a(n)Ticket in the tickets table with an id_ticket equal to '.$idTicket;
            $action = 'UPDATE';
            
            $this->newLog($name,$log,$action);

            return true;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }

    public function deleteTicket(int $idTicket):bool
    {
        try{
            $this->deleteData($idTicket);
            
            $name = 'Delete a(n) Ticket';
            $log = 'Delete the entry in tickets table with the id_ticket equal to '.$idTicket;
            $action = 'DELETE';
            
            $this->newLog($name,$log,$action);

            return true;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }

    public function deleteMultipleTicket(array $data):bool
    {
        try{
            $this->deleteMultipleData($data);
            
            $c = count($data);

            $ids = $this->arrayInString($data);

            $name = 'Delete '.$c.' Ticket';
            $log = 'Delete '.$c.' entry in tickets table with the id_ticket in ('.$ids.')';
            $action = 'DELETE';
            
            $this->newLog($name,$log,$action);

            return true;
        }
        catch(\Exception $e){
            return 'Erreur :'.$e->getMessage();
        }
    }

    public function generateTickets(array $seats,int $idFlight):bool
    {
        try{
            $query = 'INSERT INTO '.static::TABLE_NAME.' ('.\str_replace(static::ID_NAME.',','',static::ATTRIBUTES_NAME).') VALUES';
            $c = count($seats);

            foreach($seats as $seat)
            {
                $query .= '('.$seat['id_seat'].','.$idFlight.'),';
            }

            $query = rtrim($query,',');

            Tools::debugVar($idFlight);
            Tools::debugVar($query);

            $statement = $this->database->getConnection()->prepare($query);
            $statement->execute();
            
            $name = 'Insert '.$c.' Ticket(s)';
            $log = 'Insert '.$c.' new Tickets in the tickets table, for id_flight '.$idFlight;
            $action = 'INSERT';
            
            $this->newLog($name,$log,$action);

            return true;
        }
        catch(\Exception $e){
            echo 'Erreur :'.$e->getMessage();
        }
    }
}