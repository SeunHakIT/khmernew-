<?php include 'inc/header.php'; ?>

<?php 

if(  !class_exists('Database') ) {
    require('lib/Database.php');
}
 ?>
<?php $db=new Database(); ?>
<?php include 'inc/slider.php'; ?>
<div class="contentsection contemplete clear">
	<div class="maincontent clear">

		<?php 
		$post_id=$_GET['id'];
		$query="select * from tbl_post where id= '$post_id'";
		$deteal=$db->select($query);
		if($deteal){
			while ($result=$deteal->fetch_assoc()) {



				?>
				<div class="about">
					<h2><?php echo $result['title']; ?></h2>
					<h4>April 10, 2016, 12:30 PM, By Delowar</h4>
					<img src="images/<?php echo $result['picture']; ?>" alt="MyImage"/>
					<?php echo $result['body']; ?>


					<?php 	}
					?>
					<?php }else{
						header('location:404.php');
					} ?>

					<div class="relatedpost clear">
						<h2>Related articles</h2>
						<a href="#"><img src="images/post1.jpg" alt="post image"/></a>
						<a href="#"><img src="images/post1.jpg" alt="post image"/></a>
						<a href="#"><img src="images/post1.jpg" alt="post image"/></a>
						<a href="#"><img src="images/post1.jpg" alt="post image"/></a>
						<a href="#"><img src="images/post1.jpg" alt="post image"/></a>
						<a href="#"><img src="images/post1.jpg" alt="post image"/></a>
					</div>
				</div>

			</div>
			<?php include 'inc/sibar.php'; ?>
		</div>
		<?php include 'inc/footer.php';?>
