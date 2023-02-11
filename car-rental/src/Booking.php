<?php

// include('Connection.php');


class Booking 
{
    private $connection = null;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function create($cdid,$uid,$startDate,$endDate,$amount)
    {

        $query = "insert into bookings(cdid,uid,start_date,end_date,amount) values($cdid,$uid,'$startDate','$endDate',$amount)";

        $result = mysqli_query($this->connection->getConnection(), $query);
        
        return $result;


    }

}


?>