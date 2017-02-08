<?php

require_once 'connexionDB.php';

$post = $_POST;
$titre = $_POST['login'];
$auteur = $_POST['mdp'];
$categorie = $_POST['mail'];

    try {
        $stmt = $dbh->prepare("INSERT INTO membres (login, mdp, mail)
                                    VALUES (:login, :mdp, :mail)");

          //bindparam va relier les valeurs aux fonctions des valeurs
        $stmt->bindparam(':login', $auteur);
        $stmt->bindparam(':mdp', $titre);
        $stmt->bindparam(':mail', $categorie);
        $stmt->execute();

        return $stmt;

        Header('Location : ../index.php');
    }

    catch (PDOException $e) {
        echo $e->getMessage();
    }

?>
