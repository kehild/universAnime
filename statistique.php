<?php
include_once "header.php";
include_once "bdd/connexion.php";
include_once "bdd/MangaManager.php";
?>
<section>
	<div class="transbox">
		<p style="text-align:left"><?php
			$anime = new MangaManager($db);			
			$anime->TotalAnime($db);
			echo "</br>";
			$anime->TotalEpisode($db);
			echo "</br>";
			$anime->TotalFormat($db);
			echo "</br>";
			$anime->TotalFilm($db);
			?>
		</p>
	</div>
</section>

<?php
include_once "footer.php";
?>
