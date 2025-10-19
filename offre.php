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

    <div class="page-offre-detail">
        <!-- Gallery moderne -->
        <div class="offre-detail-gallery">
            <section class="splide" aria-label="Galerie de l'offre">
                <div class="splide__track">
                    <ul class="splide__list">
                        <li class="splide__slide">
                            <img src="img/offres/<?=$row['image']?>" alt="<?=$row['libelle']?>">
                        </li>
                        <?php
                            for($i = 2; $i < 10; $i++){ 
                                if(isset($row['img'.$i]) && !empty($row['img'.$i])){
                        ?>
                        <li class="splide__slide">
                            <img src="img/offres/<?=$row['img'.$i]?>" alt="<?=$row['libelle']?>">
                        </li>
                        <?php } } ?>
                    </ul>
                </div>
            </section>
            <div class="offre-detail-gallery-overlay"></div>
        </div>

        <!-- Contenu principal -->
        <div class="offre-detail-content">
            <!-- En-tête de l'offre -->
            <div class="offre-detail-header">
                <h1 class="offre-detail-title"><?=$row['libelle']?></h1>
                <span class="offre-detail-type"><?=$row['type']?></span>
                <div class="offre-detail-location">
                    <?=$row['adresse']?>
                </div>
                <span class="offre-detail-price"><?=$row['prix']?></span>
            </div>

            <!-- Description -->
            <div class="offre-detail-description">
                <h3>Description</h3>
                <p><?=nl2br($row['description'])?></p>
            </div>

            <!-- Actions de contact -->
            <div class="offre-detail-actions">
                <h3>Intéressé par cette offre ?</h3>
                <div class="detail-contact-buttons">
                    <a href="tel:0<?=$info['tel2']?>" class="detail-contact-button phone">
                        <img src="icon/phone.png" alt="Téléphone">
                        <span>Appelez-nous</span>
                    </a>
                    <a href="https://wa.me/0<?=$info['tel1']?>?text=Bonjour,%20je%20suis%20intéressé%20par%20l'offre%20:%20<?=urlencode($row['libelle'])?>" class="detail-contact-button whatsapp">
                        <img src="icon/whatsapp.png" alt="WhatsApp">
                        <span>WhatsApp</span>
                    </a>
                    <a href="mailto:<?=$info['email']?>?subject=Demande%20d'information%20-%20<?=urlencode($row['libelle'])?>" class="detail-contact-button email">
                        <img src="icon/mail.png" alt="Email">
                        <span>Envoyer un email</span>
                    </a>
                </div>
            </div>

            <!-- Informations supplémentaires -->
            <div class="offre-detail-infos">
                <div class="detail-info-card">
                    <h4>📍 Localisation Premium</h4>
                    <p>Situé dans un quartier privilégié avec accès à toutes les commodités</p>
                </div>
                <div class="detail-info-card">
                    <h4>🏠 Standing Élevé</h4>
                    <p>Matériaux de qualité et finitions haut de gamme</p>
                </div>
                <div class="detail-info-card">
                    <h4>⚡ Livraison Rapide</h4>
                    <p>Projet disponible dans les meilleurs délais</p>
                </div>
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
        document.addEventListener('DOMContentLoaded', function() {
            // Initialisation du slider gallery
            var gallerySplide = new Splide('.offre-detail-gallery .splide', {
                type: 'fade',
                rewind: true,
                pagination: true,
                arrows: true,
                autoplay: true,
                interval: 5000,
                pauseOnHover: true,
                pauseOnFocus: true
            });
            gallerySplide.mount();
        });
    </script>

</body>
</html>