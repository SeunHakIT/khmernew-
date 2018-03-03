<?php include 'inc/header.php'; ?>

<?php include('function/format.php'); ?>
<?php 

if(  !class_exists('Database') ) {
    require('lib/Database.php');
}
 ?>

	
	<?php include('inc/slider.php'); ?>


	<?php 
	$db=new Database();

	?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<?php 
			$query="select * from tbl_about ";
			$about=$db->select($query);
			if($about){
				while ($result=$about->fetch_assoc()) {
							

					

					?>
					<div class="about">

						<h2><?php echo $result['title']; ?></h2>

						<p><?php echo $result['body']; ?></p>

						
					</div>
					<?php } ?>

					<?php }else{
						header('location:404.php');
					} ?>

				</div>
				<?php include('inc/sibar.php'); ?>
			</div>

			<div class="footersection templete clear">
				<div class="footermenu clear">
					<ul>
						<li><a href="#">Home</a></li>
						<li><a href="#">About</a></li>
						<li><a href="#">Contact</a></li>
						<li><a href="#">Privacy</a></li>
					</ul>
				</div>
				<p>&copy; Copyright Training with live project.</p>
			</div>
			<div class="fixedicon clear">
				<a href="http://www.facebook.com"><img src="images/fb.png" alt="Facebook"/></a>
				<a href="http://www.twitter.com"><img src="images/tw.png" alt="Twitter"/></a>
				<a href="http://www.google.com"><img src="images/gl.png" alt="GooglePlus"/></a>
				<a href="http://www.linkedin.com"><img src="images/in.png" alt="LinkedIn"/></a>
			</div>
		</body>
		</html>