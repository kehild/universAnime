<?php
include_once "header.php";
include_once "bdd/MangaManager.php";
include_once "bdd/connexion.php";
?>	
	<p><?php  

			$manga = new MangaManager($db);
			$manga->modification($db);			

			//modification();
			if (isset($_POST['Annuler'])) {
				echo '<meta http-equiv="refresh" content="0;URL=index.php">';	
			}
			if (isset($_POST['Modifier'])) {
			$manga->UpdateAnime($db);
			}
		?>
	</p>
<?php
include_once "footer.php";
	

?>
