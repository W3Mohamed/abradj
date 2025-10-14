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
        <div class="text">Blog</div>
        <button class="ajouter" id="open-popup">Ajouter un blog</button>
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
    <div class="popup" id="popup-form">
        <div class="popup-content">
            <span class="close" id="close">&times;</span>
            <form method="POST" enctype="multipart/form-data">
                <h3>Ajouter un blog</h3>
                <input type="text" name="titre" placeholder="Titre" required>      
                <textarea name="contenu" placeholder="Contenu" required></textarea>
                <label for="img-service" id="label-img">Telecharger l'image principale</label> 
                <input type="file" name="image" id="img-service"><br>

                <label for="images">Télécharger 14 images max</label>
                <input type="file" name="images[]" id="img-service" class="file-active" multiple>

                <input type="submit" name="ajouter" value="ajouter">
            </form>  
        </div>
    </div>
    <?php
        if(isset($_POST['ajouter'])){
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
            // Upload de l'image principale
            $imagePr = uploadImage($_FILES['image']);

            $sqlBlog = $pdo->prepare('INSERT INTO blog(titre,contenu,image) VALUES(?,?,?)');
            $sqlBlog->execute([$titre,$contenu,$imagePr]);

            $id_blog = $pdo->lastInsertId();

            $sqlImages = $pdo->prepare('INSERT INTO image VALUES(null,?,?,?)');

            // Vérifier si des fichiers multiples ont été téléchargés
            if (!empty($_FILES['images']['name'][0])) {
                $totalFiles = count($_FILES['images']['name']);
                for ($i = 0; $i < $totalFiles; $i++) {
                    // Charger l'image et la stocker
                    $image = uploadImage($_FILES['images'], $i);

                    // Exécuter la requête pour chaque image
                    $sqlImages->execute([0,$id_blog,$image]);
                }
            }
            header('location:blog.php');
            ob_end_flush();
        }
    ?>

</body>
</html>