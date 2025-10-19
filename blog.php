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
    <title>Accueil</title>
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
            <h1>Actualités</h1>
        </div>
    </div>
    <!--====================================================
                        blog
    =======================================================-->
    <div class="page-blog">
        <div class="page-blog-header">
            <h1>Notre Blog</h1>
            <p>Découvrez les dernières actualités et conseils de l'immobilier avec ABRAJ ISKAN</p>
        </div>

        <div class="blog-grid">
            <?php
                $sqlBlog = $pdo->prepare('SELECT * FROM blog ORDER BY datetime DESC');
                $sqlBlog->execute();
                $blogs = $sqlBlog->fetchAll();
                
                if(count($blogs) > 0) {
                    foreach($blogs as $blog){
                        $date = new DateTime($blog['datetime']);
                        $extrait = strip_tags($blog['contenu']);
                        $extrait = strlen($extrait) > 100 ? substr($extrait, 0, 100) . '...' : $extrait;
            ?>
            <article class="blog-card">
                <div class="blog-image">
                    <img src="img/actu/<?=$blog['image']?>" alt="<?=$blog['titre']?>">
                    <div class="blog-overlay"></div>
                    <div class="blog-date">
                        <img src="icon/date.png" alt="Date">
                        <p><?=$date->format('d M Y')?></p>
                    </div>
                </div>
                
                <div class="blog-content">
                    <h2 class="blog-title"><?=$blog['titre']?></h2>
                    <p class="blog-excerpt"><?=htmlspecialchars($extrait)?></p>
                    <a href="actualite.php?id_blog=<?=$blog['id_blog']?>" class="blog-link">
                        Lire la suite
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
                            <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                </div>
            </article>
            <?php 
                    }
                } else { 
            ?>
            <div class="blog-empty">
                <h3>Aucun article pour le moment</h3>
                <p>Revenez bientôt pour découvrir nos nouveaux articles</p>
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