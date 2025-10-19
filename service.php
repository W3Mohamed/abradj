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
    <title>Service</title>
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
        <img src="img/service.webp" alt="services immobiliere" class="headImg">
        <div class="texte">
            <p>Abraj Iskan</p>
            <h1>Nos services</h1>
        </div>
    </div>
    <!--====================================================
                        serivce
    =======================================================-->
    <div class="page-service">
        <h1>Nos Services</h1>
        <p>Découvrez l'ensemble des prestations haut de gamme qui font la différence dans nos résidences</p>
        
        <div class="services-intro">
            <h2>L'Excellence au Service de Votre Confort</h2>
            <p>Chez ABRAJ ISKAN, nous mettons à votre disposition une gamme complète de services pensés pour votre bien-être et votre sécurité au quotidien.</p>
        </div>

        <div class="services">
            <div class="service">
                <div class="service-badge">Essentiel</div>
                <div class="service-icon">
                    <img src="icon/parking.png" alt="Parking aux sous-sols">
                </div>
                <h4>Parking aux sous-sols</h4>
            </div>
            
            <div class="service">
                <div class="service-badge">Qualité</div>
                <div class="service-icon">
                    <img src="icon/membrane.png" alt="Matériaux contemporains">
                </div>
                <h4>Matériaux contemporains</h4>
            </div>
            
            <div class="service">
                <div class="service-badge">Équipé</div>
                <div class="service-icon">
                    <img src="icon/chef.png" alt="Cuisines équipés et meublée">
                </div>
                <h4>Cuisines équipées et meublées</h4>
            </div>
            
            <div class="service">
                <div class="service-badge">Éco</div>
                <div class="service-icon">
                    <img src="icon/thunderbolt.png" alt="Haute performance énergétique">
                </div>
                <h4>Haute performance énergétique</h4>
            </div>
            
            <div class="service">
                <div class="service-badge">Sport</div>
                <div class="service-icon">
                    <img src="icon/sport.png" alt="Salle de sport">
                </div>
                <h4>Salle de sport</h4>
            </div>
            
            <div class="service">
                <div class="service-badge">Sécurité</div>
                <div class="service-icon">
                    <img src="icon/cctv.png" alt="Gardiennage et télésurveillance">
                </div>
                <h4>Gardiennage et télésurveillance</h4>
            </div>
            
            <div class="service">
                <div class="service-badge">Nature</div>
                <div class="service-icon">
                    <img src="icon/gardening.png" alt="Espaces verts et jardins paysagers">
                </div>
                <h4>Espaces verts et jardins paysagers</h4>
            </div>
            
            <div class="service">
                <div class="service-badge">Proximité</div>
                <div class="service-icon">
                    <img src="icon/online.png" alt="Commerces de proximité">
                </div>
                <h4>Commerces de proximité</h4>
            </div>
            
            <div class="service">
                <div class="service-badge">Confort</div>
                <div class="service-icon">
                    <img src="icon/elevator.png" alt="Ascenseurs modernes">
                </div>
                <h4>Ascenseurs modernes</h4>
            </div>
            
            <div class="service">
                <div class="service-badge">Entretien</div>
                <div class="service-icon">
                    <img src="icon/mop.png" alt="Service de nettoyage">
                </div>
                <h4>Service de nettoyage</h4>
            </div>
            
            <div class="service">
                <div class="service-badge">Isolation</div>
                <div class="service-icon">
                    <img src="icon/sound-waves.png" alt="Isolation thermique et phonique">
                </div>
                <h4>Isolation thermique et phonique</h4>
            </div>
            
            <div class="service">
                <div class="service-badge">Innovation</div>
                <div class="service-icon">
                    <img src="icon/cleaning-service.png" alt="AUTO CLEAN">
                </div>
                <h4>AUTO CLEAN</h4>
            </div>
            
            <div class="service">
                <div class="service-badge">Extérieur</div>
                <div class="service-icon">
                    <img src="icon/terrace.png" alt="TERRASSE ACCESIBLE">
                </div>
                <h4>TERRASSE ACCESSIBLE</h4>
            </div>
            
            <div class="service">
                <div class="service-badge">Prestige</div>
                <div class="service-icon">
                    <img src="icon/reliability.png" alt="Finitions haut de gamme">
                </div>
                <h4>Finitions haut de gamme</h4>
            </div>
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