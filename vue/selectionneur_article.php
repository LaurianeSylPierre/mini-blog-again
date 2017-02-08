<?php require_once '../controleur/connexionDB.php' ?>

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
        <div class="articles_recent"><?php echo $article->articlerecent($dbh); ?></div>
        <aside class="selecteur">
            <div>
                <?php echo $selecteur->selecteur_categorie($dbh);?>
            </div>
            <div>
                <?php echo $selecteur->selecteur_auteur($dbh);?>
            </div>
        </aside>
    </main>
</body>
</html>
