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
    ?>
    <?php include('partie/navbar.php') ?>

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
        <div class="services">
            <div class="service">
                <img src="icon/parking.png" alt="Parking aux sous-sols">
                <h4>Parking aux sous-sols</h4>
            </div>
            <div class="service">
                <img src="icon/membrane.png" alt="Matériaux contemporains">
                <h4>Matériaux contemporains</h4>
            </div>
            <div class="service">
                <img src="icon/chef.png" alt="Cuisines équipés et meublée">
                <h4>Cuisines équipés et meublée</h4>
            </div>
            <div class="service">
                <img src="icon/thunderbolt.png" alt="Haute performance énergétique">
                <h4>Haute performance énergétique</h4>
            </div>
            <div class="service">
                <img src="icon/sport.png" alt="Salle de sport">
                <h4>Salle de sport</h4>
            </div>
            <div class="service">
                <img src="icon/cctv.png" alt="Gardiennage et télésurveillance">
                <h4>Gardiennage et télésurveillance</h4>
            </div>
            <div class="service">
                <img src="icon/gardening.png" alt="Espaces verts et jardins paysagers">
                <h4>Espaces verts et jardins paysagers</h4>
            </div>
            <div class="service">
                <img src="icon/online.png" alt="Commerces de proximité">
                <h4>Commerces de proximité</h4>
            </div>
            <div class="service">
                <img src="icon/elevator.png" alt="Ascenseurs modernes">
                <h4>Ascenseurs modernes</h4>
            </div>
            <div class="service">
                <img src="icon/mop.png" alt="Service de nettoyage">
                <h4>Service de nettoyage</h4>
            </div>
            <div class="service">
                <img src="icon/sound-waves.png" alt="Isolation thermique et phonique">
                <h4>Isolation thermique et phonique</h4>
            </div>
            <div class="service">
                <img src="icon/cleaning-service.png" alt="AUTO CLEAN">
                <h4>AUTO CLEAN</h4>
            </div>
            <div class="service">
                <img src="icon/terrace.png" alt="TERRASSE ACCESIBLE">
                <h4>TERRASSE ACCESIBLE</h4>
            </div>
            <div class="service">
                <img src="icon/reliability.png" alt="Finitions haut de gamme">
                <h4>Finitions haut de gamme</h4>
            </div>
        </div>
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