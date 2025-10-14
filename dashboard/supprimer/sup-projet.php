<?php
    require_once '../database.php';
    $id = $_GET['id'];

    $sql = $pdo->prepare('SELECT * FROM image WHERE id_projet=?');
    $sql->execute([$id]);
    $images = $sql->fetchAll();
    foreach($images as $image){
        unlink('../../img/projet/'.$image['image']);
    }

    $sqlImages = $pdo->prepare('DELETE FROM image WHERE id_projet=?');
    $sqlImages->execute([$id]);

    $sqlState = $pdo->prepare('DELETE FROM projet WHERE id_projet=?');
    $supprime = $sqlState->execute([$id]);
    header('location:../projet.php');
?>