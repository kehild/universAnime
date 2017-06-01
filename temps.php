<?php
include_once "header.php";
include_once "bdd/connexion.php";
include_once "bdd/MangaManager.php";
?>
<section>
	<div class="transbox">
		<p style="text-align:left"><?php
			
		echo "Total Temps Vu sans OAV ni film";
		echo "</br>";
		$anime = new MangaManager($db);
		$anime->TotalTemps($db);
		
		?>
		</p>
	</div>
</section>

<?php
include_once "footer.php";
?>
