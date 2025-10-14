<?php
    require_once '../database.php';
    $id = $_GET['id'];

    $sql = $pdo->prepare('SELECT * FROM capacite WHERE id_capacite=?');
    $sql->execute([$id]);
    $image = $sql->fetch();
    unlink('../../img/materiel/'.$image['image']);

    $sqlState = $pdo->prepare('DELETE FROM capacite WHERE id_capacite=?');
    $supprime = $sqlState->execute([$id]);
    header('location:../capacite.php');
?>