<?php 
    session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Login System</title>
    <link rel="stylesheet" href="./style.css" type="text/css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.2/chart.min.js" integrity="sha512-tMabqarPtykgDtdtSqCL3uLVM0gS1ZkUAVhRFu1vSEFgvB73niFQWJuvviDyBGBH22Lcau4rHB5p2K2T0Xvr6Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    <nav>
        <ul>
            <a href="index.php"><li>Home</li></a>
            <a href="Forum.php"><li>Forum</li></a>
            <a href="sutiCliens.php"><li>Sütik</li></a>
            <a href="mnbClient.php"><li>Árfolyamok</li></a>
            <?php if(!isset($_SESSION['usersId'])) : ?>
                <a href="signup.php"><li>Sign Up</li></a>
                <a href="login.php"><li>Login</li></a>
            <?php else: ?>
                <a href="../controllers/Users.php?q=logout"><li>Logout</li></a>
            <?php endif; ?>
            <a id="index-text" href="#"><?php if(isset($_SESSION['usersId'])){
        echo explode(" ", $_SESSION['usersName'])[0];
    }
    ?> </a>
        </ul>
    </nav>
</body>
<html lang="en">