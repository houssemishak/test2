<?php
$host = "localhost";
$db = "31b";
$user = "root";
$password = "";

$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

try{
    $oPDO = new PDO($dsn, $user, $password);

    if ($oPDO){
        echo "Connected to the $db database successfully!";
    }
}catch(PDOExeption $e){
    echo $e->getMessage();
 }

 require_once "class/Livre.php";

 $livre = new Livre;
 echo "</br>";
 echo "</br>";
 var_dump($livre);
 $livres = $livre->getLivres();

 echo "</br>";
 echo "</br>";
 print_r($livres);
 echo "</br>";
 echo "</br>";
 var_dump($livres);
 var_dump($livres[1]);
 echo "</br>";
 echo "</br>";
 $UnLivre=$livre->getLivreById(2);
 var_dump($UnLivre);
 echo "</br>";
 echo "</br>";
 $livre_to_insert=[
    'titre'=>"titre de mon livre", 
    'auteur'=>"Julian",
    'annee'=>2023,
    
 ];

 $livre_added = $livre->AjouterLivre($livre_to_insert);
 echo "</br>";
 echo "</br>";
 var_dump($livre->getLivres());

 
 $livre1 = new Livre;
 $livre = $livre1->getLivreById(1); // Obtenir le livre avec l'identifiant 1
 
 
     $livre['titre'] = "Tokyo";
     $livre['annee'] = 2012;
     $livre['auteur'] = "Marcelo";
 
     $livre1->UpdateLivreById($livre['id'], $livre);
 
     // Obtenir le livre avec l'identifiant 1 après la mise à jour
     var_dump($livre1->getLivreById(1));


     $livre1->deleteLivreById(1);




 
 
 
 
 
 


 //$data = 
 //echo "<br>";
 //var_dump($livre->UpdateLivreById())










?>