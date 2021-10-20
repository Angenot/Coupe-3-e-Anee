     //Connexion dans la base
<?php


try
{
$bdd = new PDO('mysql:host=localhost;dbname=league', 'root', '');
$bdd -> setAttribute(PDO::ATTR_ERRMODE ,PDO::ERRMODE_EXCEPTION);
    // echo ('bOOOOM');
}
catch (Exception $e)
{
die('Erreur : ' .$e->getMessage() );
}
?>

 <!-- ---Requete -- -->
<?php
if(isset($_POST['jouer']) and isset($_POST['score_1'] ) AND isset($_POST['score_2'] )){
    echo "score pret";  
    $num=$_POST['jouer'];
    $etatResult ='';
   
    
    // $mj=null, $mn=null, $mp=null,$bp,$bc, $pt,$diff;
    
    echo '<pre>' ;
    print_r($_POST);
    echo '</pre>' ;
    // score par equipe

   if($_POST['score_1']  > $_POST['score_2'] ){
        
        $etatResult = $_POST['equipe_1'];
   }
    

    //elsif ($_POST['score_2'] > $_POST['score_1'] ){
        
      //  $etatResult = $_POST['equipe_2'];

   // }
    else{
        $etatResult =null;
    }
    


    //Insertion Match
 
    $codesql="INSERT INTO `matchs` (`nom_equipe_1`, `nom_equipe_2`, `score_1`, `score_2`, `numero_match` , `matchjouer`)
        VALUES( :nom1, :nom2, :score1 , :score2 , :num ,:matchjouer )";

    $req = $bdd->prepare($codesql);
    $req->execute(
        array(
            "nom1" => $_POST['equipe_1'],
            "nom2" => $_POST['equipe_2'],
            "score1" => $_POST['score_1'],
            "score2" => $_POST['score_2'],
            "num" => $num,
            "matchjouer" =>$etatResult
        )
    );
    $req->closeCursor();


    

    

    

    
    
    // Pour verifier si l'insertion est produite
    $trouve = $req->rowCount();

    if ( $trouve === 0 ) {
         //Quand il y a pas d'insertion

        $sqlClassementA = "INSERT INTO `classementgroupea` (`equipe`,`MJ`,`MG`,`MN`,`MP`,`BP`,`BC`,`Diff`,`Point`)
            Values ( :eq, :mj, :mg, :mn, :mp, :bp, :bc, :diff, :point ) ";
        
        
        $insertEq1GpeA = $bdd->prepare($sqlClassementA);

        $insertEq1GpeA-> execute ( array(
            'eq' => $_POST['equipe_1'],
            "mj" => 1,
            "mg" => 0, //a definir
            "mn" => 0, //a definir
            "mp" => 0, //a definir
            "bp" => $_POST['score_1'],
            "bc" => $_POST['score_2'],
            "diff" => ( $_POST['score_1'] - $_POST['score_2'] ),
            "point" => 0 // A DEFINIR ABSOLUMENT
        ));
        $insertEq1GpeA->closeCursor();

        // ----------------------------

        $insertEq2GpeA = $bdd->prepare($sqlClassementA);        
        $insertEq2GpeA-> execute ( array(
            'eq' => $_POST['equipe_2'],
            "mj" => 1,
            "mg" => 0, //a definir
            "mn" => 0, //a definir
            "mp" => 0, //a definir
            "bp" => $_POST['score_2'],
            "bc" => $_POST['score_1'],
            "diff" => ( $_POST['score_2'] - $_POST['score_1'] ),
            "point" => 0 // A DEFINIR ABSOLUMENT
        ));
        $insertEq2GpeA->closeCursor();

    }
    
    else {

        $sqlClassementB = "INSERT INTO `classementgroupea` (`equipe`,`MJ`,`MG`,`MN`,`MP`,`BP`,`BC`,`Diff`,`Point`)
            Values ( :eq, :mj, :mg, :mn, :mp, :bp, :bc, :diff, :point ) ";
        
        $insertEq1GpeA = $bdd->prepare($sqlClassementB);

        $insertEq1GpeA-> execute ( array(
            'eq' => $_POST['equipe_1'],
            "mj" => 1,
            "mg" => 0, //a definir
            "mn" => 0, //a definir
            "mp" => 0, //a definir
            "bp" => $_POST['score_1'],
            "bc" => $_POST['score_2'],
            "diff" => ( $_POST['score_1'] - $_POST['score_2'] ),
            "point" => 0 
        ));
        $insertEq1GpeA->closeCursor();

        // ----------------------------

        $insertEq2GpeA = $bdd->prepare($sqlClassementB);        
        $insertEq2GpeA-> execute ( array(
            'eq' => $_POST['equipe_2'],
            "mj" => 1,
            "mg" => 0, //a definir
            "mn" => 0, //a definir
            "mp" => 0, //a definir
            "bp" => $_POST['score_2'],
            "bc" => $_POST['score_1'],
            "diff" => ( $_POST['score_2'] - $_POST['score_1'] ),
            "point" => 0 
        ));
        $insertEq2GpeA->closeCursor();
    
    
    
    
    
        }
    
    }






                // Instruction pour les classements dans la table match
            // On va verifier les variables dans la table Classement

// ---------------   insertion dans la table classement du groupe A
             
 $bdd-> query("select * from `classement_groupea`");


    
    // Verification dans le groupe classement  a si le match est joue
    
        
       //   match joue        MJ
   
    for($i=0; $i<=6; $i++) {
       
       if(isset($_POST['MJ']) ){
           
      
     
        $mj= $bdn -> query("Select * from `classement_groupea` where equipA order by MJ");
            } 
        
        else(!empty($matchjouer['MJ']) ) {
     
             $matchjouer = NULL
      } 
    }
 
      
      


      



      //  Match gagner   (MG) 



      



//  ----------------    insertion dans la table classement du groupe B

//$bdd-> query("select * from `classement_groupeb`");
 $ClassementB = $bdd->prepare ("Insert into `classementgroupeb` (`MJ`,`MG`,`MN`,`MP`,`BP`,`BC`,`Diff`,`Point`)
  Values ( :mj, :mg, :mn, :mp, :bp, :bc, :diff, :point ) ");
    $req -> execute ( array(
        "mj" => $_POST['MJ'],
        "mg" => $_POST['MG'],
        "mn" => $_POST['MN'],
        "mp" => $_POST['MP'],
        "bp" => $_POST['BP'],
        "bc" => $_POST['BC'],
        "diff" => $_POST['Diff'],
        "point" => $_POST['Point']
        )
    );

 $bdd => query($ClassementB);


?>



