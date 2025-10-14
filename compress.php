<?php
ini_set('memory_limit', '256M');
// Fonction pour convertir une image en WebP
function convertToWebP($source, $quality = 80) {
    $info = getimagesize($source);
    if ($info['mime'] == 'image/jpeg') {
        $image = imagecreatefromjpeg($source);
    } elseif ($info['mime'] == 'image/png') {
        $image = imagecreatefrompng($source);
    } else {
        return false; // Format non supporté
    }
    
    // Chemin de destination (même dossier, même nom avec extension .webp)
    $destination = pathinfo($source, PATHINFO_DIRNAME) . '/' . pathinfo($source, PATHINFO_FILENAME) . '.webp';
    
    // Convertir et sauvegarder en WebP
    imagewebp($image, $destination, $quality);
    imagedestroy($image);
    return $destination;
}

// Chemin vers le dossier contenant les images
$imageFolder = 'img/offres'; // Remplace par le chemin correct

// Parcourir tous les fichiers du dossier
$files = scandir($imageFolder);
foreach ($files as $file) {
    $filePath = $imageFolder . '/' . $file;
    // Vérifier si c'est un fichier image
    if (is_file($filePath) && preg_match('/\.(jpg|jpeg|png)$/i', $file)) {
        $webpPath = convertToWebP($filePath);
        if ($webpPath) {
            echo "Image convertie : $filePath => $webpPath\n";
            // Optionnel : Supprimer le fichier original après conversion
             unlink($filePath);
        } else {
            echo "Échec de la conversion : $filePath\n";
        }
    }
}
?>
