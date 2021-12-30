<?php 
    include_once 'header.php';
    include_once '../controllers/feedbackController.php';
    include_once '../helpers/session_helper.php';
    $fbController = new FeedbackController;
    $data = $fbController->GetAllPost();
    
    if(isset($_SESSION['usersId'])){
        echo explode(" ", $_SESSION['usersName'])[0];
    }else{
        redirect("login.php");
    } 

?>
<style>
table, th, td{
    
    width: 80%;
    text-align: center;
    position: center;
    margin-left: auto;
  margin-right: auto;
}

th, td {
  border-bottom: 1px solid #ddd;
}



</style>
<table type="table" >
<thead>
    <tr>
        <th>Username</th>
        <th>Post</th>
        <th>Date</th>
    </tr>
</thead>

<tbody>
<?php
//var_dump($data);
    foreach($data as $i => $sor)
    {
        //var_dump($sor);
        //exit;
    ?>
    
    <tr>
    <td><?php echo $sor->usersName; ?></td>
    <td><?php echo $sor->forumPost; ?></td>
    <td><?php echo $sor->date; ?></td>
    </tr>
    <?php }
    ?>
</tbody>

</table>

<form method="post" action="../controllers/feedbackController.php">

<input type="text-input" name="basicPost" cols="60" rows="4" placeholder="Text here...">
<button type="submit" name="submit">Küldés</button>

</form >
<?php 
    include_once 'footer.php'
?>