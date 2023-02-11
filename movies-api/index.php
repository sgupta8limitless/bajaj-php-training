<?php 



include('src/Database.php');
include('src/controllers/MovieController.php');
include('src/gateways/MovieGateway.php');


$urlParts = explode("/",$_SERVER['REQUEST_URI']);

$id=$urlParts[3] ?? null;


$database=new Database();

if($urlParts[2]==="movies")
{
    $movieGateway=new MovieGateway($database);
    $movieController=new MovieController($movieGateway);
    $movieController->handleRequest($_SERVER['REQUEST_METHOD'],$id);
}








?>