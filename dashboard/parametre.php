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
        ob_start();
        session_start();
        require_once('database.php'); 
        if(!isset( $_SESSION['user'])){
            header('location:connexion.php');
            exit;
        }
        $sqlInfo = $pdo->prepare('SELECT * FROM setting');
        $sqlInfo->execute();
        $info = $sqlInfo->fetch();

        include('include/navbar.php'); 
    ?>
    <div class="site">
        <?php
            include('include/boxe.php');
        ?>
        <div class="text">Parametre</div>
        <form method="POST">
            <table>
                <tr>
                    <td>Numero de Whatsapp</td>
                    <td><input type="tel" name="tel1" placeholder="Telephpne 1" value="0<?=$info['tel1']?>"></td>
                </tr>
                <tr>
                    <td>Numero de téléphone 2</td>
                    <td><input type="tel" name="tel2" placeholder="Telephpne 2" value="0<?=$info['tel2']?>"></td>
                </tr>
                <tr>
                    <td>Adresse</td>
                    <td><input type="text" name="adresse" placeholder="Adresse" value="<?=$info['adresse']?>"></td>
                </tr>

                <tr>
                    <td>Email</td>
                    <td><input type="email" name="email" placeholder="email@email.com" value="<?=$info['email']?>"></td>
                </tr>
                <tr>
                    <td>Facebook</td>
                    <td><input type="text" name="facebook" placeholder="Lien sur la page facebook" value="<?=$info['facebook']?>"></td>
                </tr>
                <tr>
                    <td>Instagram</td>
                    <td><input type="text" name="insta" placeholder="Lien sur la page instagram" value="<?=$info['instagram']?>"></td>
                </tr>
                <tr>
                    <td>Tiktok</td>
                    <td><input type="text" name="tiktok" placeholder="Lien sur la page tiktok" value="<?=$info['tiktok']?>"></td>
                </tr>
                <tr>
                    <td>Youtube</td>
                    <td><input type="text" name="youtube" placeholder="Lien sur la chaine youtube" value="<?=$info['youtube']?>"></td>
                </tr>
                <tr>
                    <td colspan="2"> <input type="submit" name="modifier" value="modifier"></td>
                </tr>
            </table>
        </form>
        <?php
            if(isset($_POST['modifier'])){
                $tel1 = $_POST['tel1'];
                $tel2 = $_POST['tel2'];
                $adresse = $_POST['adresse'];
                $email = $_POST['email'];
                $facebook = $_POST['facebook'];
                $insta = $_POST['insta'];
                $tiktok = $_POST['tiktok'];
                $youtube = $_POST['youtube'];

                $sqlStates = $pdo->prepare('UPDATE setting SET tel1=?,tel2=?,email=?,adresse=?,facebook=?,instagram=?,tiktok=?,youtube=? WHERE id=?');
                $sqlStates->execute([$tel1,$tel2,$email,$adresse,$facebook,$insta,$tiktok,$youtube,1]);
                header('location:parametre.php');
                ob_end_flush();
            }
        ?>

    </div>
</body>
</html>