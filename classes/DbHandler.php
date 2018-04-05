<?php
class DbHandler
{
    private $conn;

    function __construct()
    {
        $this->conn = $this->getConnection();
    }

    public function callFunction($action, $params = null)
    {
        $trying = $this->$action($params);
        return $trying;
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

    public function getCategories($params = null)
    {
        $sql = "SELECT id, name FROM category";
        $result = $this->conn->query($sql);
        $rows = array();

        while($row = $result->fetch_assoc()){
            array_push($rows, $row);
        }
        return $rows;
    }

    /**
     * @array $param
     * includes 'categoryId'
     */
    public function getItemsByCategory($params)
    {
        $categoryId = $params['categoryId'];

        $sql = "SELECT i.id, i.name, i.price, ic.quantity
        FROM item i JOIN item_count ic ON i.id = ic.item_id
        WHERE i.category_id = $categoryId";

        $result = $this->conn->query($sql);
        $rows = array();

        while($row = $result->fetch_assoc()){
            $r = array(
                'id' => $row['id'],
                'name' => $row['name'],
                'price' => $row['price'],
                'quantity' => $row['quantity']
            );
            array_push($rows, $r);
        }
        return $rows;
    }
}

?>