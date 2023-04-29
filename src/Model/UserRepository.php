<?php
    Namespace Application\Model;
    
    use Application\Lib\Repository;
    use Application\Lib\Classes\User;
    
    Class UserRepository extends Repository
    {
        const TABLE_NAME = 'users';
        const CLASS_NAME = 'User';
        const ID_NAME = 'id_user';
        const ATTRIBUTES_NAME = 'id_user,firstname,lastname,email,password,phone,birthday,address,postal_code,country,creation_date';
        const ATTRIBUTES_PREPARE = '?,?,?,?,?,?,?,?,?,?,?';
    
        public function getUsers():array
        {
            try {
                $data = $this->getData();
                
                $name = 'Select all Users';
                $log = 'Selection of all the data in Users table';
                $action = 'SELECT';
                
                $this->newLog($name,$log,$action);
    
                return $data;
            }
            catch(\Exception $e){
                return 'Erreur :'.$e->getMessage();
            }
        }
        
        public function getUserById(int $idUser):User
        {
            try {
                $data = $this->getDataById($idUser);
                
                $name = 'Select a(n) User';
                $log = 'Selection of the data in Users table with an id_user equal to $idUser';
                $action = 'SELECT';
                
                $this->newLog($name,$log,$action);
    
                return $data;
            }
            catch(\Exception $e){
                return 'Erreur :'.$e->getMessage();
            }
        }
    
        public function insertUser(array $data):bool
        {
            try{
                $newId = $this->insertData($data);
                
                $name = 'Insert a(n) User';
                $log = 'Insert a new User in the users table, an id_user given for this new entry is '.$newId;
                $action = 'INSERT';
                
                $this->newLog($name,$log,$action);
    
                return true;
            }
            catch(\Exception $e){
                return 'Erreur :'.$e->getMessage();
            }
        }
    
        public function updateUser(int $idUser,array $data):bool
        {
            try{
                $this->updateData($idUser,$data);
                
                $name = 'Update a(n) User';
                $log = 'Update the data of a(n)User in the users table with an id_user equal to '.$idUser;
                $action = 'UPDATE';
                
                $this->newLog($name,$log,$action);
    
                return true;
            }
            catch(\Exception $e){
                return 'Erreur :'.$e->getMessage();
            }
        }
    
        public function deleteUser(int $idUser):bool
        {
            try{
                $this->deleteData($idUser);
                
                $name = 'Delete a(n) User';
                $log = 'Delete the entry in users table with the id_user equal to '.$idUser;
                $action = 'DELETE';
                
                $this->newLog($name,$log,$action);
    
                return true;
            }
            catch(\Exception $e){
                return 'Erreur :'.$e->getMessage();
            }
        }
    
        public function deleteMultipleUser(array $data):bool
        {
            try{
                $this->deleteMultipleData($data);
                
                $c = count($data);
    
                $ids = $this->arrayInString($data);
    
                $name = 'Delete '.$c.' User';
                $log = 'Delete '.$c.' entry in users table with the id_user in ('.$ids.')';
                $action = 'DELETE';
                
                $this->newLog($name,$log,$action);
    
                return true;
            }
            catch(\Exception $e){
                return 'Erreur :'.$e->getMessage();
            }
        }
    
        private function getUserByEmail(array $email):array
        {
            $userStatement = $this->database->getConnection()->query('SELECT * FROM user WHERE email = "'.$email.'"');
    
            if (!$userStatement) {
                throw new \RuntimeException('L\'email indiqué ne correspond à aucun utilisateur existant');
            }
    
            return $userStatement->fetch();
        }
    
        public function connectUser(array $input):bool|string
        {
            try
            {
                $userData = $this->getUserByEmail($input['email']);
    
                if(!$userData || !password_verify($input['password'],$userData['password']))
                {
                    throw new \RuntimeExcpetion('L\'email et le mot de passe indiqué ne correspondent à aucun compte existant');
                }
                $userObject = new User($userData);
        
                $_SESSION['user'] = $userObject;
        
                $name = 'Connection of a user';
                $log = 'Connection of the user with the id_user equal to '.$userObject->getIdUser().', after a SELECT to verify the email and the password';
                $action = 'SELECT';
                $this->newLog($name,$log,$action);
    
                return true;
            }
            catch (Exception $e)
            {
                return 'Erreur :'.$e->getMessage();
            }
        }
    
        public function disconnectUser():void
        {
            session_destroy();
            session_start();
    
            Tools::defaultUser();
            Tools::redirect();
        }
    
        public function registerUser(array $input):bool
        {
            try
            {
                $newUserStatement = $this->database->getConnection()->prepare('INSERT INTO '.self::TABLE_NAME.' (firstname,lastname,email,password,birthday,is_admin');
                $newUserStatement->execute([
                    'firstname' => $input['firstname'],
                    'lastname' => $input['lastname'],
                    'birth_department' => $input['birth_department'],
                    'email' => $input['email'],
                    'phone' => $input['phone'],
                    'password' => $input['password']
                ]);
                
                $name = 'Register User';
                $log = 'Registering a new user into the table '.static::TABLE_NAME.', the id of the user is '.Tools::lastId();
                $action = 'SELECT';
    
                $this->newLog($name,$log,$action);
    
                return true;
            }
            catch(Exception $e)
            {
                return 'Erreur :'.$e->getMessage();
            }
        }
    }