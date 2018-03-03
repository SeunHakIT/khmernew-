
<?php ob_start(); ?>
<?php include 'header.php'; ?>
<?php include 'config/config.php'; ?>
<?php include('config/format.php'); ?>


<?php 
############ using for delect data form databse;
if (isset($_GET['delect'])) {

	$id=$_GET['delect'];

	$delect=mysqli_query($con,"DELETE FROM `tbl_post` WHERE id=$id ");

}
?>


<?php 

#using update


if (isset($_GET['edit'])) {
	$edit=$_GET['edit'];
	echo "ID:".$edit;
	
}
?>

<div class="container_12">
	<?php include 'user_profile.php'; ?>
	<?php include 'manu.php';?>
	<div class="grid_10">
		<div class="box round first grid">
			<h2>Post List</h2>
			<div class="block">  
				<table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>No</th>
							<th>Post Title</th>
							<th>Picture</th>
							<th>Category</th>
							<th>Auther</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$i=0;
						$fm=new format();
						$connn=new format();
						$select=mysqli_query($con,'SELECT * FROM tbl_post RIGHT JOIN tbl_cat ON(tbl_post.cat=tbl_cat.cat_id) ORDER BY id DESC  ');
						while ($row=mysqli_fetch_array($select)) {

							$i++;
							?>

							<tr class="even gradeC">
								<td><?php echo $i; ?></td>
								<td><?php echo $fm->title($row['title']); ?></td>
								
								<td class="img-show"><img src="../images/<?php echo $row['picture']; ?>" alt="post image"/></td>
								<td><?php echo $row['catname']; ?></td>
								<td><?php echo $row['auther']; ?></td>
								<td><?php echo $fm->formatDat($row['date']); ?></td>
								<td>
									<a  href="edit_post.php?edit=<?php  echo $row['id'];?>" >Edit</a>||
									<a onclick="return confirm('You want to delect: <?php echo $row['title']; ?>?')" href="postlist.php?delect=<?php  echo $row['id'];?>">Delect</a>

								</td>

							</tr>

							<?php } ?>

						</tbody>
					</table>

				</div>
			</div>
		</div>
		<div class="clear">
		</div>
	</div>
	
	<?php include 'footer.php'; ?>

