<?php include_once 'header.php'; ?>
<?php include_once 'config/config.php'; ?>

<div class="grid_12 header-repeat">
		<div id="branding">
			<?php 
						##get logo
			$logo=mysqli_query($con,"SELECT *FROM tbl_logo");
			while ($result=mysqli_fetch_array($logo)) {
				
				
				?>
				<div class="floatleft logo">
					<img src="../images/<?php echo($result['picture']); ?>" alt="Logo" />
				</div>
				
				<div class="floatleft middle">
					<h1><?php echo $result['sitetitle']; ?></h1>
					<p><?=$result['name'];?></p>
				</div>
				<?php } ?>
				<div class="floatright">
					
					<div class="floatleft">
						<img src="img/img-profile.jpg" alt="Profile Pic" />
					</div>
					
					<div class="floatleft marginleft10">
						<ul class="inline-ul floatleft">
							<li><?php echo $_SESSION['login_user']; ?></li>
							<li><a href="login.php">Logout</a></li>
						</ul>
					</div>
				</div>
				<div class="clear">
				</div>
			</div>
		</div>
		<div class="clear">
		</div>