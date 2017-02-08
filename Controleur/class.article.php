<?php

class ARTICLE{

    private $db;

    public function __construct($dbh){
        $this->db = $dbh;
    }

    //Pour appeler les articles récents
    public function articlerecent($dbh){
        //Trie les articles par date
        $article_recent = "SELECT titre_article, date_a FROM articles ORDER BY date_a DESC";
        foreach ($dbh->query($article_recent) as $row){?>
            <div><a href="#fenetremodale" id="<?php print $row['titre_article']; ?>"><?php print $row['titre_article']; ?></a> - <?php
            print $row['date_a'];?></div><br/>
        <?php }
    }

    //Pour appeler un article random
    public function randomarticle($dbh){
        $article_random = "SELECT titre_article, date_a FROM articles ORDER BY rand() LIMIT 4";
        foreach ($dbh->query($article_random) as $row){?>
            <div><a href="#fenetremodale" id="<?php print $row['titre_article']; ?>"><?php print $row['titre_article']; ?></a> - <?php
            print $row['date_a'];?></div><br/>
        <?php }
    }

    //Pour afficher un article en entier
    public function afficher_article($dbh){
        $article_affichage = "SELECT * FROM articles WHERE titre_article=:titre_article";

        $stmt->bindparam(':auteur', $auteur);
        $stmt->bindparam(':titre_article', $titre);
        $stmt->bindparam(':categorie', $categorie);
        $stmt->bindparam(':contenu_article', $article);
        $stmt->bindparam(':date_a', $date_a);
    }
}

 ?>
