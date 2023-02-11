<?php 

class Connection 
{

    private $conn = null;
    public function __construct()
    {
        $this->conn = mysqli_connect("localhost","root","","car-rental");
    }

    public function getConnection()
    {
        return $this->conn;
    }

}