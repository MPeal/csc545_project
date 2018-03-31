<?php

class DbHandler
{
    private $conn;

    function __construct()
    {
        $this->conn = $this->getConnection();
    }

    public function callFunction($action)
    {
        $reply = call_user_func($action);
        return $reply;
    }

    /**
     * public for now...may go with private depending on usage
     */
    public function getConnection()
    {
        return mysqli_connect('den1.mysql5.gear.host',
            'csc45mysql',
            'Op9m8MZ2-5J_',
            'csc45mysql');
    }

    public function getCategories()
    {
        $sql = "SELECT name FROM category";
        $result = $this->conn->query($sql);
    }
}

?>