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
    <title>Capacité matériel - Abraj Iskan</title>
    <meta name="description" content="Découvrez les matériaux de construction haut de gamme utilisés par Abraj Iskan pour garantir la qualité et la durabilité de nos projets immobiliers. Explorez notre sélection rigoureuse de matériaux pour des résidences exceptionnelles.">
</head>
<body>
    <?php
        require_once('dashboard/database.php');
        include('partie/navbar.php');
        $sqlStates = $pdo->prepare('SELECT * FROM projet');
        $sqlStates->execute();
        $rows = $sqlStates->fetchAll();
    ?>
    <div class="header-projet">
        <img src="img/projet.webp" alt="projet immobiliere" class="headImg">
        <div class="texte">
            <p>Abraj Iskan</p>
            <h1>Capacité matériel</h1>
        </div>
    </div>
    <!--====================================================
                        materiel
    =======================================================-->
    <div class="page-materiaux">
        <div class="materiaux-header">
            <h1 id="capacite">Nos Matériaux de Construction</h1>
            <p>Découvrez la qualité exceptionnelle des matériaux qui font la renommée de nos résidences</p>
        </div>

        <div class="materiaux-intro">
            <h2>L'Excellence dans les Détails</h2>
            <p>Chez ABRAJ ISKAN, nous sélectionnons rigoureusement chaque matériau pour garantir durabilité, esthétique et performance à vos futurs espaces de vie.</p>
        </div>

        <!-- Grid des matériaux -->
        <div class="materiaux-grid">
            <?php
                $sqlCap = $pdo->prepare('SELECT * FROM capacite ORDER BY id_capacite DESC');
                $sqlCap->execute();
                $caps = $sqlCap->fetchAll();
                
                if(count($caps) > 0) {
                    foreach($caps as $cap){
            ?>
            <div class="materiau-card">
                <div class="materiau-image">
                    <img src="img/materiel/<?=$cap['image']?>" alt="<?=$cap['libelle']?>">
                    <div class="materiau-overlay"></div>
                    <div class="materiau-badge">Premium</div>
                </div>
                
                <div class="materiau-content">
                    <h3 class="materiau-title"><?=$cap['libelle']?></h3>
                    <p class="materiau-description">Matériau de haute qualité sélectionné pour sa durabilité et ses performances exceptionnelles.</p>
                    
                    <div class="materiau-specs">
                        <span class="materiau-spec">Haute Résistance</span>
                        <span class="materiau-spec">Éco-responsable</span>
                        <span class="materiau-spec">Certifié</span>
                    </div>
                </div>
            </div>
            <?php 
                    }
                } else { 
            ?>
            <div class="materiaux-empty">
                <h3>Aucun matériel disponible</h3>
                <p>Nos matériaux seront bientôt disponibles à la consultation</p>
            </div>
            <?php } ?>
        </div>
    </div>
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
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>

</body>
</html>