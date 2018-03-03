<?php
include 'inc/header.php';
?>
<?php
if(  !class_exists('Database') ) {
    require('lib/Database.php');
}
 ?>
<body>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<div class="notfound">
					<p><span>404</span> Not Found</p>
				</div>
			</div>
		</div>
		<?php include 'inc/sibar.php'; ?>
	</div>

	<?php include('inc/footer.php'); ?>
	<div class="fixedicon clear">
		<a href="http://www.facebook.com"><img src="images/fb.png" alt="Facebook"/></a>
		<a href="http://www.twitter.com"><img src="images/tw.png" alt="Twitter"/></a>
		<a href="http://www.google.com"><img src="images/gl.png" alt="GooglePlus"/></a>
		<a href="http://www.linkedin.com"><img src="images/in.png" alt="LinkedIn"/></a>
	</div>
</body>
</html>