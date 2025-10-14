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

        $sqlInfo = $pdo->prepare('SELECT * FROM setting WHERE id=?');
        $sqlInfo->execute([1]);
        $info = $sqlInfo->fetch();

        $id_offre = $_GET['id_offre'];
        $sqlOffre = $pdo->prepare('SELECT * FROM offres WHERE id_offre=?');
        $sqlOffre->execute([$id_offre]);
        $row = $sqlOffre->fetch();

        include('partie/navbar.php') 
    ?>
    <div class="page-offre">

        <section class="splide" aria-label="Splide Basic HTML Example">
            <div class="splide__track">
                    <ul class="splide__list">
                        <li class="splide__slide">
                            <img src="img/offres/<?=$row['image']?>" alt="<?=$row['libelle']?>">
                        </li>
                        <?php
                            for( $i=2; $i < 10 ; $i++){ 
                                if(isset($row['img'.$i])){
                        ?>
                        <li class="splide__slide">
                            <img src="img/offres/<?=$row['img'.$i]?>" alt="<?=$row['libelle']?>">
                        </li>
                        <?php } } ?>
                    </ul>
            </div>
        </section>

        <div class="produit">
            <h1><?=$row['libelle']?></h1>
            <h5><?=$row['type']?></h5>
            <p><?=$row['adresse']?></p>
            <h4><?=$row['prix']?></h4>
            <div class="desc">
                <p><?=nl2br($row['description'])?></div>
            <div class="call">
                <a href="tel:0<?=$info['tel2']?>" style="background-color:#007BFF"><img src="icon/phone.png">Appelez</a>
                <a href="https://wa.me/0<?=$info['tel1']?>?text=Bonjour,%20je%20suis%20interesse" style="background-color:#28A745"><img src="icon/whatsapp.png">Whatsapp</a>
                <a href="mailto:<?=$info['email']?>" style="background-color:#FFC107"><img src="icon/mail.png">Evoie un mail</a>
            </div>
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