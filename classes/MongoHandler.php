<?php
session_start();
include_once('DbHandler.php');
class MongoHandler
{
    public $conn;
    public $sqlHandler;

    function __construct()
    {
        $this->conn = $this->getMongoConnection();
        $this->sqlHandler = new DbHandler();
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

    public function callFunction($action, $params = null)
    {
        $trying = $this->$action($params);
        return $trying;
    }

    public function getCollection($name)
    {
        $output = null;
        try{
            $db = $this->conn->csc545mongo;
            $collections = $db->getCollectionNames();
            $coll = null;
            foreach($collections as $c){
                $coll = $c === $name ? $c : null;
            }

            if(!is_null($coll)){
                $output =  $db->selectCollection($c);
            }else{
                $db->createCollection($name);
                $output = $db->selectCollection($name);
            }
        }catch(Exception $e){
            echo $e;
        }
        return $output;
    }

    /**
     * @param $cart (String)
     */
    public function placeOrder($data)
    {
        /**
         * find collection for user
         * if not one, create it
         * place order object into collection
         */
        $user = $_SESSION['username'];
        $cart = $data['cart'];
        $cart = json_decode($cart, JSON_UNESCAPED_UNICODE);
        try{
            $collection = $this->getCollection($user);
            $collection->insert($cart);
        }catch(Exception $e){
            echo $e;
        }

        //process order on sql-side db
        $this->sqlHandler->processOrder($cart);

        return array(
            'success' => $user
        );
    }
}