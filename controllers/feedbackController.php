<?php

require_once '../models/Feedback.php';
require_once '../helpers/session_helper.php';




class FeedbackController
{
    private $feedbackModel;

    public function __construct()
    {
        $this->feedbackModel = new Feedback;
        
    }

    public function GetAllPost()
    {
        $output =  $this->feedbackModel->GetAllData();
        return $output;
    }

    public function MakeAPosts()
    {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
    
        $dateTime = new DateTime;

        $data = [
        'usersName' => $_SESSION['usersName'],
        'forumPost' => trim($_POST['basicPost']),
        'date' => $dateTime->format("Y-m-d H:i:s")
        ];
        

        if($this->feedbackModel->MakeAPost($data)){
        header("refresh");
        redirect("../view/index.php");

        }else{
        die("Something went wrong");
        }
    
    }

}

if(isset($_POST['basicPost'])){
    /*echo "siker";
    exit;*/
    
    $feedcr = new FeedbackController;
    
    $feedcr->MakeAPosts();
    
}



