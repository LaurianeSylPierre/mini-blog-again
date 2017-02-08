<?php

session_start();

$user = 'laurianep';
$pass = 'BUbJg8XAVj';

    try {
        $dbh = new PDO('mysql:host=localhost;dbname=laurianep', $user, $pass);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }

    catch(PDOException $e) {
        echo $e->getMessage();
    }

include_once 'class.article.php';
$article = new ARTICLE($dbh);

require_once 'class.form_article.php';
$form = new FORM($_POST);

require_once 'class.post_article.php';
$formulaire = new POST($dbh);

require_once 'class.selecteur.php';
$selecteur = new SELECTEUR($dbh);
?>
