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
    <title>A propos</title>
</head>
<body>
    <?php
        require_once('dashboard/database.php');
    ?>
    <?php 
        include('partie/navbar.php');
        $sqlStates = $pdo->prepare('SELECT * FROM projet');
        $sqlStates->execute();
        $rows = $sqlStates->fetchAll();
    ?>
    <div class="header-projet">
        <img src="img/projet.webp" alt="projet immobiliere" class="headImg">
        <div class="texte">
            <p>Abraj Iskan</p>
            <h1>A propos</h1>
        </div>
    </div>
    <!--====================================================
                        About
    =======================================================-->
    <div class="page-about">
        <div class="about-container">
            <!-- Section Hero -->
            <section class="about-hero">
                <div class="about-content">
                    <span class="about-badge">ABRAJ ISKAN PROMOTION IMMOBILIER</span>
                    <h1 class="about-title">L'Adresse de Luxe</h1>
                    <p class="about-subtitle">ABRAJ ISKAN Promotion est une entreprise immobilière spécialisée dans la construction de résidences haut standing en Algérie.</p>
                    <p class="about-text">Nous sommes reconnue pour notre engagement envers l'excellence, la qualité et le confort de nos résidents.</p>
                    <p class="about-text">Notre équipe dévouée de professionnels chevronnés travaille sans relâche pour concevoir des résidences qui reflètent notre passion pour l'innovation, la durabilité et le bien-être.</p>
                </div>
                <div class="about-visual">
                    <img src="img/vision.webp" alt="ABRAJ ISKAN Promotion Immobilière" class="about-image">
                </div>
            </section>

            <!-- Section Mission -->
            <section class="about-mission">
                <h2 class="mission-title">Notre Mission</h2>
                <div class="mission-grid">
                    <div class="mission-card">
                        <span class="mission-icon">🏛️</span>
                        <h3>Innovation Architecturale</h3>
                        <p>Concevoir des résidences exceptionnelles qui incarnent l'élégance, la fonctionnalité et l'innovation architecturale. Chaque projet ABRAJ ISKAN est bien pensé en matière de design.</p>
                    </div>
                    <div class="mission-card">
                        <span class="mission-icon">⭐</span>
                        <h3>Qualité Inégalée</h3>
                        <p>Offrir une qualité inégalée dans tous nos projets, de la sélection des matériaux à la finition impeccable. Votre confort et satisfaction sont notre priorité absolue.</p>
                    </div>
                    <div class="mission-card">
                        <span class="mission-icon">🌱</span>
                        <h3>Durabilité</h3>
                        <p>Dans un souci de respect de l'environnement, nous misons sur la durabilité des matériaux utilisés dans nos conceptions, contribuant ainsi à un avenir plus vert.</p>
                    </div>
                    <div class="mission-card">
                        <span class="mission-icon">💫</span>
                        <h3>Satisfaction Client</h3>
                        <p>Votre satisfaction est notre réussite. Nous nous efforçons de dépasser vos attentes à chaque étape, de la conception à la remise des clés.</p>
                    </div>
                </div>
            </section>

            <!-- Section Services -->
            <section class="about-services">
                <div class="services-visual">
                    <img src="img/propos.webp" alt="Services ABRAJ ISKAN" class="services-image">
                </div>
                <div class="services-content">
                    <h2 class="services-title">Nos Prestations</h2>
                    
                    <div class="services-faq">
                        <div class="faq-item">
                            <h3>La Gestion des Copropriétés</h3>
                            <p>Nous proposons une gamme de produits très large pour répondre aux divers besoins de nos clients. Les typologies de nos appartements commencent à partir de l'intimiste F2 jusqu'au vaste F7. Ces biens immobiliers se distinguent en Simplex, Duplex, et Triplex avec des surfaces variant entre 55m² et 500m².</p>
                        </div>
                        
                        <div class="faq-item">
                            <h3>Appartements Semi-Finis ?</h3>
                            <p>Non, nous proposons uniquement des appartements finis, minutieusement réalisés avec des matériaux haut de gamme importés d'Italie, équipés avec de l'électroménager de qualité et finalisés avec une grande minutie.</p>
                        </div>
                        
                        <div class="faq-item">
                            <h3>Les Commodités Proposées</h3>
                            <p>Nous mettons à disposition de nos résidents une gamme variée de commodités haut de gamme : ascenseurs, parking, espaces verts, aires de jeux, piscines collectives, salles de sport, spas, hammams, garderies, crèches, et même une salle de cinéma !</p>
                        </div>
                        
                        <div class="faq-item">
                            <h3>Gestion de Copropriété</h3>
                            <p>Nous assurons la gestion complète incluant : maintenance des espaces communs, surveillance 24h/24, dispositifs de sécurité, service après-vente réactif, gestion des colis et entretien des jardins.</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Section Innovation -->
            <section class="about-innovation">
                <h2 class="innovation-title">Innovation et Durabilité</h2>
                <p class="innovation-text">Nous sommes à la pointe de l'innovation dans le domaine de la promotion immobilière. En intégrant des technologies modernes et des pratiques durables, nous créons des espaces qui répondent aux besoins actuels tout en étant respectueux de l'environnement.</p>
            </section>
        </div>
    </div>
    <!--====================================================
                        contect
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