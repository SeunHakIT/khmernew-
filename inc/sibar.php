
<?php 

if(  !class_exists('Database') ) {
	require('lib/Database.php');
}
?>
<?php include_once 'function/format.php'; ?>

<?php 

$db=new Database();
$fm=new format();

?>
<div class="sidebar clear">
<!-- Block facebook page-->
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.11';
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>

	<div class="fb-page" data-href="https://www.facebook.com/khmerElearn/" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="true"><blockquote cite="https://www.facebook.com/khmerElearn/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/khmerElearn/">Khmer E-learn</a></blockquote></div>

	<!-- end block facebook page-->
	<div class="samesidebar clear">
<!-- get category-->
		<h2>Categories</h2>
		<?php 
		$query="select * from tbl_cat";
		$cat=$db->select($query);
		if ($cat) {
			
			while ($result=$cat->fetch_assoc()) {

				?>
				<ul>
					<li><a href="category.php?id=<?php echo $result['cat_id']; ?>"><?php echo $result['catname']; ?></a></li>

				</ul>

				<?php } ?>
				<?php }else{
					header('location:404.php');
				} ?>
			</div>

			<div class="samesidebar clear">

				<h2>Latest articles</h2>



				<?php 

				$qsl="SELECT * from tbl_post ORDER BY id DESC LIMIT 3 ";
				$last=$db->select($qsl);

				if ($last) {
					while ($result=$last->fetch_assoc()) {
								

						
						?>
						
						<div class="popular clear">
							<h3><a href="post.php?id=<?php echo $result['id'];?>"><?php echo $result['title']; ?></a></h3>
							<a href="post.php?id=<?php echo $result['id'];?>"><img src="images/<?php echo $result['picture']; ?>" alt="post image"/></a>
							<?php echo $fm->sibar($result['body']); ?>	
						</div>
						<?php } ?>
						<?php } ?>




					</div>
