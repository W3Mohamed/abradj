<?php
    require_once '../database.php';
    $id = $_GET['id'];

    $sql = $pdo->prepare('SELECT * FROM partenaire WHERE id_partenaire=?');
    $sql->execute([$id]);
    $image = $sql->fetch();
    unlink('../../img/partenaire/'.$image['image']);

    $sqlState = $pdo->prepare('DELETE FROM partenaire WHERE id_partenaire=?');
    $supprime = $sqlState->execute([$id]);
    header('location:../partenaire.php');
?>