<?php
    $sqlInfo = $pdo->prepare('SELECT * FROM setting');
    $sqlInfo->execute();
    $info = $sqlInfo->fetch();
?>
<div class="bande">
  <div class="social">
    <a href="<?=$info['facebook']?>"><img src="icon/facebook.png" alt="facebook Abraj Iskan"></a>
    <a href="<?=$info['instagram']?>"><img src="icon/instagram.png" alt="facebook Abraj iskan"></a>
    <a href="<?=$info['tiktok']?>"><img src="icon/tiktok.png" alt="tiktok Abraj Iskan"></a>
    <a href="<?=$info['youtube']?>"><img src="icon/youtube.png" alt="youtube Abraj Iskan"></a>
  </div>
  <a href="visite.php">Visite virtuel</a>
</div>
<nav>
      <div class="logo">
        <a href="index.php">
            <img src="img/logo.webp" alt="Abraj Iskan promotion immobiliere" />
       </a> 
      </div>
      <ul>
        <li>
          <a href="index.php">Accueil</a>
        </li>
        <li>
          <a href="index.php#projet">Nos projets</a>
        </li>
        <li>
          <a href="offres.php">Nos offres</a>
        </li>
        <li>
          <a href="about.php">A propos</a>
        </li>
        <li class="dropdown">
          <a href="service.php">Services</a>
          <ul class="dropdown-menu">
            <li><a href="service.php">Services</a></li>
            <li><a href="vision.php">Vision</a></li>
          </ul>
        </li>
        <li>
          <a href="blog.php">Blog</a>
        </li>
        <li>
          <a href="payement.php">Paiement</a>
        </li>
        <li>
          <a href="materiel.php">Capacité matériel</a>
        </li>
        <li>
          <a href="#contact">Contactez nous</a>
        </li>
      </ul>
      <div class="hamburger">
        <span class="line"></span>
        <span class="line"></span>
        <span class="line"></span>
      </div>
</nav>
    <div class="menubar">
      <ul>
        <li>
          <a href="index.php">Accueil</a>
        </li>
        <li>
          <a href="index.php#projet">Nos projets</a>
        </li>
        <li>
          <a href="offres.php">Nos offres</a>
        </li>
        <li>
          <a href="about.php">A propos</a>
        </li>
        <li class="dropdown">
          <a href="service.php">Services</a>
          <ul class="dropdown-menu">
            <li><a href="service.php">Service</a></li>
            <li><a href="vision.php">Vision</a></li>
          </ul>
        </li>
        <li>
          <a href="blog.php">Blog</a>
        </li>
        <li>
          <a href="payement.php">Paiement</a>
        </li>
        <li>
          <a href="materiel.php">Capacité matériel</a>
        </li>
        <li>
          <a href="#contact">Contactez nous</a>
        </li>
      </ul>
    </div>