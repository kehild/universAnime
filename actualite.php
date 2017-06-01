<?php
	include_once "header.php";
?>
<html>
	<head>
	<script>
	function showRSS(str) {
	  if (str.length==0) {
		document.getElementById("rssOutput").innerHTML="";
		return;
	  }
	  if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	  } else {  // code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
		  document.getElementById("rssOutput").innerHTML=xmlhttp.responseText;
		}
	  }
	  xmlhttp.open("GET","getrss.php?q="+str,true);
	  xmlhttp.send();
	}
	</script>
	</head>
	<body>
		<div class="transbox">
			<form>
				<select onchange="showRSS(this.value)">
					<option value="">Selectionnée le Flux RSS</option>
					<option value="MangaSanctuary">Manga Sanctuary</option>
					<option value="DojoManga">Dojo Manga</option>
				</select>
			</form>
			<br>
			<div id="rssOutput">RSS-feed will be listed here...</div>
		</div>
	</body>
</html>
