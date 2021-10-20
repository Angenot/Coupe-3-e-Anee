<?php
require('jouer.php');
$affichescore = $bdn->prepare('SELECT nom_equipe_1,nom_equipe_2,score_1,score_2 FROM match_pam');
$affichescore->execute();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link href="championnat.css" rel="stylesheet"/>
        <title>Affichage score</title>
    </head>
    <body>
        <div id="score">
            
        </div>
        
        
        <div class="aff">
            <a class="bout" href="classement.php">Afficher Classement</a>
        <table class="scorer">
            <thead>
            <tr>
                <th>Equipe 1</th>
                <th>Equipe 2</th>
                <th>Score 1</th>
                <th>Score 2</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    while($infoscore = $affichescore->fetch(PDO::FETCH_OBJ)){?>
            <tr>
                <td><?= $infoscore->nom_equipe_1 ?></td>
                <td><?= $infoscore->nom_equipe_2 ?></td>
                <td><?= $infoscore->score_1 ?></td>
                <td><?= $infoscore->score_2 ?></td>
                </tr>
            </tbody>
            <?php }
                ?>
        </table>
           
            </div>
    </body>
</html>