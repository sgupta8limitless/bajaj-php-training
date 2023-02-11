<?php

// include('Connection.php');

class User
{

    public $connection=null;

    function __construct($connection)
    {
        $this->connection = $connection;
    }
    public function create($name,$username,$email,$password,$contact)
    {

        $query = "insert into users(name,username,email,password,contact) 
        values('$name','$username','$email','$password','$contact')";

        $result = mysqli_query($this->connection->getConnection(), $query);
        
        return $result;
        

    }

    public function login($username,$password)
    {
        $query = "select * from users where username='$username' and password='$password'";

        $result = mysqli_query($this->connection->getConnection(), $query);


        if(mysqli_num_rows($result)===1)
        {

            $row=mysqli_fetch_assoc($result);

            return array("success"=>true,"userid"=>$row["id"]);
        }
       
        return array("success"=>false);
        
        


    }
}