<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&family=Funnel+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet">
    <script src="js/script.js" defer></script>
    <link rel="icon" type="image/x-icon" href="img/logo.webp">
    <title>Offre</title>
</head>
<body>
    <?php
        require_once('dashboard/database.php');
    ?>
    <?php include('partie/navbar.php') ?>

    <div class="header-projet">
        <img src="img/service.webp" alt="services immobiliere" class="headImg">
        <div class="texte">
            <p>Abraj Iskan</p>
            <h1>Nos offres</h1>
        </div>
    </div>
    <div class="page-offres">
        <h1>Voir nos offres</h1>
        <p>Votre futur appartement vous attend !Découvrez notre large sélection d'appartements à Alger allant du F2 au F5 duplex situés dans des quartiers dynamiques et paisibles. Que vous recherchiez un pied-à-terre ou une résidence principale, nous avons le bien qui correspond à vos besoins et à votre budget </p>
        <div class="offres">
            <?php
                $sqlOffre = $pdo->prepare('SELECT * FROM offres ORDER BY id_offre DESC');
                $sqlOffre->execute();
                $rows = $sqlOffre->fetchAll();
                foreach($rows as $row){
            ?>
            <div class="offre">
                <a href="offre.php?id_offre=<?=$row['id_offre']?>">
                    <img src="img/offres/<?=$row['image']?>" alt="">
                    <h2><?=$row['libelle']?></h2>
                    <h5><?=$row['type']?></h5>
                    <p><?=$row['adresse']?></p>
                    <h4><?=$row['prix']?></h4>
                    <button>Je veux en savoir plus</button>
                </a>
            </div>
            <?php } ?>
        </div>
    </div>
 
    <!--====================================================
                        contact
    =======================================================-->
    <div class="contact" id="contact">
        <div class="info">
            <h3>Contactez nous</h3>
            <form method="POST">
                <input type="text" name="nom" placeholder="Nom" required>
                <input type="tel" name="tel" placeholder="N° Téléphone" required>
                <input type="email" name="email" placeholder="Email">
                <select name="projet" id="projet">
                    <option value="3">residance 1</option>
                    <option value="3">residance 2</option>
                    <option value="3">residance 3</option>
                </select>
                <textarea name="message" id="message" placeholder="Message"></textarea>
                <input type="submit" name="envoyer" value="Envoyer">
            </form>
        </div>
        <div class="info">
            <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3207.773088959983!2d2.82944607418515!3d36.487196285283744!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMzbCsDI5JzEzLjkiTiAywrA0OSc1NS4zIkU!5e0!3m2!1sfr!2sdz!4v1731968443015!5m2!1sfr!2sdz"
                width="100%" 
                height="100%" 
                style="border:0;"
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
    <!--=========================================================
                        footer
    ============================================================-->
    <?php
        include('partie/footer.php');
    ?>

    <script src="js/jQuery1.11.1.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/setup.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <script>
        var splide = new Splide( '.splide', {
            type   : 'loop',
            perPage: 3,
            perMove: 1,
            gap: '10px',
            breakpoints: {
                500: {
                    perPage: 1, // 1 slide visible pour les écrans < 600px
                    gap: '10px', // Espacement réduit
                },
                900: {
                    perPage: 2, // 2 slides visibles pour les écrans entre 600px et 1000px
                    gap: '15px', // Espacement ajusté
                }
            }
        } );

        splide.mount();
    </script>

</body>
</html>