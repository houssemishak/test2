<?php
class Livre {

    /**
     * 
     * 
     @return array
     */

    public function getLivres(){
       
        global $oPDO;

        $oPDOStatement = $oPDO->query("SELECT id,titre,auteur,annee FROM livre ORDER BY id ASC");

        $livres = $oPDOStatement->fetchAll(PDO::FETCH_ASSOC);
        return $livres;
    }

    public function getLivreById($id){
     global $oPDO;

     $oPDOStatement = $oPDO->prepare(
        'SELECT id,titre,auteur,annee FROM livre WHERE id=:id'
     );

     $oPDOStatement->bindParam(':id',$id,PDO::PARAM_INT);

     $oPDOStatement->execute();
    //recuperation du resultat
     $livre=$oPDOStatement->fetch(PDO::FETCH_ASSOC);
     return $livre;
    }

    public function AjouterLivre($livre)
    {
        global $oPDO;
        //$oPDO = SingletonPDO::getInstance();

        //preparation de la requete
        $oPDOStmt = $oPDO->prepare('INSERT INTO livre SET titre=:titre, auteur=:auteur,annee=:annee;');
        $oPDOStmt->bindParam(':titre', $livre['titre'], PDO::PARAM_STR);
        $oPDOStmt->bindParam(':auteur', $livre['auteur'], PDO::PARAM_STR);
        $oPDOStmt->bindParam(':annee', $livre['annee'], PDO::PARAM_INT);

        //execution de la requete
        $oPDOStmt->execute();

        //tester le nombre de lignes affectés
        if ($oPDOStmt->rowCount() <= 0) {
            return false;
        }
        return $oPDO->lastInsertId();
    }

    public function UpdateLivreById($id,$data){
        global $oPDO;
        
        $oPDOStmt = $oPDO->prepare('UPDATE livre SET titre=:titre, auteur=:auteur,annee=:annee WHERE id=:id ;');
        $oPDOStmt->bindParam(':titre', $data['titre'], PDO::PARAM_STR);
        $oPDOStmt->bindParam(':auteur', $data['auteur'], PDO::PARAM_STR);
        $oPDOStmt->bindParam(':annee', $data['annee'], PDO::PARAM_INT);
        $oPDOStmt->bindParam(':id', $id, PDO::PARAM_INT);

        $oPDOStmt->execute();

        return $oPDOStmt;

    }

    public function deleteLivreById($id){
        $livre = $this->getLivreById($id);
        if($livre){
            global $oPDO;
            $oPDOStmt = $oPDO->prepare('DELETE FROM livre WHERE id=:id ;');
            $oPDOStmt->bindParam(':id', $id, PDO::PARAM_INT);
            $result = $oPDOStmt->execute();

            return "Le livre avec l'id".$livre['id']." a ete supprime<br>";
        }
        else{
            return "livre introuvable";
        }
    }
}



?>