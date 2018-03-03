<?php 

if(  !class_exists('Database') ) {
	require('lib/Database.php');
}
?>
<?php $db=new Database(); ?>

<div class="headersection templete clear">
	<?php 
	$query="select * from tbl_logo";
	$logo=$db->select($query);
	if ($logo) {
		while ($result=$logo->fetch_assoc()) {
						# code...
			
			
			?>
			<a href="index.php">
				<div class="logo">
					<img src="images/<?php echo $result['picture']; ?>" alt="Logo"/>
					<h2><?php echo $result['sitetitle']; ?></h2>
					<p><?php echo $result['name']; ?></p>
				</div>
			</a>
			<?php } ?>
			<?php  }?>
			<div class="social clear">
				<div class="icon clear">
					<a href="https://www.facebook.com/welcome.to.chat.with.me" target="_blank"><i class="fa fa-facebook"></i></a>
					<a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
					<a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
					<a href="#" target="_blank"><i class="fa fa-google-plus"></i></a>
				</div>
				<div class="searchbtn clear">
					<form action="" method="post">
						<input type="text" name="keyword" placeholder="Search keyword..."/>
						<input type="submit" name="submit" value="Search"/>
					</form>
				</div>
			</div>
		</div>