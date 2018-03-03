
<?php ob_start(); ?>
<?php include 'header.php'; ?>
<?php include 'config/config.php';?>
<?php include 'config/format.php';?>
<?php $fm=new format(); ?>
<?php 
 #upadate
if (isset($_POST['submit'])) {
 $id=$_POST['id'];

 $password=$_POST['oldpassword'];
 var_dump($_POST);
 $update=mysqli_query($con,"UPDATE `tbl_user` SET password='".$password."' WHERE id ='".$id."' ");
 header('location:userlist.php');

}

?>
<div class="container_12">
  <?php include 'user_profile.php'; ?>
  <?php include 'manu.php'; ?>
  <div class="grid_10">
    
    <div class="box round first grid">
      <h2>Change Password</h2>
      <div class="block">               
       <form>
        <table class="form">                    
          <tr>
            <td>
              <label>Old Password</label>
            </td>
            <td>
              <input type="password" placeholder="Enter Old Password..."  name="title" class="medium" />
            </td>
          </tr>
          <tr>
            <td>
              <label>New Password</label>
            </td>
            <td>
              <input type="password" placeholder="Enter New Password..." name="slogan" class="medium" />
            </td>
          </tr>
          
          
          <tr>
            <td>
            </td>
            <td>
              <input type="submit" name="submit" Value="Update" />
            </td>
          </tr>
        </table>
      </form>
    </div>
  </div>
</div>
</div>
<?php include('footer.php'); ?>