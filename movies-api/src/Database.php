<?php 

class Database{

    private $connection=null;

    public function __construct()
    {
        $this->connection=new mysqli("localhost","root","","movies_api");

        if(!$this->connection)
        {
            echo $this->connection->error;
        }


    }

    public function getConnection()
    {
        return $this->connection;
    }

}