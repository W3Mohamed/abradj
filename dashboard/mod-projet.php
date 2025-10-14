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
        $id_projet = $_GET['id'];
        $sqlGet = $pdo->prepare('SELECT * FROM projet WHERE id_projet=?');
        $sqlGet->execute([$id_projet]);
        $row = $sqlGet->fetch();
        include('include/navbar.php'); 
    ?>
    <div class="site">
        <?php
            include('include/boxe.php');
        ?>
        <div class="text">Projets</div>
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
                    <a href=""><img src="icon/modifier.png" alt=""></a>
                    <a href="supprimer/sup-projet.php?id=<?=$projet['id_projet']?>"><img src="icon/poubelle.png" alt=""></a>
                </div>
            </div>
            <?php } ?>
        </div>

    </div>

    <!--========================Popup==============================-->
    <div class="popup" id="popup-form" style="display:block">
        <div class="popup-content">
            <a href="projet.php"><span class="close" id="close">&times;</span></a>
            <form method="POST" enctype="multipart/form-data">
                <h3>Modifer un projet</h3>
                <input type="text" name="libelle" placeholder="Libelle" value="<?=$row['libelle']?>" required>      
                <input type="text" name="adresse" placeholder="Adresse" value="<?=$row['adresse']?>" required>   
                <textarea name="des1" placeholder="Description du projet" required><?=$row['des1']?></textarea>
                <textarea name="des2" placeholder="Specification  du projet" required><?=$row['des2']?></textarea>

                <label for="video">Télécharger une vidéo (optionnel)</label>
                <input type="file" name="video" class="file-active" id="video">

                <label for="img-service" id="label-img">Telecharger l'image principale</label> 
                <input type="file" name="img-principale" id="img-service"><br>

                <label for="images">Télécharger 14 images max</label>
                <input type="file" name="images[]" id="img-service" class="file-active" multiple>

                <input type="submit" name="modifier" value="modifier">
            </form>  
        </div>
    </div>
    <?php
        if(isset($_POST['modifier'])){
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

            $sqlModifier = 'UPDATE projet SET libelle=?,adresse=?,des1=?,des2=?';
            $params = [$libelle,$adresse,$des1,$des2];

            if (!empty($_FILES['img-principale']['name'])) {
                $imagePrincipale = uploadImage($_FILES['img-principale']);
                $sqlModifier .= ', img_principale=?';
                $params[] = $imagePrincipale;
            }

            if (!empty($_FILES['video']['name'])) {
                $video = uploadImage($_FILES['video']);
                $sqlModifier .= ', video=?';
                $params[] = $video;
            }

            $sqlModifier .= 'WHERE id_projet=?';
            $params[] = $id_projet;

            $sql = $pdo->prepare($sqlModifier);
            $sql->execute($params);

            // Étape 2 : Gestion des images multiples
            if (!empty($_FILES['images']['name'][0])) {
                // Supprimer les anciennes images uniquement si de nouvelles images sont fournies
                $sqlSelectImages = $pdo->prepare('SELECT image FROM image WHERE id_projet=?');
                $sqlSelectImages->execute([$id_projet]);
                $oldImages = $sqlSelectImages->fetchAll(PDO::FETCH_ASSOC);

                foreach ($oldImages as $oldImage) {
                    $filePath = '../img/projet/' . $oldImage['image'];
                    if (file_exists($filePath)) {
                        unlink($filePath); // Supprime le fichier physique
                    }
                }

                $sqlDeleteImages = $pdo->prepare('DELETE FROM image WHERE id_projet=?');
                $sqlDeleteImages->execute([$id_projet]);

                // Ajouter les nouvelles images
                $totalFiles = count($_FILES['images']['name']);
                $sqlInsertImage = $pdo->prepare('INSERT INTO image (id_projet, image) VALUES (?, ?)');

                for ($i = 0; $i < $totalFiles; $i++) {
                    $newImage = uploadImage($_FILES['images'], $i);
                    if ($newImage) {
                        $sqlInsertImage->execute([$id_projet, $newImage]);
                    }
                }
            }

            header('location:projet.php');
            ob_end_flush();
        }
    ?>

</body>
</html>