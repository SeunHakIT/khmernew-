<?php include 'inc/header.php';?>
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
			$per_page=3;
			if (isset($_GET['id'])) {
				$page=$_GET['id'];

			}else{
				$page=1;
			}
			$start_page=($page-1)* $per_page;
 ?>
		<?php 

		$query="SELECT * from tbl_post ORDER BY id DESC LIMIT $start_page,$per_page ";
		$post=$db->select($query);

		if ($post) {
			while ($result=$post->fetch_assoc()) {



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
				<?php  }?>
				<?php 

				$query="select * from tbl_cat";
				$dh=$db->select($query);
				$total_row=mysqli_num_rows($dh);
				$total_page=ceil($total_row/$per_page);


				?>
				<?php echo "<div class='pagination'>
					<span><a href='index.php?page=1'>".'First page'."</a>";
				for ($i=1; $i <=$total_page ; $i++) { 
					echo "<a href='index.php?page=".$i."'>".$i."</a>";
				};
				
				 echo "<span><a href='index.php?page=$total_page'>".'Last page'."</a></span></div>"?>

				<?php }else{

					header('location:404.php');
				} ?>


			</div>

			<?php include 'inc/sibar.php'; ?>



		</div>