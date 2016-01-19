<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>My Animes</title>
        <?php css('style'); ?>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.5.9/slick.css"/>
    </head>
    <body class="container">
        <div class="row">
            <header>
                <h1>My Animes</h1>
                <p>Créer vos listes d'animes et suivez celles des autres</p>
                <nav>
                    <a href='<?php echo URI . "index/create"; ?>' class="btn btn-success">Ajouter un anime</a>
                </nav>
            </header>
        </div>
        <hr>
        <div class="row">
            <main class="content">
                <?php echo $content; ?>
            </main>
        </div>
        <hr>
        <div class="row">
            <footer>
                <p>copyright myanimes.fr - 2015 - tous droits réservés</p>
            </footer>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.5.9/slick.min.js"></script>
        <script>
        $('.slider').slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 3,
            autoplay:true
        });
        </script>
    </body>
</html>
