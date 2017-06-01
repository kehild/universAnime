<?php
include_once "header.php";
include_once "bdd/connexion.php";
include_once "bdd/MangaManager.php";
?>
<section>
	<div class="transbox">
		<p style="text-align:left">
		<?php
		$anime = new MangaManager($db);	
		$anime->TotalOAV($db);
		echo "</br>";
		$anime->TotalEpisodeOAV($db);
		echo "</br>";
		$anime->TotalFormatOAV($db);

		?>
		</p>
	</div>
</section>

<?php
include_once "footer.php";
?>
