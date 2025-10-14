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
    <div class="popup" id="popup-form">
        <div class="popup-content">
            <span class="close" id="close">&times;</span>
            <form method="POST" enctype="multipart/form-data">
                <h3>Ajouter une offre</h3>
                <input type="text" name="libelle" placeholder="Libelle" required>   
                <select name="type">
                    <option value="Appartement">Appartement</option>
                    <option value="Villa">Villa</option>
                    <option value="Local">Local</option>
                    <option value="Terrain">Terrain</option>
                </select>  
                <input type="text" name="adresse" placeholder="Adresse" required> 
                <input type="text" name="prix" placeholder="Prix" required>    
                <textarea name="des1" placeholder="Description du projet" required></textarea>

                <label for="img-service" id="label-img">Telecharger l'image principale</label> 
                <input type="file" name="img-principale" id="img-service"><br>

                <label for="images">Télécharger 8 images max</label>
                <input type="file" name="images[]" id="img-service" class="file-active" multiple>

                <input type="submit" name="ajouter" value="ajouter">
            </form>  
        </div>
    </div>
    <?php
        if(isset($_POST['ajouter'])){
            $libelle = $_POST['libelle'];
            $type = $_POST['type'];
            $adresse = $_POST['adresse'];
            $prix = $_POST['prix'];
            $des1 = $_POST['des1'];

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
            // Upload de l'image principale
            $imagePrincipale = uploadImage($_FILES['img-principale']);

            // Tableau pour stocker les noms des images multiples
            $images = [];

            // Vérifier si des fichiers multiples ont été téléchargés
            if (!empty($_FILES['images']['name'][0])) {
                $totalFiles = count($_FILES['images']['name']);
                for ($i = 0; $i < $totalFiles; $i++) {
                    // Charger l'image et la stocker dans le tableau
                    $images[] = uploadImage($_FILES['images'], $i);
                }
            }

            // Remplir avec `null` jusqu'à ce qu'il y ait 14 images secondaires
            while (count($images) < 8) {
                $images[] = null;
            }

            $sqlOffre = $pdo->prepare('INSERT INTO offres VALUES(null,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
            $sqlOffre->execute(array_merge([$libelle,$type,$adresse,$prix,$des1,$imagePrincipale],$images));

            header('location:offre.php');
            ob_end_flush();
        }
    ?>

</body>
</html>