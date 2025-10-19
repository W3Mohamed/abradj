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
    <title>Modalite de payement</title>
</head>
<body>
    <?php
        require_once('dashboard/database.php');
        include('partie/navbar.php');
        $sqlStates = $pdo->prepare('SELECT * FROM projet');
        $sqlStates->execute();
        $rows = $sqlStates->fetchAll();
    ?>
    <!--====================================================
                        page payement
    =======================================================-->
    <div class="page-payment">
        <!-- Section Hero -->
        <section class="payment-hero">
            <div class="payment-container">
                <div class="payment-content">
                    <span class="payment-badge">ABRAJ ISKAN PROMOTION IMMOBILIER</span>
                    <h1 class="payment-title">Modalités de Paiement</h1>
                    <p class="payment-text">Nous disposons de trois modalités de paiement : l'autofinancement, le crédit bancaire et le financement mixte. Le premier mode de financement nécessite un premier versement sur votre futur bien immobilier, le reste des tranches seront versés selon un échéancier sur une durée variable selon l'avancement du projet. Pour le paiement par crédit bancaire, vous pouvez prendre contact avec votre banque afin de connaitres les démarches à suivre, le dossier nécessaire, et les conditions du prêt, une fois ces informations validées, et votre chèque délivré, vous pouvez effectuer votre achat facilement. Le dernier type de financement est le financement mixte, ce qui signifie qu'une partie du paiement sera couverte par le crédit, et une autre partie sera couverte en autofinancement.</p>
                    <h2 class="payment-subtitle">Les Promotions Immobilières à Alger avec Crédit Bancaire en 2025</h2>
                    <p class="payment-text">En 2025, le marché immobilier à Alger continue d'évoluer rapidement, avec une demande croissante pour des solutions de financement adaptées aux besoins des acheteurs. Parmi les promoteurs immobiliers qui se distinguent, ABRAJ ISKAN Promotion Immobilière s'impose comme un acteur incontournable, notamment grâce à son offre de service de crédit bancaire.</p>
                </div>
                <div>
                    <img src="img/payement.webp" alt="Modalités de paiement" class="payment-image">
                </div>
            </div>
        </section>

        <!-- Section Crédit Bancaire -->
        <section class="payment-credit">
            <div class="credit-container">
                <div>
                    <img src="img/bancaire.webp" alt="Crédit Bancaire" class="payment-image">
                </div>
                <div class="payment-content">
                    <span class="payment-badge">ABRAJ ISKAN PROMOTION IMMOBILIER</span>
                    <h2 class="payment-subtitle">L'Excellence de promoteur immobilière en Matière de Crédit Bancaire</h2>
                    <p class="payment-text">Choisir un bien immobilier à Alger est un processus important, et l'accès à un financement fiable est souvent l'un des défis majeurs. C'est ici que ABRAJ ISKAN Promotion se démarque en proposant non seulement des projets immobiliers modernes et innovants, mais aussi un service d'accompagnement complet pour l'obtention de crédits bancaires.</p>
                    <p class="payment-text">Avec une connaissance approfondie du marché et des relations solides avec les principales banques algériennes, ABRAJ ISKAN facilite l'accès au financement pour ses clients. En collaboration avec ses partenaires bancaires, elle permet à ses futurs propriétaires de bénéficier des meilleures conditions de crédit immobilier, que ce soit en termes de taux d'intérêt compétitifs, de durées de remboursement flexibles ou de conditions simplifiées.</p>
                    <h2 class="payment-subtitle">Un Partenariat Solide avec les Banques</h2>
                    <p class="payment-text">Depuis plusieurs années, notre promoteur immobilier a noué des partenariats solides avec les plus grandes banques algériennes. Grâce à ces collaborations, elle est en mesure d'offrir à ses clients des conditions avantageuses pour le financement de leurs projets immobiliers. Qu'il s'agisse de taux d'intérêt réduits, de modalités de remboursement flexibles ou de délais de traitement raccourcis, ABRAJ ISKAN fait en sorte que ses clients bénéficient du meilleur.</p>
                    <p class="payment-text">Ces partenariats permettent également une centralisation des démarches. En effet, ABRAJ ISKAN simplifie grandement le processus d'obtention d'un crédit bancaire en s'occupant de toutes les formalités administratives avec les banques. Pour l'acheteur, cela signifie moins de stress et un gain de temps considérable.</p>
                </div>
            </div>
        </section>

        <!-- Section Solutions -->
        <section class="payment-solutions">
            <div class="solutions-header">
                <span class="solutions-badge">Abraj iskan promotion immobiliere</span>
                <h1 class="solutions-title">Des Solutions de Crédit Bancaire sur Mesure</h1>
                <p class="payment-text">Chaque client a des besoins et des capacités financières différentes. C'est pourquoi ABRAJ ISKAN Promotion propose des solutions de crédit sur mesure. Que vous soyez un jeune couple à la recherche de votre première résidence ou un investisseur souhaitant acquérir un bien locatif, ABRAJ ISKAN ajuste ses offres de financement en fonction de votre profil</p>
            </div>

            <h2 class="solutions-subtitle">Le Marché Immobilier à Alger : Évolutions et Tendances en 2025</h2>
            <p class="payment-text">L'immobilier à Alger est un secteur en constante évolution, en particulier avec l'urbanisation croissante et la modernisation des infrastructures. METIDJA est le cœur économique et culturel du pays, ce qui en fait une destination de choix pour les investisseurs immobiliers et les acquéreurs de biens. En 2025, plusieurs tendances dominent le marché :</p>

            <div class="trends-list">
                <div class="trend-item">
                    <div class="trend-number">1. Demande accrue pour des logements modernes :</div>
                    <p class="trend-text">Avec l'augmentation de la population urbaine, la demande de logements modernes et bien équipés dans des quartiers stratégiques ne cesse de croître. Les acheteurs recherchent des biens qui offrent un cadre de vie agréable, des infrastructures modernes et un accès facile aux commodités.</p>
                </div>
                <div class="trend-item">
                    <div class="trend-number">2. Montée en puissance des solutions de crédit immobilier :</div>
                    <p class="trend-text">En réponse à la demande croissante, les institutions bancaires algériennes se sont adaptées en proposant des crédits immobiliers plus compétitifs. Cela permet aux acheteurs d'accéder plus facilement à la propriété. Les taux d'intérêt ont également été ajustés pour rendre ces offres plus attractives.</p>
                </div>
                <div class="trend-item">
                    <div class="trend-number">3. Des promoteurs immobiliers comme ABRAJ ISKAN en première ligne :</div>
                    <p class="trend-text">Face à cette demande croissante, des promoteurs comme ABRAJ ISKAN Promotion se sont distingués en offrant des solutions complètes et sur-mesure. Ils ne se contentent plus de vendre des biens, mais proposent un accompagnement tout au long du processus, du choix du bien jusqu'à l'obtention du financement.</p>
                </div>
            </div>
        </section>

        <!-- Section Accompagnement -->
        <section class="payment-accompaniment">
            <div class="accompaniment-container">
                <div class="accompaniment-content">
                    <span class="payment-badge">ABRAJ ISKAN PROMOTION IMMOBILIER</span>
                    <h2 class="accompaniment-title">ABRAJ ISKAN Promotion : L'Art de Faciliter l'Accès à la Propriété</h2>
                    <p class="accompaniment-text">Dans ce contexte dynamique, ABRAJ ISKAN Promotion Immobilière se positionne comme un acteur clé du secteur immobilier en Algerie. Mais qu'est-ce qui distingue réellement ABRAJ ISKAN des autres promoteurs ? C'est leur capacité à proposer des services de financement adaptés, et notamment des solutions de crédit bancaire parfaitement calibrées pour répondre aux attentes des acheteurs.</p>
                    <p class="accompaniment-text">ABRAJ ISKAN promotion immobilière en Algérie et le Crédit bancaire</p>
                    <p class="accompaniment-text">En 2025, ABRAJ ISKAN Promotion Immobilière continue de se démarquer sur le marché algérien en offrant des solutions de crédit bancaire accessibles et adaptées à chaque client. Grâce à ses partenariats avec les plus grandes banques, son service d'accompagnement personnalisé et ses projets de grande qualité, ABRAJ ISKAN rend l'accès à la propriété plus simple et plus fluide.</p>
                    <p class="accompaniment-text">Pour tous ceux qui cherchent à acheter un bien immobilier à Alger, ABRAJ ISKAN est le partenaire idéal, offrant une expertise reconnue et un service client exemplaire. Si vous envisagez d'investir dans un logement en Algérie en 2025, ABRAJ ISKAN est le choix incontournable pour bénéficier des meilleures conditions de financement et d'une expérience sans stress.</p>
                </div>
                <div>
                    <img src="img/faciliter.webp" alt="Faciliter l'Accès à la Propriété" class="accompaniment-image">
                </div>
            </div>

            <div class="accompaniment-process">
                <h3 class="process-title">Notre Processus d'Accompagnement</h3>
                <div class="process-steps">
                    <div class="process-step">
                        <div class="step-number">1</div>
                        <h4 class="step-title">Étude de faisabilité</h4>
                        <p class="step-description">Avant de s'engager dans un projet immobilier, il est crucial de connaître ses capacités de financement. ABRAJ ISKAN propose une étude de faisabilité gratuite pour chaque client.</p>
                    </div>
                    <div class="process-step">
                        <div class="step-number">2</div>
                        <h4 class="step-title">Constitution du dossier</h4>
                        <p class="step-description">ABRAJ ISKAN s'occupe de la constitution complète du dossier, en veillant à ce que tous les documents nécessaires soient fournis et en facilitant les interactions avec les banques partenaires.</p>
                    </div>
                    <div class="process-step">
                        <div class="step-number">3</div>
                        <h4 class="step-title">Suivi du dossier</h4>
                        <p class="step-description">Une fois le dossier soumis, l'équipe ABRAJ ISKAN suit de près chaque étape de son traitement par la banque. Les clients sont régulièrement informés de l'avancement.</p>
                    </div>
                    <div class="process-step">
                        <div class="step-number">4</div>
                        <h4 class="step-title">Assistance post-obtention</h4>
                        <p class="step-description">Même après l'obtention du crédit, ABRAJ ISKAN continue d'accompagner ses clients en leur fournissant des conseils sur la gestion de leur prêt.</p>
                    </div>
                </div>
            </div>
        </section>
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