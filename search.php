<?php
include_once "header.php";
include_once "bdd/connexion.php";
include_once "bdd/MangaManager.php";
?>
	<body>
		<section>
			<div class="transbox" style="color:black;">
			<?php
			$anime = new MangaManager($db);
			$anime->search($db);
		
                        if (isset($_GET['id1'])){
                                $anime->DeleteAnime($db, $_GET['id1']);
                                echo '<meta http-equiv="refresh" content="0;URL=search.php">';
                        }
			?>			
			</div>		
		</section>		
	</body>	
	
<?php
include_once "footer.php";	
?>