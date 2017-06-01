<?php
include_once "header.php";
include_once "bdd/connexion.php";
include_once "bdd/MangaManager.php";
?>
<section>
	<div class="transbox">
		<p><?php  
			$anime = new MangaManager($db);
			$anime->ListeAnimeOAV($db);
			
			if (isset($_GET['id1'])){
				$anime->DeleteAnime($db, $_GET['id1']);
				echo '<meta http-equiv="refresh" content="0;URL=oav.php">';
			}	
			
			?>
			<a id="le_bouton" href="#test"><img src="image/fleche.png"></a>
		</p>
	</div>
</section>

<?php
include_once "footer.php";
?>
