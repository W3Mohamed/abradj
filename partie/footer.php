<footer class="site-footer">
    <div class="footer-container">
        <!-- Colonne marque -->
        <div class="footer-brand">
           <div class="footer-logo">
                <div class="footer-logo-img">
                    <img src="img/logo.webp" alt="Abraj Iskan Promotion immobiliere">
                </div>
                <h3 class="footer-company-name">Abraj Iskan</h3>
            </div>
            <p class="footer-description">
                La mission principale de ABRAJ ISKAN promotion immobilier est de mettre sa performance, 
                sa compétence et son énergie pour satisfaire et fidéliser ses clients qui sont à la base sa priorité dans ses projets.
            </p>
        </div>

        <!-- Grid des liens -->
        <div class="footer-links-grid">
            <!-- Navigation -->
            <div class="footer-section">
                <h3>Navigation</h3>
                <ul class="footer-links">
                    <li><a href="about.php" class="footer-link">À propos</a></li>
                    <li><a href="vision.php" class="footer-link">Notre vision</a></li>
                    <li><a href="#contact" class="footer-link">Contactez-nous</a></li>
                    <li><a href="#contact" class="footer-link">FAQ</a></li>
                </ul>
            </div>

            <!-- Coordonnées -->
            <div class="footer-section">
                <h3>Coordonnées</h3>
                <ul class="contact-info">
                    <li>
                        <a href="tel:0<?=$info['tel1']?>" class="footer-link">
                            0<?=$info['tel1']?>
                        </a>
                    </li>
                    <li>
                        <a href="tel:0<?=$info['tel2']?>" class="footer-link">
                            0<?=$info['tel2']?>
                        </a>
                    </li>
                    <li>
                        <a href="mailto:<?=$info['email']?>" class="footer-link">
                            <?=$info['email']?>
                        </a>
                    </li>
                </ul>

                <!-- Réseaux sociaux -->
                <div class="social-section">
                    <h3>Suivez-nous</h3>
                    <div class="social-links">
                        <a href="<?=$info['instagram']?>" target="_blank" class="social-link">
                            <img src="icon/instagram.png" alt="Instagram">
                        </a>
                        <a href="<?=$info['facebook']?>" target="_blank" class="social-link">
                            <img src="icon/facebook.png" alt="Facebook">
                        </a>
                        <a href="<?=$info['tiktok']?>" target="_blank" class="social-link">
                            <img src="icon/tiktok.png" alt="TikTok">
                        </a>
                        <a href="<?=$info['youtube']?>" target="_blank" class="social-link">
                            <img src="icon/youtube.png" alt="YouTube">
                        </a>
                    </div>
                </div>
            </div>

            <!-- Services -->
            <div class="footer-section">
                <h3>Services</h3>
                <ul class="footer-links">
                    <li><a href="service.php" class="footer-link">Nos services</a></li>
                    <li><a href="offres.php" class="footer-link">Nos offres</a></li>
                    <li><a href="materiaux.php" class="footer-link">Matériaux</a></li>
                    <li><a href="blog.php" class="footer-link">Actualités</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Copyright -->
    <div class="footer-bottom">
        <p class="copyright">
            Copyright © 2024 - Tous les droits sont réservés || Créé par : 
            <a href="https://w3mohamed.infinityfreeapp.com/">W3Mohamed</a>
        </p>
    </div>
</footer>