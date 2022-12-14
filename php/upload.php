<?php

    session_start();

    if(!empty($_FILES['file']))
    {
        
        $nameFile = $_FILES['file']['name'];
        $typeFile = $_FILES['file']['type'];
        $sizeFile = $_FILES['file']['size'];
        $tmpFile = $_FILES['file']['tmp_name'];
        $errFile = $_FILES['file']['error'];

        
        // Extensions
        $extensions = ['png', 'jpg', 'jpeg', 'gif'];
        // Type d'image
        $type = ['image/png', 'image/jpg', 'image/jpeg', 'image/gif'];
        // On récupère
        $extension = explode('.', $nameFile);
        // Max size
        $max_size = 200000000;


        // On vérifie que le type est autorisés
        if(in_array($typeFile, $type))
        {
            // On vérifie que il n'y a que deux extensions
            if(count($extension) <= 2 && in_array(strtolower(end($extension)), $extensions))
            {
                // On vérifie le poids de l'image
                if($sizeFile < $max_size)
                {
                    // On bouge l'image uploadé dans le dossier upload
                    $link = '../img/'.uniqid() . '.' . strtolower(end($extension));

                    if(move_uploaded_file($tmpFile, $link ) ){

                        require_once 'connexion.php';
                        $pdo = getPDO();
                        $user = $_SESSION['username'];
                        $request = $pdo->prepare('INSERT INTO picture (link, likes, user) VALUES (:link, 0, :user)');
                        $request->execute(['link'=>$link,'user'=>$user]);

                        header('Location: ../photo.php');
                    }
                        
                    else {
                        echo '<script type="text/JavaScript"> 
                        alert("failed");
                        document.location.href="../photo.php";
                        </script>';
                    }
                }
                else 
                {
                    echo '<script type="text/JavaScript"> 
                    alert("Fichier trop lourd ou format incorrect");
                    document.location.href="../photo.php";
                    </script>';
                }
            }
            else 
            {
                echo '<script type="text/JavaScript"> 
                alert("Extension failed");
                document.location.href="../photo.php";
                </script>';
            }
        }   
        else 
        {
            echo '<script type="text/JavaScript"> 
            alert("Type non autorisé");
            document.location.href="../photo.php";
            </script>';
        }


    }
    else 
    {
        header('Location: ../photo.php');
        die();
    }