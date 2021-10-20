<?php
    
 require('jouer.php');

$afficheClassementa = $bdn->prepare('SELECT * from classement_grpa');
$afficheClassementa->execute();

$afficheClassementb = $bdn->prepare('SELECT * FROM classement_grpb');
$afficheClassementb->execute();

   ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="championnat.css" rel="stylesheet"/>
    <title>Classification equipe</title>
</head>
<body>
    <a class="bout" href="affichescore.php">Retour</a>
    

                   <h1>Gestion Classement</h1>
    
    <h1 align="center">Classement A</h1>
    <div class="classement">
           <table class="scorer">
            <thead>
            <tr>
                <th>MJ</th>
                <th>MG </th>
                <th>MN</th>
                <th>MP</th>
                <th>BP</th>
                <th>BC</th>
                <th>Diff</th>
                <th>Point</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    while($infoClassementA = $afficheClassementa->fetch(PDO::FETCH_OBJ)){?>
            <tr>
                <td><?= $infoClassementA->MJ ?></td>
                <td><?= $infoClassementA->MG ?></td>
                <td><?= $infoClassementA->MN ?></td>
                <td><?= $infoClassementA->MP ?></td>
                 <td><?= $infoClassementA->BP ?></td>
                 <td><?= $infoClassementA->BC ?></td>
                 <td><?= $infoClassementA->Diff ?></td>
                <td><?= $infoClassementA->Point ?></td>
                </tr>
            </tbody>
            <?php }
                ?>
        </table>
    
    
    
        <h1 align="center">Classement B</h1>
    <table class="scorer">
            <thead>
            <tr>
                <th>MJ</th>
                <th>MG </th>
                <th>MN</th>
                <th>MP</th>
                <th>BP</th>
                <th>BC</th>
                <th>Diff</th>
                <th>Point</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    while($infoClassementB = $afficheClassementb->fetch(PDO::FETCH_OBJ)){?>
            <tr>
                <td><?= $infoClassementB->MJ ?></td>
                <td><?= $infoClassementB->MG ?></td>
                <td><?= $infoClassementB->MN ?></td>
                <td><?= $infoClassementB->MP ?></td>
                 <td><?= $infoClassementB->BP ?></td>
                 <td><?= $infoClassementB->BC ?></td>
                 <td><?= $infoClassementB->Diff ?></td>
                <td><?= $infoClassementB->Point ?></td>
                </tr>
            </tbody>
            <?php }
                ?>
        </table>
        </div>
            
</body>
</html>