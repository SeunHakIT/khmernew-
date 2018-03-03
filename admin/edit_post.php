
<?php ob_start(); ?>
<?php include 'header.php'; ?>
<?php include 'config/config.php';?>
<?php include 'config/format.php';?>
<?php $fm=new format(); ?>
<?php
#function for random name images;
function generateFileName()
{
    $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789_";
    $name = "";
    for($i=0; $i<12; $i++)
        $name.= $chars[rand(0,strlen($chars))];
    return $name;
}

?> 


<?php 
 #upadate
if(isset($_POST['submit'])) {
   $id=$_POST['id']; 
   $tile=$_POST['title'];
   $cat=$_POST['gategery'];
   $date=$_POST['date'];
   $contant=$_POST['contant'];
   $file=$_POST['file_old'];
   $files=new generateFileName();

   if (!empty($_FILES['picture']['name'])) {
       $file=$_FILES['picture']['name'];
       
       move_uploaded_file($_FILES['picture']['tmp_name'],"../images/".$file);
       
   }
   $upadate=mysqli_query($con,"UPDATE `tbl_post` SET `title`='".$tile."',`body`='".$contant."',`picture`='".$file."',`cat`='".$cat."',`auther`='".$_SESSION['login_user']."',`date`='".$fm->formatDat_in_text_file($date)."' WHERE id='".$id."' ");

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

                    <tr>
                        <td>
                            <label>Category</label>
                        </td>
                        <td>
                            <select id="select" name="gategery">
                                <?php 

                                $get_catetgery=mysqli_query($con,"SELECT * FROM `tbl_cat` ");
                                while ($row=mysqli_fetch_array($get_catetgery)) {


                                    ?>
                                    <option value="<?php echo $row['cat_id']; ?>"><?php echo $row['catname']; ?></option>

                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                        <?php 
                          # get  data for update
                        if(isset($_GET['edit'])){
                           $get_id=$_GET['edit'];

                           $select =mysqli_query($con,"select * from tbl_post where id=$get_id ");
                           $row=mysqli_fetch_array($select);

                           ?>
                           <tr>

                            <td>
                                <input type="hidden" value="<?php echo($row['id']); ?>" placeholder="Enter Post Title..." class="medium" name="id" ​/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" placeholder="Enter Post Title..." class="medium" name="title" value="<?php echo($row['title']); ?>" ​/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Date Picker</label>
                            </td>
                            <td>
                                <input type="text" id="date-picker" name="date" value="<?=$row['date'];?>" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <input type="file" name="picture" value="<?php echo $row['picture'] ;?>">
                                <input type="hidden" name="file_old" value="<?php echo($row['picture']); ?>"><label class="img"><img width="10%" src="../images/<?php echo $row['picture']; ?>"/></label>

                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="contant"><?php echo $row['body']; ?></textarea>
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