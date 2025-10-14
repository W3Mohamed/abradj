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
    <?php include('partie/navbar.php') ?>

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
        <div class="container">
            <div class="item">
                <h3>ABRAJ ISKAN  Promotion IMMOBILIER</h3>
                <h1>L'Adresse de lux</h1>
                <p>ABRAJ ISAKN  Promotion est une entreprise immobilière spécialisée dans la construction de résidences haut standing en Algérie.</p>
                <p>Nous sommes reconnue pour notre engagement envers l’excellence, la qualité et le confort de nos résidents.</p>
                <p>Notre équipe dévouée de professionnels chevronnés travaille sans relâche pour concevoir des résidences qui reflètent notre passion pour l’innovation, la durabilité et le bien-être.</p>
                <h2>Notre Mission</h2>
                <p>1.	Innovation Architecturale : Notre mission est de concevoir des résidences exceptionnelles qui incarnent l’élégance, la fonctionnalité et l’innovation architecturale. Chaque projet ABRAJ ISKAN Promotion est bien pensé en matière de design extérieur ou intérieur.</p>
                <p>2.	Qualité Inégalée : Nous nous engageons à offrir une qualité inégalée dans tous nos projets, de la sélection des matériaux à la finition impeccable. Votre confort et votre satisfaction sont notre priorité absolue.</p>
                <p>3.	Durabilité : Dans un souci de respect de l’environnement, nous misons sur la durabilité des matériaux utilisés dans nos conceptions, contribuant ainsi à un avenir plus vert.</p>
                <p>4.	Satisfaction Client : Votre satisfaction est notre réussite. Nous nous efforçons de dépasser vos attentes à chaque étape du processus, de la conception à la remise des clés. Tous nos membres en allant de nos hommes sur les chantiers jusqu’à nos employés de bureaux œuvrent dynamiquement et solidairement pour vous accueillir et satisfaire vos demandes.</p>
            </div>
            <div class="item">
                <img src="img/vision.webp" alt="propos">
            </div>
        </div>
        <div class="container">
            <div class="item">
                <img src="img/propos.webp" alt="propos">
            </div>
            <div class="item">
                <h2>La gestion des coproperiete</h2>
                <p>Nous proposons une gamme de produit très large pour répondre aux divers besoins et désirs de nos clients. Les typologies de nos appartements commencent à partir de l’intimiste F2 jusqu’au vaste et somptueux F7. Ces biens immobiliers de qualité se distinguent en Simplex, Duplex, et Triplex avec des surfaces qui varient entre 55 m carré et 500 mètre carré. Les appartements disposent également de terrasses et de balcons, certaines même munies de piscines privatives et de jacuzzis relaxant.</p>
                <h2>Proposez-vous des appartements semi-finis ?</h2>
                <p>Non, nous proposons uniquement des appartements finis, minutieusement réalisés avec des matériaux haut de gamme importés d’Italie, équipé avec de l’électroménager de qualité et finalisés avec une grande minutie.</p>
                <h2>Les comodite que nous propose</h2>
                <p>nous mettons à disposition de nos résidents une gamme variée de commodités haut de gamme, conçues pour améliorer leur quotidien et leur offrir un maximum de confort. Parmi ces services, nous offrons des ascenseurs dans chaque bloc, des places de parking réservées, des espaces dédiés pour les abattages de l’Aïd, des aires de jeux et de repos, ainsi que des terrasses aménagées pour profiter du soleil et de l’air frais. En outre, certaines de nos résidences disposent également de piscines collectives, de salles de sport, de spas et de hammams, de garderies pour enfants, de crèches, et même d'une salle de cinéma !</p>
                <h2>Offrez vous la gestion coproperite</h2>
                <p>Nous assurons la gestion de copropriété dans chacune de nos résidences, offrant une gamme complète de services incluant : la maintenance et l'entretien des espaces communs, une surveillance continue 24h/24 et 7j/7, des dispositifs de sécurité tels que des caméras et des tags d'accès Un service après-vente réactif, la gestion des colis et entretien des jardins</p>
                <h2>Innovation et Durabilité</h2>
                <p>Nous sommes à la pointe de l'innovation dans le domaine de la promotion immobilière. En intégrant des technologies modernes et des pratiques durables, nous créons des espaces qui répondent aux besoins actuels tout en étant respectueux de l'environnement. </p>
            </div>
        </div>
    </div>
    <!--====================================================
                        contect
    =======================================================-->
    <div class="contact" id="contact">
        <div class="info">
            <h3>Contactez nous</h3>
            <form method="POST">
                <input type="text" name="nom" placeholder="Nom" required>
                <input type="tel" name="tel" placeholder="N° Téléphone" required>
                <input type="email" name="email" placeholder="Email">
                <select name="projet" id="projet">
                    <?php
                        $sqlStates = $pdo->prepare('SELECT * FROM projet');
                        $sqlStates->execute();
                        $rows = $sqlStates->fetchAll();
                        foreach($rows as $row){
                    ?>
                    <option value="<?=$row['libelle']?>"><?=$row['libelle']?></option>
                    <?php } ?>
                </select>
                <textarea name="message" id="message" placeholder="Message"></textarea>
                <input type="submit" name="envoyer" value="Envoyer">
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
                    <script> swal("Merci pour votre message", "Merci pour votre intérêt. Nous vous répondrons rapidement.", "success"); </script> <?php

                }
            ?>
        </div>
        <div class="info">
            <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3207.773088959983!2d2.82944607418515!3d36.487196285283744!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMzbCsDI5JzEzLjkiTiAywrA0OSc1NS4zIkU!5e0!3m2!1sfr!2sdz!4v1731968443015!5m2!1sfr!2sdz"
                width="100%" 
                height="100%" 
                style="border:0;"
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
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