<?php 

class ReviewController
{
    private $reviewGateway=null;
    public function __construct($gateway)
    {
        $this->reviewGateway=$gateway;
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
                $response=$this->reviewGateway->index();
                echo json_encode($response);
                break;
            }
            case 'POST':{
                $review=(array)json_decode(file_get_contents('php://input'),true);
                $response=$this->reviewGateway->create($review);
                if($response)
                {
                    echo json_encode(array("success"=>true,"message"=>"Review Created"));
                }
                else 
                {
                    echo json_encode(array("success"=>false,"message"=>"Some Problem"));                    
                }

                break;

            }
        }


    }

    public function processResourceRequest($method,$id)
    {
        switch($method)
        {
            case 'GET':{
                $response=$this->reviewGateway->show($id);
                echo json_encode($response);
                break;
            }
            case 'PUT':{
                $review=(array)json_decode(file_get_contents('php://input'),true);
                $response=$this->reviewGateway->update($review,$id);
                if($response)
                {
                    echo json_encode(array("success"=>true,"message"=>"Review Updated"));
                }
                else 
                {
                    echo json_encode(array("success"=>false,"message"=>"Some Problem"));                    
                }

                break;

            }
            case 'DELETE':{
                $response=$this->reviewGateway->delete($id);
                if($response)
                {
                    echo json_encode(array("success"=>true,"message"=>"Review Deleted"));
                }
                else 
                {
                    echo json_encode(array("success"=>false,"message"=>"Some Problem"));                    
                }

                break;
            }
        }
    }


}
