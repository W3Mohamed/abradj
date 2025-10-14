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
        $id_blog = $_GET['id'];
        $sqlGet = $pdo->prepare('SELECT * FROM blog WHERE id_blog=?');
        $sqlGet->execute([$id_blog]);
        $row = $sqlGet->fetch();
        include('include/navbar.php'); 
    ?>
    <div class="site">
        <?php
            include('include/boxe.php');
        ?>
        <div class="text">Blog</div>
        <div class="projets">
            <?php
                $sqlStates = $pdo->prepare('SELECT * FROM blog ORDER BY id_blog DESC');
                $sqlStates->execute();
                $blogs = $sqlStates->fetchAll();
                foreach($blogs as $blog){
            ?>
            <div class="projet">
                <img src="../img/actu/<?=$blog['image']?>" alt="">
                <h3><?=$blog['titre']?></h3>
                <div class="lien">
                    <a href="mod-blog.php?id=<?=$blog['id_blog']?>"><img src="icon/modifier.png" alt=""></a>
                    <a href="supprimer/sup-blog.php?id=<?=$blog['id_blog']?>"><img src="icon/poubelle.png" alt=""></a>
                </div>
            </div>
            <?php } ?>
        </div>

    </div>

    <!--========================Popup==============================-->
    <div class="popup" id="popup-form" style="display:block">
        <div class="popup-content">
            <a href="blog.php"><span class="close" id="close">&times;</span></a>
            <form method="POST" enctype="multipart/form-data">
                <h3>Modifier un blog</h3>
                <input type="text" name="titre" placeholder="Titre" value="<?=$row['titre']?>" required>      
                <textarea name="contenu" placeholder="Contenu" required><?=$row['contenu']?></textarea>
                <label for="img-service" id="label-img">Telecharger l'image principale</label> 
                <input type="file" name="image" id="img-service"><br>

                <label for="images">Télécharger 14 images max</label>
                <input type="file" name="images[]" id="img-service" class="file-active" multiple>

                <input type="submit" name="modifier" value="modifier">
            </form>  
        </div>
    </div>
    <?php
        if(isset($_POST['modifier'])){
            $titre = $_POST['titre'];
            $contenu = $_POST['contenu'];

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
                $fileDestination = '../img/actu/' . $uniqueName;
                move_uploaded_file($fileTmpName, $fileDestination);
                
                return $uniqueName;
            }

            $sqlModifier = 'UPDATE blog SET titre=?,contenu=?';
            $params = [$titre,$contenu];

            if (!empty($_FILES['image']['name'])) {
                $imagePrincipale = uploadImage($_FILES['image']);
                $sqlModifier .= ', image=?';
                $params[] = $imagePrincipale;
            }
            
            $sqlModifier .= 'WHERE id_blog=?';
            $params[] = $id_blog;

            $sql = $pdo->prepare($sqlModifier);
            $sql->execute($params);

            // Étape 2 : Gestion des images multiples
            if (!empty($_FILES['images']['name'][0])) {
                // Supprimer les anciennes images uniquement si de nouvelles images sont fournies
                $sqlSelectImages = $pdo->prepare('SELECT image FROM image WHERE id_blog=?');
                $sqlSelectImages->execute([$id_blog]);
                $oldImages = $sqlSelectImages->fetchAll(PDO::FETCH_ASSOC);

                foreach ($oldImages as $oldImage) {
                    $filePath = '../img/actu/' . $oldImage['image'];
                    if (file_exists($filePath)) {
                        unlink($filePath); // Supprime le fichier physique
                    }
                }

                $sqlDeleteImages = $pdo->prepare('DELETE FROM image WHERE id_blog=?');
                $sqlDeleteImages->execute([$id_blog]);

                // Ajouter les nouvelles images
                $totalFiles = count($_FILES['images']['name']);
                $sqlInsertImage = $pdo->prepare('INSERT INTO image (id_blog, image) VALUES (?, ?)');

                for ($i = 0; $i < $totalFiles; $i++) {
                    $newImage = uploadImage($_FILES['images'], $i);
                    if ($newImage) {
                        $sqlInsertImage->execute([$id_blog, $newImage]);
                    }
                }
            }

            header('location:blog.php');
            ob_end_flush();
        }
    ?>

</body>
</html>