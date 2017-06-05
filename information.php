<?php
include_once "header.php";
include_once "bdd/connexion.php";
include_once "bdd/MangaManager.php";
include_once "texte.php";

	if (isset($_POST['export'])) {

		$anime = new MangaManager($db);
		$anime->dumpMySQL($db, 3);	
	}
?>
<section>
	<div class="transbox">
                <div class="container">
                        <p style="text-align:left"><?php echo $info; ?>
                        </p>
                        <form method="post" action="">
                            </br>
                            <input type="submit" name="export" value="Exporter la base de données">
                        </form>
                </div>
        </div>
</section>
