<?php include 'inc/header.php'; ?>


<?php include('function/format.php'); ?>
<?php 

if(  !class_exists('Database') ) {
	require('lib/Database.php');
}
?>
<?php 


$db=new Database();
$fm=new format();


?>

<?php include 'inc/slider.php'; ?>


<div class="contentsection contemplete clear">
	<div class="maincontent clear">


		<?php 
		$get_id=$_GET['id'];
		$query="select * from tbl_cat where cat_id='$get_id'";
		$cats=$db->select($query);
		if($cats){ 
			$result=$cats->fetch_assoc();
		}
		?>		

		<?php 
		$get_id_cat=$_GET['id'];
		$query="select * from tbl_post where cat= $get_id_cat ";
		$post_cat=$db->select($query);
		if ($post_cat) {
			while ($result=$post_cat->fetch_assoc()) {



				?>

				<div class="samepost clear">
					<h2><a href="post.php?id=<?php echo $result['id']; ?>"><?php echo $result['title']; ?></a></h2>
					<h4><?php echo $fm->formatDat($result['date']); ?>, By <a href="#"><?php echo $result['auther']; ?></a></h4>
					<a href="post.php?id=<?php echo $result['id']; ?>"><img src="images/<?php echo $result['picture']; ?>" alt="post image"/></a>
					<?php echo $fm->Readmore($result['body']); ?>

					<div class="readmore clear">
						<a href="post.php?id=<?php echo $result['id']; ?>">Read More</a>
					</div>
				</div>



				<?php } ?>

				<?php } ?>


				
			</div>

			<?php include 'inc/sibar.php'; ?>

			
		</div>
				<?php include 'inc/footer.php';?>


