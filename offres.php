<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&family=Funnel+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js" defer></script>
    <link rel="icon" type="image/x-icon" href="img/logo.webp">
    <title>Offre</title>
</head>
<body>
    <?php
        require_once('dashboard/database.php');
    ?>
    <?php include('partie/navbar.php') ?>

    <!-- Header moderne -->
    <div class="header-projet">
        <img src="img/service.webp" alt="services immobiliers Abraj Iskan" class="headImg">
        <div class="texte">
            <p>Abraj Iskan</p>
            <h1>Nos offres</h1>
        </div>
    </div>

    <section class="page-offres">
        <div class="offres-header">
            <h1>Voir nos offres</h1>
            <p>Découvrez notre sélection exclusive d'appartements à Alger, allant du F2 au F5 duplex, situés dans les quartiers les plus prisés de la capitale.</p>
        </div>
        
        <!-- Grid des offres -->
        <div class="offres">
            <?php
                $sqlOffre = $pdo->prepare('SELECT * FROM offres ORDER BY id_offre DESC');
                $sqlOffre->execute();
                $rows = $sqlOffre->fetchAll();
                
                if(count($rows) > 0) {
                    foreach($rows as $row){
                        // Préparation des données avec limites de caractères
                        $titre = $row['libelle'];
                        $description = $row['description'];
                        $prix = $row['prix'];
                        
                        // Limiter le titre à 50 caractères
                        if(strlen($titre) > 50) {
                            $titre = substr($titre, 0, 50) . '...';
                        }
                        
                        // Limiter la description à 120 caractères
                        if(strlen($description) > 120) {
                            $description = substr($description, 0, 120) . '...';
                        }
                        
                        // Limiter le prix à 30 caractères
                        if(strlen($prix) > 30) {
                            $prix = substr($prix, 0, 30) . '...';
                        }
            ?>
            <div class="offre">
                <a href="offre.php?id_offre=<?=$row['id_offre']?>">
                    <div class="offre-image">
                        <img src="img/offres/<?=$row['image']?>" alt="<?=$row['libelle']?>">
                        <div class="offre-badges">
                            <div class="offre-badge">Exclusivité</div>
                            <div class="offre-badge status">Disponible</div>
                        </div>
                    </div>
                    
                    <div class="offre-content">
                        <h2><?=htmlspecialchars($titre)?></h2>
                        <span class="offre-type"><?=$row['type']?></span>
                        
                        <div class="offre-location">
                            <?=$row['adresse']?>
                        </div>
                        
                        <p class="offre-description"><?=htmlspecialchars($description)?></p>
                        
                        <span class="offre-price"><?=htmlspecialchars($prix)?></span>
                        
                        <button class="offre-button">
                            Découvrir cette offre
                        </button>
                    </div>
                </a>
            </div>
            <?php 
                    }
                } else { 
            ?>
            <div class="offres-empty">
                <h3>Aucune offre disponible pour le moment</h3>
                <p>Nos nouvelles offres arrivent bientôt. Revenez nous visiter.</p>
            </div>
            <?php } ?>
        </div>
    </section>

 
    <!--====================================================
                        contact
    =======================================================-->
    <div class="contact" id="contact">
        <div class="contact-container">
            <!-- Partie formulaire -->
            <div class="contact-form-section">
                <h3 class="contact-title">Contactez-nous</h3>
                <p class="contact-subtitle">Un projet en tête ? Discutons de votre future résidence</p>
                
                <form method="POST" class="contact-form">
                    <div class="form-group">
                        <input type="text" name="nom" placeholder="Votre nom complet" class="form-input" required>
                    </div>
                    
                    <div class="form-group">
                        <input type="tel" name="tel" placeholder="Numéro de téléphone" class="form-input" required>
                    </div>
                    
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Adresse email" class="form-input">
                    </div>
                    
                    <div class="form-group">
                        <select name="projet" id="projet" class="form-select">
                            <option value="" disabled selected>Choisissez un projet</option>
                            <?php foreach($rows as $row){ ?>
                            <option value="<?=$row['libelle']?>"><?=$row['libelle']?></option>
                            <?php } ?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <textarea name="message" id="message" placeholder="Votre message..." class="form-textarea"></textarea>
                    </div>
                    
                    <button type="submit" name="envoyer" class="form-submit">
                        Envoyer le message
                    </button>
                </form>
                
                <?php
                    if(isset($_POST['envoyer'])){
                        $nom = $_POST['nom'];
                        $tel = $_POST['tel'];
                        $email = $_POST['email'];
                        $projet = $_POST['projet'];
                        $message = $_POST['message'];

                        $sqlContact = $pdo->prepare('INSERT INTO visite(nom,tel,email,id_projet,message) VALUES(?,?,?,?,?)');
                        $sqlContact->execute([$nom,$tel,$email,$projet,$message]);
                        ?>
                        <script> 
                            swal("Merci pour votre message", "Merci pour votre intérêt. Nous vous répondrons rapidement.", "success"); 
                        </script> 
                        <?php
                    }
                ?>
            </div>
            
            <!-- Partie carte -->
            <div class="contact-map-section">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3207.773088959983!2d2.82944607418515!3d36.487196285283744!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMzbCsDI5JzEzLjkiTiAywrA0OSc1NS4zIkU!5e0!3m2!1sfr!2sdz!4v1731968443015!5m2!1sfr!2sdz"
                    class="contact-map"
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
                
                <div class="map-overlay"></div>
                
                <div class="contact-info">
                    <h4 class="contact-info-title">Abraj Iskan</h4>
                    <div class="contact-info-item">
                        <span>📍</span>
                        <span><?=$info['adresse']?></span>
                    </div>
                    <div class="contact-info-item">
                        <span>📞</span>
                        <span>+213 <?=$info['tel1']?></span>
                    </div>
                    <div class="contact-info-item">
                        <span>✉️</span>
                        <span><?=$info['email']?></span>
                    </div>
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

</body>
</html>