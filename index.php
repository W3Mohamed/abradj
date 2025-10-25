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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="js/script.js" defer></script>
    <link rel="icon" type="image/x-icon" href="img/logo.webp">
    <title>Abraj Iskan</title>
    <meta name="description" content="Abraj Iskan - Promoteur Immobilier de Confiance. Découvrez nos projets immobiliers haut de gamme alliant confort, modernité et qualité de vie exceptionnelle. Construisons ensemble votre avenir dans des résidences d'exception.">
</head>
<body>
    <?php
        require_once('dashboard/database.php');
    ?>
    <?php include('partie/navbar.php') ?>
    <?php
        $sqlStates = $pdo->prepare('SELECT * FROM projet');
        $sqlStates->execute();
        $rows = $sqlStates->fetchAll();
    ?>
    <!--=====================================================
                        header
    =======================================================-->
    <div class="hero-section">
        <div class="hero-background">
            <div class="hero-gradient"></div>
            <div class="hero-pattern"></div>
        </div>
        
        <div class="hero-container">
            <div class="hero-content">
                <div class="hero-badge" data-aos="fade-down">
                    <span class="badge-icon">⭐</span>
                    <span>Promoteur Immobilier de Confiance</span>
                </div>
                
                <h1 class="hero-title" data-aos="fade-up" data-aos-delay="100">
                    Abraj <span class="highlight">Iskan</span>
                </h1>
                
                <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="200">
                    Construisons ensemble votre avenir dans des résidences d'exception
                </p>
                
                <div class="hero-description" data-aos="fade-up" data-aos-delay="300">
                    <p>Découvrez nos projets immobiliers haut de gamme qui allient confort, modernité et qualité de vie exceptionnelle</p>
                </div>
                
                <div class="hero-cta" data-aos="fade-up" data-aos-delay="400">
                    <a href="#projet" class="btn-primary">
                        <span class="btn-text">Découvrir nos projets</span>
                        <span class="btn-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </span>
                    </a>
                    
                    <a href="#contact" class="btn-secondary">
                        <span class="btn-text">Nous contacter</span>
                    </a>
                </div>
                
                <div class="hero-stats" data-aos="fade-up" data-aos-delay="500">
                    <div class="stat-item">
                        <div class="stat-number">15+</div>
                        <div class="stat-label">Années d'expérience</div>
                    </div>
                    <div class="stat-divider"></div>
                    <div class="stat-item">
                        <div class="stat-number">50+</div>
                        <div class="stat-label">Projets réalisés</div>
                    </div>
                    <div class="stat-divider"></div>
                    <div class="stat-item">
                        <div class="stat-number">1000+</div>
                        <div class="stat-label">Clients satisfaits</div>
                    </div>
                </div>
            </div>
            
            <div class="hero-visual" data-aos="fade-left" data-aos-delay="200">
                <div class="hero-image-container">
                    <div class="image-wrapper">
                        <img src="img/hero.jpg" alt="Abraj Iskan - Promotion Immobilière" class="hero-main-image">
                        <div class="image-overlay"></div>
                    </div>
                    
                    <div class="floating-card card-1">
                        <div class="card-icon">🏠</div>
                        <div class="card-content">
                            <div class="card-title">Résidences Modernes</div>
                            <div class="card-subtitle">Designs contemporains</div>
                        </div>
                    </div>
                    
                    <div class="floating-card card-2">
                        <div class="card-icon">✓</div>
                        <div class="card-content">
                            <div class="card-title">Qualité Premium</div>
                            <div class="card-subtitle">Matériaux haut de gamme</div>
                        </div>
                    </div>
                    
                    <div class="floating-card card-3">
                        <div class="card-icon">📍</div>
                        <div class="card-content">
                            <div class="card-title">Emplacements Stratégiques</div>
                            <div class="card-subtitle">Quartiers prisés</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="hero-scroll-indicator" data-aos="fade-up" data-aos-delay="600">
            <div class="scroll-text">Scroll</div>
            <div class="scroll-line"></div>
        </div>
    </div>
    <!--====================================================
                        propos
    =======================================================-->
    <section class="propos">
        <div class="champ champ-texte">
            <h1>Qui sommes-nous ?</h1>
            <p>Groupe ABRAJ ISKAN PROMOTION IMMOBILIERE - Une entreprise avec une longue expérience dans le domaine de la construction 
                de divers logements, spécialisée dans la promotion immobilière et investissement immobilier, met en vente des 
                appartements de qualité haut gamme et architecture moderne et new classique selon le choix des clients qui ouvre 
                la possibilité d'obtenir votre maison de rêve.</p>
            <p>ABRAJ ISKAN a le plaisir de vous présenter ses nouvelles résidences. Ce sont des ensembles résidentiels Hauts 
                Standings situés dans des quartiers les plus prisés d'Alger, Blida du centre villes où il y a toutes les commodités de vivre.</p>
            <div class="wrap">
                <a href="about.php" class="button">Voir plus</a>
            </div>
        </div>
        <div class="champ champ-image">
            <div class="image-container">
                <img src="img/propos.webp" alt="A propos promotion immobiliere Abraj Iskan">
            </div>
        </div>
    </section>
     <!--====================================================
                        promotion
    =======================================================-->
    <section class="promotion">
        <div class="promotion-content">
            <h1>Qu'est-ce qu'une Promotion Immobilière ?</h1>
            <p>La promotion immobilière est une discipline complexe et structurée qui consiste à concevoir, réaliser et commercialiser des projets immobiliers. Un promoteur immobilier joue un rôle central dans ce processus, en étant responsable de l'acquisition des terrains, du financement, de la supervision des travaux de construction et de la vente des biens immobiliers une fois achevés.</p>
            <p>Le promoteur doit maîtriser toutes les étapes du projet, depuis la sélection de l'emplacement jusqu'à la remise des clés aux propriétaires, en garantissant que chaque phase respecte les normes de qualité et les délais impartis. Cette rigueur et cette organisation sont essentielles pour assurer la satisfaction des futurs propriétaires.</p>
            
            <div class="steps">
                <div class="step">
                    <div class="step-icon">🏗️</div>
                    <div class="step-title">Conception & Planification</div>
                </div>
                <div class="step">
                    <div class="step-icon">💰</div>
                    <div class="step-title">Financement & Investissement</div>
                </div>
                <div class="step">
                    <div class="step-icon">👷</div>
                    <div class="step-title">Construction & Supervision</div>
                </div>
                <div class="step">
                    <div class="step-icon">🏠</div>
                    <div class="step-title">Commercialisation & Vente</div>
                </div>
            </div>
        </div>
    </section>
    <!--====================================================
                        projet
    =======================================================-->
    <div class="projet" id="projet">
        <h1>Nos Résidences</h1>
        <section id="projet-slider" class="splide" aria-label="Splide Basic HTML Example">
            <div class="splide__track">
                <ul class="splide__list">
                    <?php foreach($rows as $row){ ?>
                    <li class="splide__slide boxe"> 
                        <img src="img/projet/<?=$row['img_principale']?>" alt="<?=$row['libelle']?>">
                        <div class="texte">
                            <h3><?=$row['libelle']?></h3>
                            <p><?=$row['adresse']?></p>
                            <a href="projet.php?id_projet=<?=$row['id_projet']?>" class="button">Découvrir</a>
                        </div>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </section>
    </div>
    <!--====================================================
                        vision
    =======================================================-->
    <section class="vision-section">
        <div class="vision-grid">
            <!-- Partie visuelle -->
            <div class="vision-visual">
                <div class="vision-badge">Notre Engagement</div>
                <div class="vision-image-container">
                    <img src="img/vision.webp" alt="Vision Abraj Iskan promotion immobiliere" class="vision-image">
                </div>
            </div>
            
            <!-- Partie contenu -->
            <div class="vision-content">
                <h1 class="vision-title">Notre vision</h1>
                
                <p class="vision-text">
                    Notre vocation principale est de transcender les attentes en matière de logement en offrant des résidences 
                    haut de gamme qui allient élégance, fonctionnalité et durabilité.
                </p>
                
                <p class="vision-text">
                    Nous comprenons l'importance de créer des espaces qui vont au-delà de simples structures, mais qui incarnent 
                    véritablement le concept de foyer. À chaque étape de nos projets, de la conception initiale à la réalisation 
                    finale, nous maintenons un engagement ferme envers l'excellence.
                </p>
                
                <div class="vision-stats">
                    <div class="stat-item">
                        <span class="stat-number">15+</span>
                        <span class="stat-label">Ans d'expérience</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">50+</span>
                        <span class="stat-label">Projets réalisés</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">100%</span>
                        <span class="stat-label">Satisfaction client</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">5★</span>
                        <span class="stat-label">Qualité garantie</span>
                    </div>
                </div>
                
                <a href="service.php" class="vision-cta">
                    Découvrir notre expertise
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                        <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>
    <!--====================================================
                        actualite
    =======================================================-->
    <div class="actualite">
        <div class="actualite-header">
            <span class="actualite-subtitle">Innover l'Immobilier, Créer des Résidences Uniques</span>
            <h1 class="actualite-title">Actualités</h1>
            <p class="actualite-description">Découvrez les dernières nouveautés et projets de Abraj Iskan</p>
        </div>
        
        <section class="splide actualite-slider" id="actuSlide" aria-label="Actualités Abraj Iskan">
            <div class="splide__track">
                <ul class="splide__list">
                    <?php
                        $sqlBlog = $pdo->prepare('SELECT * FROM blog ORDER BY datetime DESC');
                        $sqlBlog->execute();
                        $blogs = $sqlBlog->fetchAll();
                        foreach($blogs as $blog){
                            $date = new DateTime($blog['datetime']);
                            // Extraire un extrait du contenu pour l'affichage
                            $excerpt = strip_tags($blog['contenu']);
                            $excerpt = strlen($excerpt) > 120 ? substr($excerpt, 0, 120) . '...' : $excerpt;
                    ?>
                    <li class="splide__slide">
                        <a href="actualite.php?id_blog=<?=$blog['id_blog']?>" class="actu">
                            <div class="actu-image-container">
                                <img src="img/actu/<?=$blog['image']?>" alt="<?=$blog['titre']?>">
                                <div class="actu-overlay"></div>
                                <div class="actu-date">
                                    <p><?=$date->format('d M')?></p>
                                </div>
                                <div class="actu-category">Immobilier</div>
                            </div>
                            <div class="actu-content">
                                <h3><?=$blog['titre']?></h3>
                                <p class="actu-excerpt"><?=$excerpt?></p>
                                <span class="actu-cta">
                                    Lire la suite
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
                                        <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </span>
                            </div>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </section>
    </div>
    <!--====================================================
                        partenaire
    =======================================================-->
    <div class="partenaire">
        <div class="partenaire-header">
            <span class="partenaire-subtitle">Innover l'Immobilier, Créer des Résidences Uniques</span>
            <h1 class="partenaire-title">Nos Partenaires</h1>
            <p class="partenaire-description">Des collaborations d'excellence pour des projets d'exception</p>
        </div>
        <?php
            $sqlPart = $pdo->prepare('SELECT * FROM partenaire');
            $sqlPart->execute();
            $parts = $sqlPart->fetchAll();
        ?>
        <section class="splide partenaire-slider" id="partSlide" aria-label="Partenaires Abraj Iskan">
            <div class="splide__track">
                <ul class="splide__list">
                    <?php foreach($parts as $part){ ?>
                    <li class="splide__slide">
                        <div class="partenaire-card">
                            <div class="confiance-badge">Partenaire</div>
                            <div class="partenaire-logo-container">
                                <img src="img/partenaire/<?=$part['image']?>" alt="Partenaire <?=$part['libelle']?>" class="partenaire-logo" loading="lazy">
                            </div>
                            <h3 class="partenaire-name"><?=$part['libelle']?></h3>
                            <div class="partenaire-type">Partenaire Privilégié</div>
                            <p class="partenaire-description-short">Collaboration d'excellence depuis plusieurs années</p>
                        </div>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </section>
    </div>
    <!--====================================================
                        caracteristique
    =======================================================-->
    <div class="carac">
        <h1>Caractéristiques</h1>
        <p class="carac-subtitle">Découvrez les prestations haut de gamme qui font la différence</p>
        
        <div class="caracs">
            <div class="carac-item">
                <div class="carac-icon">
                    <img src="icon/meuble.png" alt="Appartements meublés">
                </div>
                <h3>Appartements meublés</h3>
            </div>
            
            <div class="carac-item">
                <div class="carac-icon">
                    <img src="icon/perso.png" alt="Personnalisation">
                </div>
                <h3>Personnalisation</h3>
            </div>
            
            <div class="carac-item">
                <div class="carac-icon">
                    <img src="icon/reliability.png" alt="Matériaux haut de gamme">
                </div>
                <h3>Matériaux haut de gamme</h3>
            </div>
            
            <div class="carac-item">
                <div class="carac-icon">
                    <img src="icon/window.png" alt="Double vitrage">
                </div>
                <h3>Double vitrage</h3>
            </div>
            
            <div class="carac-item">
                <div class="carac-icon">
                    <img src="icon/temperature.png" alt="Chauffage et climatisation centralisés">
                </div>
                <h3>Chauffage et climatisation centralisés</h3>
            </div>
            
            <div class="carac-item">
                <div class="carac-icon">
                    <img src="icon/3d-house.png" alt="Domotique Smart Home">
                </div>
                <h3>Domotique Smart Home</h3>
            </div>
            
            <div class="carac-item">
                <div class="carac-icon">
                    <img src="icon/parking.png" alt="Service voiturier">
                </div>
                <h3>Service voiturier</h3>
            </div>
            
            <div class="carac-item">
                <div class="carac-icon">
                    <img src="icon/bed.png" alt="Espaces communs modernes">
                </div>
                <h3>Espaces communs modernes</h3>
            </div>
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
    
    <script>
        var splide = new Splide('#projet-slider', {
            type: 'loop',
            perPage: 3,
            focus: 0,
            gap: '30px',
            pagination: true,
            arrows: true,
            pauseOnHover: true,
            autoplay: false,
            breakpoints: {
                1200: {
                    perPage: 2,
                    gap: '20px'
                },
                768: {
                    perPage: 1,
                    gap: '15px'
                }
            }
        });

        // Mise à jour du compteur
        splide.on('mounted move', function() {
            var current = splide.index + 1;
            var total = splide.length;
            document.querySelector('.current-slide').textContent = current;
            document.querySelector('.total-slides').textContent = total;
        });

        splide.mount();       
    </script>

    <script>
        var splide = new Splide('#actuSlide', {
            type: 'loop',
            perPage: 3,
            gap: '30px',
            perMove: 1,
            autoplay: true,
            interval: 4000,
            pauseOnHover: true,
            breakpoints: {
                768: {
                    perPage: 2,
                    gap: '20px'
                },
                480: {
                    perPage: 1,
                    gap: '15px'
                }
            }
        });
        splide.mount();
    </script>

    <script>
        var splide = new Splide('#partSlide', {
            type: 'loop',
            drag: 'free',
            perPage: 5,
            gap: '30px',
            autoplay: true,
            interval: 3000,
            pauseOnHover: true,
            breakpoints: {
                768: {
                    perPage: 3,
                    gap: '20px'
                },
                480: {
                    perPage: 2,
                    gap: '15px'
                }
            }
        });
        splide.mount();
    </script>
    
</body>
</html>