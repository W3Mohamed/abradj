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
        $id_offre = $_GET['id'];
        $sqlOffre = $pdo->prepare('SELECT * FROM offres WHERE id_offre=?');
        $sqlOffre->execute([$id_offre]);
        $offre = $sqlOffre->fetch();

        include('include/navbar.php'); 
    ?>
    <div class="site">
        <?php
            include('include/boxe.php');
        ?>
        <div class="text">Offres</div>
        <button class="ajouter" id="open-popup">Ajouter une offre</button>
        <div class="projets">
            <?php
                $sqlAff = $pdo->prepare('SELECT * FROM offres ORDER BY id_offre DESC');
                $sqlAff->execute();
                $rows = $sqlAff->fetchAll();
                foreach($rows as $row){
            ?>
            <div class="projet">
                <img src="../img/offres/<?=$row['image']?>" alt="">
                <h3><?=$row['libelle']?></h3>
                <div class="lien">
                    <a href="mod-offre.php?id=<?=$row['id_offre']?>"><img src="icon/modifier.png" alt=""></a>
                    <a href="supprimer/sup-offre.php?id=<?=$row['id_offre']?>"><img src="icon/poubelle.png" alt=""></a>
                </div>
            </div>
            <?php } ?>
        </div>

    </div>

    <!--========================Popup==============================-->
    <div class="popup" id="popup-form" style="display:block">
        <div class="popup-content">
            <a href="offre.php"><span class="close" id="close">&times;</span></a>
            <form method="POST" enctype="multipart/form-data">
                <h3>Modifer cette offre</h3>
                <input type="text" name="libelle" placeholder="Libelle" value="<?=$offre['libelle']?>" required>  
                <select name="type">
                    <option value="Appartement" <?= ($offre['type'] == 'Appartement') ? 'selected' : '' ?>>Appartement</option>
                    <option value="Villa" <?= ($offre['type'] == 'Villa') ? 'selected' : '' ?>>Villa</option>
                    <option value="Local" <?= ($offre['type'] == 'Local') ? 'selected' : '' ?>>Local</option>
                    <option value="Terrain" <?= ($offre['type'] == 'Terrain') ? 'selected' : '' ?>>Terrain</option>
                </select>
                <input type="text" name="adresse" placeholder="Adresse" value="<?=$offre['adresse']?>" required>   
                <input type="text" name="prix" placeholder="Prix" value="<?=$offre['prix']?>" required>   
                <textarea name="description" placeholder="Description du projet" required><?=$offre['description']?></textarea>

                <label for="img-service" id="label-img">Telecharger l'image principale</label> 
                <input type="file" name="img-principale" id="img-service"><br>

                <label for="images">Télécharger 8 images max</label>
                <input type="file" name="images[]" id="img-service" class="file-active" multiple>

                <input type="submit" name="modifier" value="modifier">
            </form>  
        </div>
    </div>
    <?php
        if(isset($_POST['modifier'])){
            $libelle = $_POST['libelle'];
            $type = $_POST['type'];
            $adresse = $_POST['adresse'];
            $prix = $_POST['prix'];
            $des = $_POST['description'];

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
                $fileDestination = '../img/offres/' . $uniqueName;
                move_uploaded_file($fileTmpName, $fileDestination);
                
                return $uniqueName;
            }

            $sqlModifier = 'UPDATE offres SET libelle=?,type=?,adresse=?,prix=?,description=?';
            $params = [$libelle,$type,$adresse,$prix,$des];

            if (!empty($_FILES['img-principale']['name'])) {
                $imagePrincipale = uploadImage($_FILES['img-principale']);
                $sqlModifier .= ', image=?';
                $params[] = $imagePrincipale;
            }
            for ($i = 0; $i < count($_FILES['images']['name']); $i++) {
                if (!empty($_FILES['images']['name'][$i])) {
                    $img = uploadImage($_FILES['images'], $i);
                    $sqlModifier .= ', img' . ($i + 2) . '=?'; // Ajout correct du nom de la colonne
                    $params[] = $img;
                }
            }

            $sqlModifier .= 'WHERE id_offre=?';
            $params[] = $id_offre;

            $sql = $pdo->prepare($sqlModifier);
            $sql->execute($params);

            header('location:offre.php');
            ob_end_flush();
        }
    ?>

</body>
</html>