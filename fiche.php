<?php
include_once "header.php";
include_once "bdd/connexion.php";
include_once "bdd/MangaManager.php";

?>
<section>
	<div class="transbox">
		<p><?php	
			$manga = new MangaManager($db);
			$manga->Fiche($db);
			?>
			
		</p>
	</div>
</section>

<?php
if (isset($_GET['id1'])){
			$anime->DeleteAnime($db, $_GET['id1']);
			echo '<meta http-equiv="refresh" content="0;URL=fiche.php">';
		}
include_once "footer.php";
?>

