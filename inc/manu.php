<?php 

if(  !class_exists('Database') ) {
	require('lib/Database.php');
}
?>

<?php $db=new Database(); ?>
<div class="navsection templete">
	<ul>
		<li><a href="index.php">Home</a></li>	
		
		<?php 
		$query="select * from btl_manu";
		$nav=$db->select($query);
		if ($nav) {
			while ($result=$nav->fetch_assoc()) {
				
			
		
				?>
				<li><a href="category.php?id=<?php echo $result['id']; ?>"><?php echo($result['name']); ?></a></li>	
				<?php } ?>
				<?php } ?>	
				<li><a href="about.php">about us</a></li>
				<li><a href="contact.php">conact</a></li>
				
			</ul>
		</div>
