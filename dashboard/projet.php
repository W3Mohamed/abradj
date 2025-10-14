<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&family=Funnel+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    
    <script src="js/script.js"></script>
    <title>Accueil</title>
</head>
<body>
    <?php
        session_start();
        ob_start();
        require_once('database.php'); 
        if(!isset( $_SESSION['user'])){
            header('location:connexion.php');
            exit;
        }
        include('include/navbar.php'); 
    ?>
    <div class="site">
        <?php
            include('include/boxe.php');
        ?>
        <div class="text">Projets</div>
        <button class="ajouter" id="open-popup">Ajouter un projet</button>
        <div class="projets">
            <?php
                $sqlStates = $pdo->prepare('SELECT * FROM projet ORDER BY id_projet DESC');
                $sqlStates->execute();
                $projets = $sqlStates->fetchAll();
                foreach($projets as $projet){
            ?>
            <div class="projet">
                <img src="../img/projet/<?=$projet['img_principale']?>" alt="">
                <h3><?=$projet['libelle']?></h3>
                <div class="lien">
                    <a href="mod-projet.php?id=<?=$projet['id_projet']?>"><img src="icon/modifier.png" alt=""></a>
                    <a href="supprimer/sup-projet.php?id=<?=$projet['id_projet']?>"><img src="icon/poubelle.png" alt=""></a>
                </div>
            </div>
            <?php } ?>
        </div>

    </div>

    <!--========================Popup==============================-->
    <div class="popup" id="popup-form">
        <div class="popup-content">
            <span class="close" id="close">&times;</span>
            <form method="POST" enctype="multipart/form-data">
                <h3>Ajouter un projet</h3>
                <input type="text" name="libelle" placeholder="Libelle" required>     
                <input type="text" name="adresse" placeholder="Adresse" required>     
                <textarea name="des1" placeholder="Description du projet" required></textarea>
                <textarea name="des2" placeholder="Specification  du projet" required></textarea>

                <label for="video">Télécharger une vidéo (optionnel)</label>
                <input type="file" name="video" class="file-active" id="video">

                <label for="img-service" id="label-img">Telecharger l'image principale</label> 
                <input type="file" name="img-principale" id="img-service"><br>

                <label for="images">Télécharger 14 images max</label>
                <input type="file" name="images[]" id="img-service" class="file-active" multiple>

                <input type="submit" name="ajouter" value="ajouter">
            </form>  
        </div>
    </div>
    <?php
        if(isset($_POST['ajouter'])){
            $libelle = $_POST['libelle'];
            $adresse = $_POST['adresse'];
            $des1 = $_POST['des1'];
            $des2 = $_POST['des2'];

            function uploadImage($file, $index = null) {
                if ($index === null) {
                    // Image principale
                    $fileName = $file['name'];
                    $fileTmpName = $file['tmp_name'];
                } else {
                    // Images multiples
                    $fileName = $file['name'][$index];
                    $fileTmpName = $file['tmp_name'][$index];
                }
                
                $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
                $uniqueName = uniqid('', true) . '.' . $fileExt;
                $fileDestination = '../img/projet/' . $uniqueName;
                move_uploaded_file($fileTmpName, $fileDestination);
                
                return $uniqueName;
            }
            // Upload de l'image principale
            $imagePrincipale = uploadImage($_FILES['img-principale']);
            $video = uploadImage($_FILES['video']);

            $sqlProjet = $pdo->prepare('INSERT INTO projet VALUES(null,?,?,?,?,?,?)');
            $sqlProjet->execute([$libelle,$adresse,$des1,$des2,$imagePrincipale,$video]);

            $id_projet = $pdo->lastInsertId();

            $sqlImages = $pdo->prepare('INSERT INTO image VALUES(null,?,?,?)');

            // Vérifier si des fichiers multiples ont été téléchargés
            if (!empty($_FILES['images']['name'][0])) {
                $totalFiles = count($_FILES['images']['name']);
                for ($i = 0; $i < $totalFiles; $i++) {
                    // Charger l'image et la stocker
                    $image = uploadImage($_FILES['images'], $i);

                    // Exécuter la requête pour chaque image
                    $sqlImages->execute([$id_projet, 0,$image]);
                }
            }
            header('location:projet.php');
            ob_end_flush();
        }
    ?>

</body>
</html>