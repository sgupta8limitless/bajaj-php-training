<?php 

class MovieGateway
{

    private $connection=null;

    public function __construct($database)
    {
        $this->connection=$database->getConnection();
    }

    public function index()
    {
        $query="select * from movies";
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
        $query="select * from movies where id=$id";
        $result=$this->connection->query($query);
        $data=$result->fetch_assoc();
        return $data;
    }


    public function create($movie)
    {

        $name=$movie['name'];
        $releaseDate=$movie['releaseDate'];
        $rating=$movie['rating'];
        $description=$movie['description'];
        $genre=$movie['genre'];
        $cast=$movie['cast'];
        $runtime=$movie['runtime'];
        $poster=$movie['poster'];

        $query="insert into movies(name,releaseDate,rating,description,genre,cast,runtime,poster)
        values('$name','$releaseDate',$rating,'$description','$genre','$cast',$runtime,'$poster')";

        if($this->connection->query($query))
        {
            return true;
        }
        
        return false;


    }

    public function update($movie,$id)
    {
        $name=$movie['name'];
        $releaseDate=$movie['releaseDate'];
        $rating=$movie['rating'];
        $description=$movie['description'];
        $genre=$movie['genre'];
        $cast=$movie['cast'];
        $runtime=$movie['runtime'];
        $poster=$movie['poster'];

        $query="UPDATE movies SET name='$name',releaseDate='$releaseDate',rating=$rating,description='$description',genre='$genre',cast='$cast',runtime=$runtime,poster='$poster' WHERE id=$id";

        if($this->connection->query($query))
        {
            return true;
        }
        
        return false;
    }


    public function delete($id)
    {
        $query="delete from movies where id=$id";

        if($this->connection->query($query))
        {
            return true;
        }
        
        return false;

    }



}