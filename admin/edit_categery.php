
<?php ob_start(); ?>
<?php include 'header.php'; ?>
<?php include 'config/config.php';?>
<?php include 'config/format.php';?>
<?php include_once 'config/helper.php'; ?>
<?php $fm=new format(); ?>


<?php 
 #upadate
$error="";
if (isset($_POST['submit'])) {
   $id=$_POST['cat_id'];
   $cat_name=$_POST['categery'];
   if(empty($cat_name)){
    $error['categery']="*";

}elseif (count($error==0)) {
   $update=mysqli_query($con,"UPDATE tbl_cat SET catname='".$cat_name."' WHERE cat_id='".$id."' ");
header('location:catlist.php');
 # code...
}

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

                    if(isset($_GET['edit'])){
                     $get_id=$_GET['edit'];

                     $select =mysqli_query($con,"select * from tbl_cat where cat_id=$get_id ");
                     $row=mysqli_fetch_array($select);

                     ?>
                     <tr>

                        <td>
                            <input type="hidden" name="cat_id" value="<?php echo($row['cat_id']); ?>" placeholder="Enter Post Title..." class="medium" name="id" ​/>
                        </td>
                    </tr>
                    <tr>
                        <td class="categery_name">
                            <label>Categery Name</label>
                        </td>
                        <td class=" input_categery">
                            <div class="with">
                                <input type="text" value="<?php echo $row['catname']; ?>" placeholder="Enter Post Categery Name..." class="medium" name="categery" ​/>

                                <span class="error"><?= show_error($error,"categery");?></span>

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