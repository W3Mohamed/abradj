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
        <!-- Gallery immersive -->
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
            
            <!-- Badge urgence -->
            <div class="urgence-badge">Offre Exclusive</div>
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
                <h3>Description du Bien</h3>
                <p><?=nl2br($row['description'])?></p>
            </div>

            <!-- Section CTA percutante -->
            <div class="offre-detail-cta">
                <h3>🚀 Ne laissez pas cette opportunité vous échapper !</h3>
                <p>Ce bien exceptionnel suscite un vif intérêt. Contactez-nous dès maintenant pour une visite privée et sécurisez votre futur chez vous.</p>
                
                <div class="detail-contact-buttons">
                    <a href="tel:0<?=$info['tel2']?>" class="detail-contact-button phone">
                        <img src="icon/phone.png" alt="Téléphone" class="button-icon">
                        <span>📞 Appel Immédiat</span>
                    </a>
                    <a href="https://wa.me/0<?=$info['tel1']?>?text=🚀 Bonjour, je suis TRÈS intéressé par l'offre : <?=urlencode($row['libelle'])?> - <?=urlencode($row['prix'])?>" class="detail-contact-button whatsapp">
                        <img src="icon/whatsapp.png" alt="WhatsApp" class="button-icon">
                        <span>💬 WhatsApp Express</span>
                    </a>
                    <a href="mailto:<?=$info['email']?>?subject=🚀 URGENT - Demande pour : <?=urlencode($row['libelle'])?>&body=Bonjour, je souhaite réserver une visite pour cette offre au plus vite." class="detail-contact-button email">
                        <img src="icon/mail.png" alt="Email" class="button-icon">
                        <span>📧 Email Prioritaire</span>
                    </a>
                </div>
            </div>

            <!-- Informations supplémentaires -->
            <div class="offre-detail-infos">
                <div class="detail-info-card">
                    <h4>🏆 Prestige Garanti</h4>
                    <p>Residence de standing avec des finitions haut de gamme et des matériaux sélectionnés pour leur excellence.</p>
                </div>
                <div class="detail-info-card">
                    <h4>📍 Emplacement d'Exception</h4>
                    <p>Situé dans un quartier privilégié, à proximité de toutes les commodités et moyens de transport.</p>
                </div>
                <div class="detail-info-card">
                    <h4>⚡ Investissement Rentable</h4>
                    <p>Opportunité unique avec un potentiel de valorisation exceptionnel dans un marché en croissance.</p>
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
            var gallerySplide = new Splide('.offre-detail-gallery .splide', {
                type: 'fade',
                rewind: true,
                pagination: true,
                arrows: true,
                autoplay: true,
                interval: 4000,
                pauseOnHover: true,
                pauseOnFocus: true,
                speed: 1000,
                drag: true
            });
            gallerySplide.mount();
        });
    </script>

</body>
</html>