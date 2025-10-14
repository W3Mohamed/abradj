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
    <title>Partenaire</title>
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
        <div class="text">Partenaire</div>
        <button class="ajouter" id="open-popup">Ajouter un partenaire</button>
        <div class="projets">
            <?php
                $sqlAff = $pdo->prepare('SELECT * FROM partenaire ORDER BY id_partenaire DESC');
                $sqlAff->execute();
                $rows = $sqlAff->fetchAll();
                foreach($rows as $row){
            ?>
            <div class="projet">
                <img src="../img/partenaire/<?=$row['image']?>" alt="">
                <h3><?=$row['libelle']?></h3>
                <div class="lien">
                    <a href="mod-partenaire.php?id=<?=$row['id_partenaire']?>"><img src="icon/modifier.png" alt=""></a>
                    <a href="supprimer/sup-partenaire.php?id=<?=$row['id_partenaire']?>"><img src="icon/poubelle.png" alt=""></a>
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
                <h3>Ajouter un partenaire</h3>
                <input type="text" name="libelle" placeholder="Libelle" required>   

                <label for="img-service" id="label-img">Telecharger l'image</label> 
                <input type="file" name="img-principale" id="img-service"><br>

                <input type="submit" name="ajouter" value="ajouter">
            </form>  
        </div>
    </div>
    <?php
        if(isset($_POST['ajouter'])){
            $libelle = $_POST['libelle'];

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
                $fileDestination = '../img/partenaire/' . $uniqueName;
                move_uploaded_file($fileTmpName, $fileDestination);
                
                return $uniqueName;
            }
            // Upload de l'image principale
            $imagePrincipale = uploadImage($_FILES['img-principale']);


            $sqlOffre = $pdo->prepare('INSERT INTO partenaire VALUES(null,?,?)');
            $sqlOffre->execute([$libelle,$imagePrincipale]);

            header('location:partenaire.php');
            ob_end_flush();
        }
    ?>

</body>
</html>