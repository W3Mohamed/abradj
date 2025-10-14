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
    <title>Modifier capacite</title>
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
        $id_capacite = $_GET['id'];
        $sqlGet = $pdo->prepare('SELECT * FROM capacite WHERE id_capacite=?');
        $sqlGet->execute([$id_capacite]);
        $row = $sqlGet->fetch();
        include('include/navbar.php'); 
    ?>
    <div class="site">
        <?php
            include('include/boxe.php');
        ?>
        <div class="text">Capacité matériel</div>
        <div class="projets">
            <?php
                $sqlStates = $pdo->prepare('SELECT * FROM capacite ORDER BY id_capacite DESC');
                $sqlStates->execute();
                $blogs = $sqlStates->fetchAll();
                foreach($blogs as $blog){
            ?>
            <div class="projet">
                <img src="../img/actu/<?=$blog['image']?>" alt="">
                <h3><?=$blog['titre']?></h3>
                <div class="lien">
                    <a href="mod-capacite.php?id=<?=$blog['id_capacite']?>"><img src="icon/modifier.png" alt=""></a>
                    <a href="supprimer/sup-cap.php?id=<?=$blog['id_capacite']?>"><img src="icon/poubelle.png" alt=""></a>
                </div>
            </div>
            <?php } ?>
        </div>

    </div>

    <!--========================Popup==============================-->
    <div class="popup" id="popup-form" style="display:block">
        <div class="popup-content">
            <a href="capacite.php"><span class="close" id="close">&times;</span></a>
            <form method="POST" enctype="multipart/form-data">
                <h3>Modifier un champ</h3>
                <input type="text" name="titre" placeholder="Titre" value="<?=$row['libelle']?>" required>      
                <label for="img-service" id="label-img">Telecharger l'image principale</label> 
                <input type="file" name="image" id="img-service"><br>
                <input type="submit" name="modifier" value="modifier">
            </form>  
        </div>
    </div>
    <?php
        if(isset($_POST['modifier'])){
            $titre = $_POST['titre'];

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
                $fileDestination = '../img/materiel/' . $uniqueName;
                move_uploaded_file($fileTmpName, $fileDestination);
                
                return $uniqueName;
            }

            $sqlModifier = 'UPDATE capacite SET libelle=?';
            $params = [$titre];

            if (!empty($_FILES['image']['name'])) {
                $imagePrincipale = uploadImage($_FILES['image']);
                $sqlModifier .= ', image=?';
                $params[] = $imagePrincipale;
            }
            
            $sqlModifier .= 'WHERE id_capacite=?';
            $params[] = $id_capacite;

            $sql = $pdo->prepare($sqlModifier);
            $sql->execute($params);

            header('location:capacite.php');
            ob_end_flush();
        }
    ?>

</body>
</html>