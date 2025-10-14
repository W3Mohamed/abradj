<div class="boxes">
    <a href="projet.php">
        <div class="boxe">
            <img src="icon/projet.png" alt="">
            <div class="iteration">
                <h4>Projet</h4>
                <?php
                    $sqlPr = $pdo->prepare('SELECT COUNT(*) FROM projet');
                    $sqlPr->execute();
                    $nbPr = $sqlPr->fetchColumn();
                ?>
                <h4><?=$nbPr?></h4>
            </div>
        </div>
    </a>
    <a href="offre.php">
        <div class="boxe">
            <img src="icon/projet.png" alt="">
            <div class="iteration">
                <h4>Offres</h4>
                <?php
                    $sqlPr = $pdo->prepare('SELECT COUNT(*) FROM projet');
                    $sqlPr->execute();
                    $nbPr = $sqlPr->fetchColumn();
                ?>
                <h4><?=$nbPr?></h4>
            </div>
        </div>
    </a>
    <a href="blog.php">
        <div class="boxe">
            <img src="icon/blog.png" alt="">
            <div class="iteration">
                <h4>Blog</h4>
                <?php
                    $sqlBl = $pdo->prepare('SELECT COUNT(*) FROM blog');
                    $sqlBl->execute();
                    $nbBl = $sqlBl->fetchColumn();
                ?>
                <h4><?=$nbBl?></h4>
            </div>
        </div>
    </a>
    <a href="index.php">
        <div class="boxe">
            <img src="icon/res.png" alt="">
            <div class="iteration">
                <h4>Reservations</h4>
                <?php
                    $sqlRes = $pdo->prepare('SELECT COUNT(*) FROM visite');
                    $sqlRes->execute();
                    $nbRes = $sqlRes->fetchColumn();
                ?>
                <h4><?=$nbRes?></h4>
            </div>
        </div>
    </a>

</div>