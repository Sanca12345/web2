<?php
require_once '../libraries/Database.php';
class Feedback
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function GetAllData()
    {
       $query="SELECT *
        FROM feedback";
        //$result = mysqli_query($this->db, $query);
        //$get_all = mysqli_fetch_all($result, MYSQLI_ASSOC);

        $this->db->query($query);

        return $this->db->resultSet();
    }

    public function MakeAPost($data)
    {
        $this->db->query('INSERT INTO feedback (usersName, forumPost, date)
                        VALUES(:name, :forum, :date)');
                        
        $this->db->bind(':name',$data['usersName']);
        $this->db->bind(':forum',$data['forumPost']);
        $this->db->bind(':date',$data['date']);
       
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }


    }








}