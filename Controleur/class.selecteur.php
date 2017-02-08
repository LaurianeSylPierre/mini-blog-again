<?php

class SELECTEUR{

    private $db;

    public function __construct($dbh){
        $this->db = $dbh;
    }

    public function selecteur_auteur(){
        $s_auteurs = "SELECT login FROM membres ORDER BY login ASC";
        foreach ($this->db->query($s_auteurs) as $row){?>
            <div><a href="#"><?php print $row['login']; ?></a></div><br/>
        <?php }
    }

    public function selecteur_categorie(){
        $s_categories = "SELECT nom_categorie FROM categories ORDER BY nom_categorie ASC";
        foreach ($this->db->query($s_categories) as $row){?>
            <div><a href="#"><?php print $row['nom_categorie']; ?></a></div><br/>
        <?php }
    }

}

?>
