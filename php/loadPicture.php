<?php
    session_start();
    
    require_once 'connexion.php';
    $pdo = getPDO();

    $recupPhoto = $pdo->query("select * from picture order by id desc limit 50");

    while ($photo = $recupPhoto->fetch()) {
        ?>

            <div id="photo" style="display: inline-block; text-align:center; margin: 10px 15px;">
                <img style="display: block;margin-bottom: 10px; max-height: 550px; min-height: 550px;" src="<?php echo $photo['link'] ?>" alt="<?php echo $photo['name'] ?>">


                <div class="ui buttons">
                    <h2>Ajouté par <?php echo $photo['user']?></h2>
                    <!-- <form <?php echo (((isset($_SESSION['like']) && isset($_SESSION['unlike'])) && ($_SESSION['like']===true && $_SESSION['unlike']===false))? 'action="delLike.php" method="post"' : 'action="addLike.php" method="post"') ?>>
                        <input style="display: none;" type="text" value="<?php echo $photo['link'] ?>" name="url">
                        <button style="background-color: red;" type="submit" class="ui positive button"><i class="heart icon"></i> Like : <?php 
                            echo $photo['likes'];
                        ?></button>
                    </form> -->
                </div>

                
            </div>

        <?php
    }
?>