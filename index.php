<html>
	<?php
	include_once "header.php";
	include_once "bdd/connexion.php";
	include_once "bdd/MangaManager.php";
	?>
	<body>
		<section>
			<div class="transbox">
				</br>
				<div class="slideshow-container">
					<div class="mySlides fade">
					  <div class="numbertext">1 / 4</div>
					  <img src="image/spice and wolf.png" style="width:100%">
					</div>

					<div class="mySlides fade">
					  <div class="numbertext">2 / 4</div>
					  <img src="image/tales.png" style="width:100%">
					</div>

					<div class="mySlides fade">
					  <div class="numbertext">3 / 4</div>
					  <img src="image/high school dxd.jpg" style="width:100%">
					</div>

					<div class="mySlides fade">
					  <div class="numbertext">4 / 4</div>
					  <img src="image/revy.jpg" style="width:100%">
				</div>
			</div>
			<br>
			<div style="text-align:center">
			  <span class="dot"></span> 
			  <span class="dot"></span> 
			  <span class="dot"></span>
			  <span class="dot"></span>
			</div>
			
			<script>
				var slideIndex = 0;
				showSlides();

				function showSlides() {
					var i;
					var slides = document.getElementsByClassName("mySlides");
					var dots = document.getElementsByClassName("dot");
					for (i = 0; i < slides.length; i++) {
					   slides[i].style.display = "none";  
					}
					slideIndex++;
					if (slideIndex> slides.length) {slideIndex = 1}    
					for (i = 0; i < dots.length; i++) {
						dots[i].className = dots[i].className.replace(" active", "");
					}
					slides[slideIndex-1].style.display = "block";  
					dots[slideIndex-1].className += " active";
					setTimeout(showSlides, 3000); // Change image every 2 seconds
				}
			</script>

                        <div style="overflow-x:auto;">
                            <p><?php
                                    echo "</br>";
                                    $anime = new MangaManager($db);
                                    $anime->DernierLivreRentree($db);

                                if (isset($_GET['id1'])){
                                    $anime->DeleteAnime($db, $_GET['id1']);
                                    echo '<meta http-equiv="refresh" content="0;URL=index.php">';
                                }
                            ?>
                            </p>
                        </div>
			</div>		
		</section>		
	</body>
<?php
	include_once "footer.php";
?>
</html>
