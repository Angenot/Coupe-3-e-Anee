
<?php

require('jouer.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link href="championnat.css" rel="stylesheet"/>
        <title>Chamionnat</title>
    </head>
    <body>
        
        <div id="part">
           <h2 class="coupe">Coupe</h2>
            <h2 class="champ">Championnat 3e ANNEE</h2>
        </div>
        <h1>Gestion Tirage</h1>
        <?php
        
$groupe = ['Bresil','Argentine','France','Italie','Espagne','Allemagne','Portugal','Haiti'];
$groupeA = [];
$groupeB = [];
$compt1 = 0;
$compt2 = 0;
$compt3 = 0;


 
$recuperer = rand(0,1);
for($i=0;$i<4;$i++){
	$recuperer = rand(0,1);
    $recuperer = $recuperer + $compt3;
	if($recuperer%2==0){
		$groupeA[$compt1] = $groupe[$recuperer];
        $groupeB[$compt2] = $groupe[$recuperer +1];
        $compt1++;
    $compt2++;
    }

    
else{
    $groupeA[$compt1] = $groupe[$recuperer];
    $groupeB[$compt2] = $groupe[$recuperer-1];
	 $compt1++;
    $compt2++;
    
    }
    
   $compt3 = $compt3 + 2;
        }
        ?>
        
        <a class="bouton" href="tirage.php">Tirage</a>
        <div id="Table2">
                                                 
        <table align= "center">
          <h1></h1>
           <tr>
             <th></th>
             <th>Groupe A</th>
             <th>Groupe B</th>
           </tr>
           <tr>
             <td class="teteSerie">1e série</td>
             <td><img src="pays/argentina.png" width="40px" height="40px"/><?php  echo  $groupeA[0] ; ?></td>
             <td><img src="pays/bresil.png" width="40px" height="40px"/> <?php  echo  $groupeB[0] ; ?></td>

             <!--  <td><br /> -->
           </tr>
           <tr>
             <td class="teteSerie">2e série</td>
             <td> <img src="pays/Drapeau-Italie.png" width="40px" height="40px"/><?php  echo  $groupeA[1] ; ?></td>
             <td> <img src="pays/Drapeau-France.png" width="40px" height="40px"/><?php  echo  $groupeB[1] ; ?></td>
           </tr>
           <tr>
                <td class="teteSerie">3e série</td>
                <td> <img src="pays/istockphoto-614888372-640x640.jpg" width="40px" height="40px"/><?php  echo  $groupeA[2] ; ?></td>
                <td> <img src="pays/spain.png" width="40px" height="40px"/><?php  echo  $groupeB[2] ; ?></td>
           </tr>
           <tr>
                <td class="teteSerie">4e série</td>
                <td> <img src="pays/argentina.png" width="40px" height="40px"/><?php  echo  $groupeA[3] ; ?></td>
                <td> <img src="pays/haiti.jpg" width="40px" height="40px"/><?php  echo  $groupeB[3] ; ?></td>
           </tr>
 
   </table>
</div>
        <a href="affichescore.php"><p class="">Affichage Score</p></a>
         <div id="Table3">

  <table align=center>
    <tr>
           <th>Groupe A</th>
           <th>Affiche</th>
           <th>Score</th>
    </tr>

    <tr>
                   <td class="numMatch">1.</td>
                   <td class="Vs"><?php  echo  $groupeA[0] ?> VS  <?php  echo  $groupeA[1] ?></td>
                   <td>
                   <form action="" method="post">
                          <input 
                              type="hidden"
                              name="equipe_1" 
                              value=<?php echo $groupeA[0] ?>/>
                          
                          <input 
                            type="hidden" 
                            name="equipe_2" 
                            value=<?php echo $groupeA[1] ?> />

                          <input type="number" name="score_1" min=0 max=10  required/> 
                          VS 
                          <input type="number" name="score_2" min=0 max=10 required/> 
                          <button type="submit" name="jouer" value="1"> Jouer </button>
                    </form>
                   </td>
       </tr>

       <tr>
                   <td class="match_numero">2.</td>
                   <td class="Vs"><?php  echo  $groupeA[2] ?> VS  <?php  echo  $groupeA[3] ?></td>
                   <td>
                   <form action="" method="post">
                          <input 
                              type="hidden"
                              name="equipe_1" 
                              value=<?php echo $groupeA[2] ?>/>
                           
                          <input 
                            type="hidden" 
                            name="equipe_2" 
                            value=<?php echo $groupeA[3] ?> />

                          <input type="number" name="score_1" min=0 max=10  required/> 
                          VS 
                          <input type="number" name="score_2" min=0 max=10 required/> 
                          <button type="submit" name="jouer" value="2"> Jouer </button>
                    </form>
                   </td>
       </tr>
     

       <tr>
                   <td class="match_numero">3.</td>
                   <td class="Vs"><?php  echo  $groupeA[0] ?> VS  <?php  echo  $groupeA[2] ?></td>
                   <td>
                   <form action="" method="post">
                          <input 
                              type="hidden"
                              name="equipe_1" 
                              value=<?php echo $groupeA[0] ?>
                          /> 
                          <input 
                            type="hidden" 
                            name="equipe_2" 
                            value=<?php echo $groupeA[2] ?> />

                          <input type="number" name="score_1" min=0 max=10  required/> 
                          VS 
                          <input type="number" name="score_2" min=0 max=10 required/> 
                          <button type="submit" name="jouer" value="3"> Jouer </button>
                    </form>
                   </td>
       </tr>
       <tr>
                   <td class="match_numero">4.</td>
                   <td class="Vs"><?php  echo  $groupeA[1] ?> VS  <?php  echo  $groupeA[3] ?></td>
                   <td>
                   <form action="" method="post">
                          <input 
                              type="hidden"
                              name="equipe_1" 
                              value=<?php echo $groupeA[1] ?>/> 
                          
                          <input 
                            type="hidden" 
                            name="equipe_2" 
                            value=<?php echo $groupeA[3] ?> />

                          <input type="number" name="score_1" min=0 max=10  required/> 
                          VS 
                          <input type="number" name="score_2" min=0 max=10 required/> 
                          <button type="submit" name="jouer" value="4"> Jouer </button>
                    </form>
                   </td>
       </tr>

       <tr>
                   <td class="match_numero">5.</td>
                   <td class="Vs"><?php  echo  $groupeA[0] ?> VS  <?php  echo  $groupeA[3] ?></td>
                   <td>
                   <form action="" method="post">
                          <input 
                              type="hidden"
                              name="equipe_1" 
                              value=<?php echo $groupeA[0] ?>/>
                           
                          <input 
                            type="hidden" 
                            name="equipe_2" 
                            value=<?php echo $groupeA[3] ?> />

                          <input type="number" name="score_1" min=0 max=10  required/> 
                          VS 
                          <input type="number" name="score_2" min=0 max=10 required/> 
                          <button type="submit" name="jouer" value="5"> Jouer </button>
                    </form>
                   </td>
       </tr>

       <tr>
                   <td class="match_numero">6.</td>
                   <td class="Vs"><?php  echo  $groupeA[1] ?> VS  <?php  echo  $groupeA[2] ?></td>
                   <td>
                   <form action="" method="post">
                          <input 
                              type="hidden"
                              name="equipe_1" 
                              value=<?php echo $groupeA[1] ?>/>
                           
                          <input 
                            type="hidden" 
                            name="equipe_2" 
                            value=<?php echo $groupeA[2] ?> />

                          <input type="number" name="score_1" min=0 max=10  required/> 
                          VS 
                          <input type="number" name="score_2" min=0 max=10 required/> 
                          <button type="submit" name="jouer" value="6 "> Jouer </button>
                    </form>
                   </td>
       </tr>

  </table>

</div>
        
        
        
        
        
        
        
         <div id="Table3">

  <table align=center>
    <tr>
           <th>Groupe B</th>
           <th>Affiche</th>
           <th>Score</th>
    </tr>

    <tr>
                   <td class="numMatch">7.</td>
                   <td class="Vs"><?php  echo  $groupeB[0] ?> VS  <?php  echo  $groupeB[1] ?></td>
                   <td>
                   <form action="" method="post">
                          <input 
                              type="hidden"
                              name="equipe_1" 
                              value=<?php echo $groupeB[0] ?>/>
                          
                          <input 
                            type="hidden" 
                            name="equipe_2" 
                            value=<?php echo $groupeB[1] ?> />

                          <input type="number" name="score_1" min=0 max=10  required/> 
                          VS 
                          <input type="number" name="score_2" min=0 max=10 required/> 
                          <button type="submit" name="jouer" value="1"> Jouer </button>
                    </form>
                   </td>
       </tr>

       <tr>
                   <td class="match_numero">8.</td>
                   <td class="Vs"><?php  echo  $groupeB[2] ?> VS  <?php  echo  $groupeB[3] ?></td>
                   <td>
                   <form action="" method="post">
                          <input 
                              type="hidden"
                              name="equipe_1" 
                              value=<?php echo $groupeB[2] ?>/>
                           
                          <input 
                            type="hidden" 
                            name="equipe_2" 
                            value=<?php echo $groupeB[3] ?> />

                          <input type="number" name="score_1" min=0 max=10  required/> 
                          VS 
                          <input type="number" name="score_2" min=0 max=10 required/> 
                          <button type="submit" name="jouer" value="2"> Jouer </button>
                    </form>
                   </td>
       </tr>
     

       <tr>
                   <td class="match_numero">9.</td>
                   <td class="Vs"><?php  echo  $groupeB[0] ?> VS  <?php  echo  $groupeB[2] ?></td>
                   <td>
                   <form action="" method="post">
                          <input 
                              type="hidden"
                              name="equipe_1" 
                              value=<?php echo $groupeB[0] ?>
                          /> 
                          <input 
                            type="hidden" 
                            name="equipe_2" 
                            value=<?php echo $groupeB[2] ?> />

                          <input type="number" name="score_1" min=0 max=10  required/> 
                          VS 
                          <input type="number" name="score_2" min=0 max=10 required/> 
                          <button type="submit" name="jouer" value="3"> Jouer </button>
                    </form>
                   </td>
       </tr>
       <tr>
                   <td class="match_numero">10.</td>
                   <td class="Vs"><?php  echo  $groupeB[1] ?> VS  <?php  echo  $groupeB[3] ?></td>
                   <td>
                   <form action="" method="post">
                          <input 
                              type="hidden"
                              name="equipe_1" 
                              value=<?php echo $groupeB[1] ?>/> 
                          
                          <input 
                            type="hidden" 
                            name="equipe_2" 
                            value=<?php echo $groupeB[3] ?> />

                          <input type="number" name="score_1" min=0 max=10  required/> 
                          VS 
                          <input type="number" name="score_2" min=0 max=10 required/> 
                          <button type="submit" name="jouer" value="4"> Jouer </button>
                    </form>
                   </td>
       </tr>

       <tr>
                   <td class="match_numero">11.</td>
                   <td class="Vs"><?php  echo  $groupeB[0] ?> VS  <?php  echo  $groupeB[3] ?></td>
                   <td>
                   <form action="" method="post">
                          <input 
                              type="hidden"
                              name="equipe_1" 
                              value=<?php echo $groupeB[0] ?>/>
                           
                          <input 
                            type="hidden" 
                            name="equipe_2" 
                            value=<?php echo $groupeB[3] ?> />

                          <input type="number" name="score_1" min=0 max=10  required/> 
                          VS 
                          <input type="number" name="score_2" min=0 max=10 required/> 
                          <button type="submit" name="jouer" value="5"> Jouer </button>
                    </form>
                   </td>
       </tr>

       <tr>
                   <td class="match_numero">12.</td>
                   <td class="Vs"><?php  echo  $groupeB[1] ?> VS  <?php  echo  $groupeB[2] ?></td>
                   <td>
                   <form action="" method="post">
                          <input 
                              type="hidden"
                              name="equipe_1" 
                              value=<?php echo $groupeB[1] ?>/>
                           
                          <input 
                            type="hidden" 
                            name="equipe_2" 
                            value=<?php echo $groupeB[2] ?> />

                          <input type="number" name="score_1" min=0 max=10  required/> 
                          VS 
                          <input type="number" name="score_2" min=0 max=10 required/> 
                          <button type="submit" name="jouer" value="6 "> Jouer </button>
                    </form>
                   </td>
       </tr>

  </table>

</div>
        
    </body>
   
</html>