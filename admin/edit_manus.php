
<?php ob_start(); ?>
<?php include 'header.php'; ?>
<?php include 'config/config.php';?>
<?php include 'config/format.php';?>
<?php $fm=new format(); ?>


<?php 
 #upadate
if (isset($_POST['submit'])) {
   $id=$_POST['id'];
   $name=$_POST['menu'];
   $$cat_id=$_POST['categery_name'];
   var_dump($_POST);
   $update=mysqli_query($con,"UPDATE btl_manu SET name='".$name."',cat_id='".$cat_id."' WHERE id='".$id."' ");
   header('location:catlist.php');

}

?>
<div class="container_12">
    <?php include 'user_profile.php'; ?>
    <?php include 'manu.php'; ?>
    <div class="grid_10">

        <div class="box round first grid">
            <h2>Add New Post</h2>
            <div class="block">               
               <form action="" method="POST" enctype="multipart/form-data">
                <table class="form">
                    <?php 
                          # get  data for update
                    if(isset($_GET['id'])){
                     $get_id=$_GET['id'];

                     $select =mysqli_query($con,"select * from btl_manu where id=$get_id ");
                     $row=mysqli_fetch_array($select);

                     ?>
                     <tr>

                        <td>
                            <input type="hidden" name="id" value="<?php echo($row['id']); ?>" placeholder="Enter Post Title..." class="medium" name="cat_id" ​/>
                        </td>
                    </tr>
                    <tr>
                        <td class="categery_name">
                            <label>Name</label>
                        </td>
                        <td class=" input_categery">
                            <div class="with">
                                <input type="text" value="<?php echo $row['name']; ?>" placeholder="Enter Post Categery Name..." class="medium" name="categery_name" ​/>
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