<?php require_once 'controleur/connexionDB.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="css/styles.css" rel="stylesheet"/>
    <script src="js/jquery-3.1.1.min.js"></script>
    <title>Document</title>
</head>
<body>
    <!-- La fameuse fenêtre modale où seront affichés les articles -->
<div id="fenetremodale">
    <div class="container modalearticle">
        <a href="#rien">Retour</a>
    </div>
</div>
    <header>
        <div class="container">
            <nav>
                <ul>
                    <li><a href="">Logo</a></li>
                    <li><a href="">Home</a></li>
                    <li><a href="">Catégories</a></li>
                    <li><a href="">Auteurs</a></li>
                    <li><a href="">A propos</a></li>
                </ul>
            </nav>
            <h1>Infauxmation : le site d'info qui serarien</h1>
        </div>
    </header>
    <main>
        <div class="container">
            <div id="cadre" class="row">
                <div class="col-sm-8 articles_recent"><?php echo $article->articlerecent($dbh); ?></div>
                <aside class="col-sm-4 articles_random"><?php echo $article->randomarticle($dbh); ?></aside>
            </div>
        </div>
    </main>
    <footer></footer>

</body>
    <script>
        console.log("pouet");
        $(document).ready(function() {
            $(document).on("click", ".folder_name", function(e){
                e.preventDefault();
                var $a = $(this);
                var adresse = $a.attr("href");
                var arr = adresse.split('?')[1];
                $.ajax({
                    type : "GET",
                    data: arr,
                    url: "php/fonction.php",
                    success : function(data){
                        $(".cadre").html(data);
                    }
                });
            });
        });
    </script>
</html>
