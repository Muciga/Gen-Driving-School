<?php
include "header.php";
?>
	<div class="section">
		<div class="sidenav">
			<?php
            include "dashboard.php";
			?>
			<a href="about.php">About</a>
			<a href="contact.php">Contact</a>
			  
		</div>

		<div class="main">
			<h1></h1>
			<p></p>
			<p></p>
		</div>
	</div>
	<?php
    include "footer.php";
	?>
	<script>
		var dropdown = document.getElementsByClassName("dropdown-btn");
		var i;
		for(i=0; i<dropdown.length; i++){
			dropdown[i].addEventListener("click", function(){this.classList.toggle("active");
				var dropdownContent = this.nextElementSibling;
				if(dropdownContent.style.display === "block"){
					dropdownContent.style.display = "none";
				}else{
					dropdownContent.style.display = "block";
				}
			});
		}
	</script>
</body>
</html>