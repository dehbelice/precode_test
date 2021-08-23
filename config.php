<?php

class Config {

    private $DB_SERVER;
    private $DB_USERNAME;
    private $DB_PASSWORD;
    private $DB_NAME;

    public function __construct()
    {
        /* Acesso ao banco definido com os seguintes valores
           ajuste os campos de acordo com o necessário*/

        $this->setServer('localhost');
        $this->setUsername('precode_user');
        $this->setPassword('1234');
        $this->setName('precode_base');
    }
    
    public function setServer($DB_SERVER)
    {
        $this->DB_SERVER = $DB_SERVER;
    }

    public function setUsername($DB_USERNAME)
    {
        $this->DB_USERNAME = $DB_USERNAME;
    }

    public function setPassword($DB_PASSWORD)
    {
        $this->DB_PASSWORD = $DB_PASSWORD;
    }

    public function setName($DB_NAME)
    {
        $this->DB_NAME = $DB_NAME;
    }

    public function getServer()
    {
        return $this->DB_SERVER;
    }

    public function getUsername()
    {
        return $this->DB_USERNAME;
    }

    public function getPassword()
    {
        return $this->DB_PASSWORD;
    }

    public function getName()
    {
        return $this->DB_NAME;
    }

    public function conecta(){
        /* Tenta conectar ao banco */
        $mysqli = new mysqli($this->getServer(), $this->getUsername(), $this->getPassword(), $this->getName());
        // Verifica se deu certo
        if($mysqli === false){
            die("ERROR: Could not connect. " . $mysqli->connect_error);
        }
        else 
        {
            return $mysqli;
        }
    }

}

?>