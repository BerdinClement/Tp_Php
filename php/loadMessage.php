<?php
    session_start();
    
    require_once 'connexion.php';
    $pdo = getPDO();

    $recupMessage = $pdo->query("SELECT M.* FROM (select * from messages order by id desc limit 50) M order by M.id limit 50");

    while ($message = $recupMessage->fetch()) {
        ?>
            <div class="ui <?php echo $message['user']=="Admin" ? "warning" : "floating"  ?> message">
                <h4 style="display: inline-block; padding-right: 10px; margin-right: 10px; border-right: 1px solid red;<?php echo $message['user']=="Admin" ? "color: red;" : ""  ?> "> <p style="display: inline-block; color:grey; font-size:12px; padding-right:5px;"> <?php echo $message['date']?> </p> <?php echo $message['user']?> </h4>
                <p style="display: inline-block; "> <?php echo $message['message']?> </p>
            </div>
        <?php
    }
?>