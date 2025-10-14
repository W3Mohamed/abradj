<?php
    require_once '../database.php';
    $id = $_GET['id'];

    $sqlState = $pdo->prepare('DELETE FROM visite WHERE id_visite=?');
    $supprime = $sqlState->execute([$id]);
    header('location:../index.php');
?>