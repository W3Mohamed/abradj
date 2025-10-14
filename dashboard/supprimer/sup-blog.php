<?php
    require_once '../database.php';
    $id = $_GET['id'];

    $sql = $pdo->prepare('SELECT * FROM image WHERE id_blog=?');
    $sql->execute([$id]);
    $images = $sql->fetchAll();
    foreach($images as $image){
        unlink('../../img/actu/'.$image['image']);
    }

    $sqlImages = $pdo->prepare('DELETE FROM image WHERE id_blog=?');
    $sqlImages->execute([$id]);

    $sqlState = $pdo->prepare('DELETE FROM blog WHERE id_blog=?');
    $supprime = $sqlState->execute([$id]);
    header('location:../blog.php');
?>