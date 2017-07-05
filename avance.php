<?php
include_once 'header.php';
include_once 'bdd/connexion.php';
include_once 'bdd/MangaManager.php';
?>

<body>
    <section>
	<div class="transbox" style="color:black;">
            <?php
		$anime = new MangaManager($db);
                $anime->SearchAvance($db);
            ?>
     	</div>		
    </section>		
</body>	

<?php
include_once 'footer.php';
?>