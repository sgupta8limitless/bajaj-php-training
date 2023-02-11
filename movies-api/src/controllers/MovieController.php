<?php 

class MovieController
{
    private $movieGateway=null;
    public function __construct($gateway)
    {
        $this->movieGateway=$gateway;
    }

    public function handleRequest($method,$id)
    {
        if($id!==null)
        {
            $this->processResourceRequest($method,$id);
        }
        else 
        {
            $this->processRequest($method);
        }
    }


    public function processRequest($method)
    {

        switch($method)
        {
            case 'GET':{
                $response=$this->movieGateway->index();
                echo json_encode($response);
            }
            case 'POST':{
                $movie=(array)json_decode(file_get_contents('php://input'),true);
                $response=$this->movieGateway->create($movie);
                if($response)
                {
                    echo json_encode(array("success"=>true,"message"=>"Movie Created"));
                }
                else 
                {
                    echo json_encode(array("success"=>false,"message"=>"Some Problem"));                    
                }

            }
        }


    }

    public function processResourceRequest($method,$id)
    {

    }


}
