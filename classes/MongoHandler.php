<?php
class MongoHandler
{
    public $conn;

    function __construct()
    {
        $this->conn = $this->getMongoConnection();
    }

    private function getMongoConnection()
    {
        $server = "mongodb://csc545mongo:Ce24-iu-I2app@den1.mongo1.gear.host:27001";

        try{
            $conn = new MongoClient("den1.mongo1.gear.host:27001", array(
                "username" => "csc545mongo",
                "password" => "Ce24-iu-I2ap",
                "db" => "csc545mongo"
            ));
        }catch (MongoConnectionException $e){
            echo $e;
        }
        return $conn;
    }
}