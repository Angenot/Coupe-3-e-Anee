<?php
require('database.php');

if(isset($_POST['jouer']) and isset($_POST['score_1']) and isset($_POST['score_2'])){
    echo "score pret";  
    $game=$_POST['jouer'];
    $etatResult ='';
    $nomEquipe1 = htmlspecialchars($_POST['equipe_1']);
     $nomEquipe2 = htmlspecialchars($_POST['equipe_2']);
     $score_1 = htmlspecialchars($_POST['score_1']);
     $score_2 = htmlspecialchars($_POST['score_2']);
    
     if($_POST['score_1']  > $_POST['score_2'] ){
        
        $etatResult = $_POST['equipe_1'];
   }
    
    else{
        $etatResult =null;
    }
    }
     if(isset($_POST['jouer'])){
    
    $entrermatch = $bdn->prepare('INSERT INTO match_pam(nom_equipe_1,nom_equipe_2,score_1,score_2) VALUES(?,?,?,?)');
    $entrermatch->execute(array($nomEquipe1,$nomEquipe2,$score_1,$score_2));
  
    if($entrermatch){
        echo 'Reussi';
    }
    else{
        echo 'echoue';
    }
         
         
         //Verifier insertion
         $verifier = $entrermatch->rowcount();
         if($verifier===0){
             $insertionclassementA = ('INSERT INTO classement_grpa (MJ,MG,MN,MP,BP,BC,Diff,Point) VALUES( :mj, :mg, :mn, :mp, :bp, :bc, :diff, :point)');
            
             
             
             
             $insertionequipe1A = $bdn->prepare($insertionclassementA);
                 $insertionequipe1A->execute( 
                 array(
                     'equi'=>$_POST['equipe_1'],
                     "mj" => 1,
            "mg" => 0, 
            "mn" => 0, 
            "mp" => 0, 
            "bp" => $_POST['score_1'],
            "bc" => $_POST['score_2'],
            "diff" => ( $_POST['score_1'] - $_POST['score_2'] ),
            "point" => 0 
                 )
             );
             $insertionequipe1A->closeCursor();
             
             
              $insertequipe2A = $bdd->prepare($sqlClassementA);        
        $insertequipe2A-> execute ( array(
            'equi' => $_POST['equipe_2'],
            "mj" => 1,
            "mg" => 0, //a definir
            "mn" => 0, //a definir
            "mp" => 0, //a definir
            "bp" => $_POST['score_2'],
            "bc" => $_POST['score_1'],
            "diff" => ( $_POST['score_2'] - $_POST['score_1'] ),
            "point" => 0 // A DEFINIR ABSOLUMENT
        ));
        $insertequipe2A->closeCursor();
         }
         
         else{
              $insertionclassementB = ('INSERT INTO classement_grpa (MJ,MG,MN,MP,BP,BC,Diff,Point) VALUES(:mj, :mg, :mn, :mp, :bp, :bc, :diff, :point)');
            
             
             
             
             $insertionequipe1A = $bdn->prepare($insertionclassementB);
                 $insertionequipe1A->execute( 
                 array(
                     
                     "mj" => 1,
            "mg" => 0, 
            "mn" => 0, 
            "mp" => 0, 
            "bp" => $_POST['score_1'],
            "bc" => $_POST['score_2'],
            "diff" => ( $_POST['score_1'] - $_POST['score_2'] ),
            "point" => 0 
                 )
             );
             $insertionequipe1A->closeCursor();
             
             
              $insertequipe2A = $bdn->prepare($insertionclassementB);        
        $insertequipe2A-> execute ( array(
           
            "mj" => 1,
            "mg" => 0, //a definir
            "mn" => 0, //a definir
            "mp" => 0, //a definir
            "bp" => $_POST['score_2'],
            "bc" => $_POST['score_1'],
            "diff" => ( $_POST['score_2'] - $_POST['score_1'] ),
            "point" => 0 // A DEFINIR ABSOLUMENT
        ));
        $insertequipe2A->closeCursor();
         }
             
         }

     
        $bdn->query('SELECT * FROM classement_grpa');
         
       for($i=0; $i<=6; $i++) {
           
       if(isset($_POST['MJ']) ){
     
        $mj= $bdn->query("Select * from classement_grpa where classement_grpa order by MJ");
           $augmenter = $bdn->prepare('UPDATE classement_grpa SET (MJ,MG,MN,MP,BP,BC,Diff,Point where MJ=?)');
            } 
           
        
       }




 $ClassementB = $bdn->prepare ("Insert into `classement_grpb` (`MJ`,`MG`,`MN`,`MP`,`BP`,`BC`,`Diff`,`Point`)
  Values ( :mj, :mg, :mn, :mp, :bp, :bc, :diff, :point ) ");
    $ClassementB -> execute ( array(
        "mj" => 1,
        "mg" => 0,
        "mn" => 0,
        "mp" => 0,
        "bp" => 0,
        "bc" => 0,
        "diff" =>0 ,
        "point" => 0
        )
    );

 $ClassementB->closeCursor();



        
         
         
      

?>