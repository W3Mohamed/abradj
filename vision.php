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
    <title>Vision</title>
</head>
<body>
    <?php
        require_once('dashboard/database.php');
    ?>
    <?php include('partie/navbar.php') ?>

    <div class="header-projet">
        <img src="img/service.webp" alt="services immobiliere" class="headImg">
        <div class="texte">
            <p>Abraj Iskan</p>
            <h1>Notre vision</h1>
        </div>
    </div>
    <!--====================================================
                        vision
    =======================================================-->
    <div class="page-vision">
        <h3>Abraj iskan promotion immobiliere</h3>
        <h1>Notre Vision</h1>
        <p>Notre vocation principale est de transcender les attentes en matière de logement en offrant des résidences haut de gamme qui allient élégance, fonctionnalité et durabilité. Nous comprenons l'importance de créer des espaces qui vont au-delà de simples structures, mais qui incarnent véritablement le concept de foyer.</p>
        <p>À chaque étape de nos projets, de la conception initiale à la réalisation finale, nous maintenons un engagement ferme envers l'excellence. Notre équipe talentueuse d'architectes, d'urbanistes et de professionnels de la construction travaille de concert pour donner vie à des environnements résidentiels exceptionnels, reflétant les plus hauts standards de qualité et de design.</p>
        <p>Abraj iskan promotion immobiliere est une entreprise compétente et ambitieuse qui construit des logements contemporains de haute qualité, tout en réalisant un équilibre esthétique et fonctionnel au sein de ses résidences promotionnelles une passion pour la qualité et la modernité. </p>
        <p>En utilisant les dernières technologies du domaine de la construction, nous participons activement à la modernisation du monde immobilier de cette région, ont vu le jour avec des appartements grands standing, grâce aux compétences de nos équipes d’experts en bâtiments, de nos bureaux d’études, de nos architectes, de nos ingénieurs en génie civil ainsi que notre personnel exécutif. </p>
        <p>Notre équipe de professionnels à votre écoute qui saura vous conseiller, vous aider pour faire votre choix et vous proposer des solutions. </p>
        <p>La mission principale de ABRAJ ISKAN promotion immobilier est de mettre sa performance, sa compétence et son énergie pour satisfaire et fidéliser ses clients qui sont à la base sa priorité dans ses projets. </p>
    </div>

    <!--====================================================
                        contact
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