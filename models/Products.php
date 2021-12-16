<?php
require_once '../libraries/Database.php';
class Products
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function findDataWithInput($input)
    {
        $this->db->query('SELECT * FROM suti WHERE nev = :input');
        $this->db->bind(':input', $input);
    

        $row = $this->db->single();
        if($this->db->rowCount() > 0)
        {
            return $row;
        }
        
        
    }


    public function GetAllData()
    {
       $query="SELECT s.*, a.*, t.* 
        FROM suti as s, ar as a, tartalom as t
        WHERE s.id = a.id AND a.id = t.id ";
        //$result = mysqli_query($this->db, $query);
        //$get_all = mysqli_fetch_all($result, MYSQLI_ASSOC);

        $this->db->query($query);

        return $this->db->resultSet();
    }

}