<?php require_once '../controleur/connexionDB.php';

$liste = "SELECT nom_categorie FROM categories";?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <main>
        <form action="../controleur/creation_article.php" method="post">
        <?php
            echo $form->input('titre');
            echo $form->input('username');
            echo $form->input('categorie2');
        ?>
            <select name="categorie" id="">
                <option value="choix">Choisissez une catégorie ou créez en une</option>
            <?php
                foreach ($dbh->query($liste) as $row){
                echo '<option value="'.$row['nom_categorie'].'">'.$row['nom_categorie'].'</option>';
                }
            ?>
            </select>
        <?php
            echo $form->textarea('article');
            echo $form->submit();
        ?>
        </form>
    </main>
</body>
</html>
