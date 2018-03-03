
<?php include 'lib/Database.php'; ?>
<?php include_once 'function/helper.php'; ?>

<?php include 'inc/header.php'; ?>

<?php include('inc/slider.php'); ?>
<?php 
	$db=new Database();
 ?>


<?php 
$error=[];
$fname="";
$lname= "";
$email ="";
$message= "";
if (isset($_POST['submit'])) {
	$fname=$_POST['firstname'];
	$lname=$_POST['lastname'];
	$email=$_POST['email'];
	$message=$_POST['message'];
	 if(empty($fname)){
	 	$error['firstname']='firstname is required';
	 }
	  if(empty($lname)){
	 	$error['lastname']='lastname is required';
	 }
	  if(empty($email)){
	 	$error['email']='Email is required';
	 }
	  if(empty($message)){
	 	$error['message']='message is required';
	 }

	if(count($error)==0){
		$query=("INSERT INTO `tbl_contance`(`firstname`, `lastname`, `email`, `message`) VALUES ('".$fname."','".$lname."','".$email."','".$message."') ");
		$insert=$db->insert($query);
		var_dump(header('location:contact.php'));

		

	}
}

?>
<div class="contentsection contemplete clear">
	<div class="maincontent clear">
		<div class="about">
			<h2>Send feedback </h2>
			<form action="" method="post">
				<table>
					<tr>
						<td>Your First Name:</td>

						<td>
							<input type="text" name="firstname" value="<?php echo($fname); ?>" placeholder="Enter first name" />
							<span class="error"><?= show_error($error,"firstname"); ?></span>
						</td>
					</tr>
					<tr>
						<td>Your Last Name:</td>
						
						<td>
							<input type="text" name="lastname" placeholder="Enter Last name" /><span class="error"><?= show_error($error,"lastname") ;?>
								</span>
							</td>
						</tr>

						<tr>
							<td>Your Email Address:</td>
							<td>
								<input type="email" name="email" placeholder="Enter Email Address" />
								<span class="error"><?=show_error($error,"email") ;?></span>
							</td>
						</tr>
						<tr>
							<td>Your feedback :</td>
							<td>
								<textarea name="message"></textarea>
								<span class="error"><?=show_error($error,"message") ;?></span>
							</td>
						</tr>
						<tr>
							<td></td>
							<td>
								<input type="submit" name="submit" value="Submit"/>
							</td>
						</tr>
					</table>
					<form>				
					</div>

				</div>
				<?php 

				include 'inc/sibar.php'; ?>
			</div>

			<?php include 'inc/footer.php'; ?>
