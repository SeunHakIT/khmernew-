
<?php ob_start(); ?>
<?php include 'header.php'; ?>
<?php include 'config/config.php';?>
<?php include 'config/format.php';?>
<?php include 'config/helper.php'; ?>
<?php $fm=new format(); ?>


<?php 
 #upadate
 $error="";
  if (isset($_POST['submit'])) {
     $id=$_POST['id'];
     $username=$_POST['username'];
     $password=$_POST['password'];
     if(empty($username)){
        $error['username']="*";

     }elseif (empty($password)) {
         $error['password']="*";
     }
     else{


         $update=mysqli_query($con,"UPDATE `tbl_user` SET username='".$username."',`password`='".$password."'  WHERE id ='".$id."' ");
     header('location:userlist.php');
     

      }  
    

  }

?>
<div class="container_12">
    <?php include 'user_profile.php'; ?>
    <?php include 'manu.php'; ?>
    <div class="grid_10">

        <div class="box round first grid">
            <h2>Update User</h2>
            <div class="block">               
             <form action="" method="POST" enctype="multipart/form-data">
                <table class="form">
                        <?php 
                          # get  data for update
                        if(isset($_GET['edit'])){
                           $get_id=$_GET['edit'];

                           $select =mysqli_query($con,"select * from tbl_user where id=$get_id ");
                           $row=mysqli_fetch_array($select);

                           ?>
                           <tr>
                            
                            <td>
                                <input type="hidden" name="id" value="<?php echo($row['id']); ?>" placeholder="Enter Post Title..." class="medium" name="id" ​/>
                            </td>
                        </tr>
                              <tr>
                            <td class="categery_name">
                                <label>User Update</label>
                            </td>
                            <td class=" input_categery">
                                <div class="with">
                                    <input type="text" value="<?php echo $row['username']; ?>" placeholder="Enter Post Categery Name..." class="medium" name="username" ​/>
                                     <span class="error"><?= show_error($error,"username"); ?></span>
                                </div>
                                
                            </td>
                        </tr>
                           <tr>
                            <td class="categery_name">
                                <label>User Password</label>
                            </td>
                            <td class=" input_categery">
                                <div class="with">
                                    <input type="password" value="<?php echo md5($row['password']); ?>" placeholder="Enter Post Categery Name..." class="medium" name="password" ​/>
                                     <span class="error"><?= show_error($error,"password"); ?></span>
                                </div>
                                
                            </td>
                        </tr>
              
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                        <?php  } ?>
                    </table>
                </form>
            </div>
        </div>
    </div>
    <?php include('footer.php'); ?>