<?php 

class ReviewGateway
{
    private $connection=null;

    public function __construct($database)
    {
        $this->connection=$database->getConnection();
    }

    public function index()
    {
        $query="select * from reviews";
        $result=$this->connection->query($query);

        $data=array();

        while($row=$result->fetch_assoc())
        {
            $data[]=$row;
        }

        return $data;

        

    }

    public function show($id)
    {
        $query="select * from reviews where id=$id";
        $result=$this->connection->query($query);
        $data=$result->fetch_assoc();
        return $data;
    }


    public function create($review)
    {

        $mid=$review['mid'];
        $reviewMessage=$review['review'];
        $email=$review['email'];
        $rating=$review['rating'];

        $query="INSERT INTO reviews( mid, email, review, rating) 
        VALUES ($mid,'$email','$reviewMessage',$rating)";

        if($this->connection->query($query))
        {
            return true;
        }
        
        return false;


    }

    public function update($review,$id)
    {
        $mid=$review['mid'];
        $reviewMessage=$review['review'];
        $email=$review['email'];
        $rating=$review['rating'];

        $query="UPDATE reviews SET review='$reviewMessage',rating=$rating WHERE id=$id";

        if($this->connection->query($query))
        {
            return true;
        }
        
        return false;
    }


    public function delete($id)
    {
        $query="delete from reviews where id=$id";

        if($this->connection->query($query))
        {
            return true;
        }
        
        return false;

    }


}

