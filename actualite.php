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
    <title>Actualités</title>
</head>
<body>
    <?php
        require_once('dashboard/database.php');
        $id_blog = $_GET['id_blog'];
        $sqlBlog = $pdo->prepare('SELECT * FROM blog WHERE id_blog=?');
        $sqlBlog->execute([$id_blog]);
        $blog = $sqlBlog->fetch();
    ?>
    <?php include('partie/navbar.php') ?>

    <div class="header-projet">
        <img src="img/projet.webp" alt="projet immobiliere" class="headImg">
        <div class="texte">
            <p>Abraj Iskan</p>
            <h1>Actualités</h1>
        </div>
    </div>
    <!--====================================================
                        actu
    =======================================================-->
    <div class="page-actu">
        <img src="img/actu/<?=$blog['image']?>" alt="<?=$blog['titre']?>">
        <div class="date">
            <img src="icon/date.png" alt="">
            <p><?php
                $date = new DateTime($blog['datetime']);
                echo $date->format('d M Y')
                ?>
            </p>
        </div>
        <h1><?=$blog['titre']?></h1>
        <p><?=nl2br($blog['contenu'])?></p>
        <section class="splide" aria-label="Splide Basic HTML Example">
            <div class="splide__track">
                    <ul class="splide__list">
                        <?php 
                            $sqlImages = $pdo->prepare('SELECT * FROM image WHERE id_blog=?');
                            $sqlImages->execute([$id_blog]);
                            $images = $sqlImages->fetchAll();
                            foreach($images as $image){
                        ?>
                        <li class="splide__slide"><img src="img/actu/<?=$image['image']?>" alt="<?=$blog['titre']?>"></li><?php } ?>
                    </ul>
            </div>
        </section>
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
        gap: '20px',
        breakpoints: {
            500: {
                perPage: 1,
            },
            800: {
                perPage: 2, 
            }
        }
        } );

        splide.mount();
    </script>

</body>
</html>