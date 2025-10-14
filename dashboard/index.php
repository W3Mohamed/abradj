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
        <div class="text">Réservation</div>
        <table>
            <thead>
                <th>Date</th>
                <th>Id</th>
                <th>Nom</th>
                <th>N°tel</th>
                <th>Email</th>
                <th>Projet</th>
                <th>Message</th>
            </thead>
            <tbody>
                <?php
                    $sqlContact = $pdo->prepare('SELECT * FROM visite');
                    $sqlContact->execute();
                    $contacts = $sqlContact->fetchAll();
                    foreach($contacts as $contact){
                ?>
                <tr>
                    <td><?=$contact['date_creation']?></td>
                    <td><?=$contact['id_visite']?></td>
                    <td><?=$contact['nom']?></td>
                    <td>0<?=$contact['tel']?></td>
                    <td><?=$contact['email']?></td>
                    <td><?=$contact['id_projet']?></td>
                    <td><?=$contact['message']?></td>
                    <td><a href="supprimer/sup-res.php?id=<?=$contact['id_visite']?>">Sup</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>
</body>
</html>