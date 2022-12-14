<?php
    session_start();
    
    require_once 'connexion.php';
    $pdo = getPDO();
    $user = $_SESSION['username'];
    $date = date('H:i',strtotime('1 hour'));

    if (isset($_POST['valider'])) {
        if(!empty($_POST['message'])){

            $message = nl2br(htmlspecialchars($_POST['message']));

            $result = $pdo->prepare('INSERT INTO messages (user, message, date) VALUES ( :user, :message, :date)');
            $result->execute(['user'=>$user,'message'=>$message, 'date'=>$date]);

        }
    }
    header('Location: ../index.php');