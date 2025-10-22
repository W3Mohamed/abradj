<?php
$sqlInfo = $pdo->prepare('SELECT * FROM setting');
$sqlInfo->execute();
$info = $sqlInfo->fetch();
?>

<div class="top-bar-vision">
    <div class="top-bar-container">
        <a href="visite.php" class="virtual-link">
            <span class="icon-vr">VR</span> Visite Virtuelle
        </a>
        <div class="social-links">
            <a href="<?=$info['facebook']?>" target="_blank" aria-label="Facebook"><img src="icon/facebook.png" alt="Facebook Abraj Iskan"></a>
            <a href="<?=$info['instagram']?>" target="_blank" aria-label="Instagram"><img src="icon/instagram.png" alt="Instagram Abraj Iskan"></a>
            <a href="<?=$info['tiktok']?>" target="_blank" aria-label="TikTok"><img src="icon/tiktok.png" alt="TikTok Abraj Iskan"></a>
            <a href="<?=$info['youtube']?>" target="_blank" aria-label="YouTube"><img src="icon/youtube.png" alt="YouTube Abraj Iskan"></a>
        </div>
    </div>
</div>

<nav class="main-navbar">
    <div class="nav-container">
        <div class="logo-brand">
            <a href="index.php">
                <img src="img/logo.webp" alt="Abraj Iskan promotion immobiliere" />
            </a> 
        </div>
        
        <ul class="nav-menu">
            <li><a href="index.php">Accueil</a></li>
            <li><a href="index.php#projet">Nos projets</a></li>
            <li><a href="offres.php">Nos offres</a></li>
            <li><a href="about.php">À propos</a></li>
            
            <li class="dropdown-nav">
                <a href="service.php" class="dropdown-toggle">Services</a>
                <ul class="dropdown-menu-nav">
                    <li><a href="service.php">Tous les services</a></li>
                    <li><a href="vision.php">Notre Vision</a></li>
                </ul>
            </li>
            
            <li><a href="blog.php">Blog</a></li>
            <li><a href="payement.php">Paiement</a></li>
            <li><a href="materiel.php">Matériel</a></li>
        </ul>
        
        <a href="#contact" class="btn-contact-nav">Contactez-nous</a>
        
        <div class="hamburger">
            <span class="line"></span>
            <span class="line"></span>
            <span class="line"></span>
        </div>
    </div>
</nav>

<div class="menubar-mobile">
    <ul>
        <li><a href="index.php">Accueil</a></li>
        <li><a href="index.php#projet">Nos projets</a></li>
        <li><a href="offres.php">Nos offres</a></li>
        <li><a href="about.php">À propos</a></li>
        <li class="dropdown-nav">
            <a href="service.php" class="dropdown-toggle">Services</a>
            <ul class="dropdown-menu-nav">
                <li><a href="service.php">Tous les services</a></li>
                <li><a href="vision.php">Notre Vision</a></li>
            </ul>
        </li>
        <li><a href="blog.php">Blog</a></li>
        <li><a href="payement.php">Paiement</a></li>
        <li><a href="materiel.php">Capacité matériel</a></li>
        <li class="mobile-contact-item"><a href="#contact">Contactez-nous</a></li>
    </ul>
</div>