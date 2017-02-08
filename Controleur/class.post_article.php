<?php

require_once 'connexionDB.php';

class POST{

    private $db;

    public function __construct($dbh){
            $this->db = $dbh;
    }

//Fonction de redirection
    public function redirect($url){
        header("Location: $url");
    }

//Fonction pour enregistrer l'article dans la base de donnée
    public function article($auteur, $date_a, $categorie, $titre, $article){
        try {
            $stmt = $this->db->prepare("INSERT INTO articles (auteur, date_a, categorie, titre_article, contenu_article)
                                        VALUES (:auteur, :date_a, :categorie, :titre_article, :contenu_article)");

              //bindparam va relier les valeurs aux fonctions des valeurs
            $stmt->bindparam(':auteur', $auteur);
            $stmt->bindparam(':titre_article', $titre);
            $stmt->bindparam(':categorie', $categorie);
            $stmt->bindparam(':contenu_article', $article);
            $stmt->bindparam(':date_a', $date_a);
            $stmt->execute();

            return $stmt;
        }

        catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

?>
