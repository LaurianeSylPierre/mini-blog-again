<?php

require_once 'connexionDB.php';

$post = $_POST;
$titre = $_POST['titre'];
$auteur = $_POST['username'];
$categorie = $_POST['categorie'];
$article = $_POST['article'];
$date_a = date("Y-m-d");

try{
    $stmt = $dbh->prepare("SELECT login FROM membres WHERE login=:login");
    $stmt->execute([':login'=>$auteur]);
    $row=$stmt->fetch(PDO::FETCH_ASSOC);

    if($row['login']==$auteur){
        $stmt2 = $dbh->prepare("SELECT nom_categorie FROM categories WHERE nom_categorie=:nom_categorie");
        $stmt2->execute([':nom_categorie'=>$categorie]);
        $row2=$stmt2->fetch(PDO::FETCH_ASSOC);

        if($row2['nom_categorie']==$categorie){
            if($formulaire->article($auteur, $date_a, $categorie, $titre, $article)){
                $formulaire->redirect('../index.php');
            }
        }

        else if (!empty($_POST['categorie2'])){
            try {
                $categorie = $_POST['categorie2'];

                $stmt = $dbh->prepare("INSERT INTO categories (nom_categorie)
                                            VALUES (:nom_categorie)");

                  //bindparam va relier les valeurs aux fonctions des valeurs
                $stmt->bindparam(':nom_categorie', $categorie);
                $stmt->execute();

                return $stmt;
            }

            catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        else{
            echo "Vous avez besoin d'une catégorie";
        }
    }

    else{
        echo "Veuillez vous inscrire";?>
        <form action="../controleur/nouvel_auteur.php" method="post">
            <?php
            echo $form->input('login');
            echo $form->input('mdp');
            echo $form->input('mail');
            echo $form->submit();
            ?>
        </form>
    <?php
    }
}

catch(PDOException $e){
    echo $e->getMessage();
}


?>
