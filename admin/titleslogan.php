
<?php ob_start(); ?>
<?php include_once 'header.php'; ?>
<?php include 'config/config.php';?>
<?php include 'config/format.php';?>
<?php include 'config/helper.php'; ?>

<div class="container_12">
 <?php include 'user_profile.php'; ?>
 <?php include 'manu.php'; ?>

<?php 
$manu="";
$cat_t="";
$error="";
        # insert manu
if (isset($_POST['submit'])) {        
    $manu=$_POST['manu'];
    $cat_t=$_POST['cat'];
    if(empty($manu)){
        $error['manu']='*';
    }
    
    if(empty($cat_t)){
        $error['cat']='*';
    }

    $in_cat=mysqli_query($con,"INSERT INTO `btl_manu`  VALUES ('',".$manu."','".$cat_t."')");

    echo '<script language="javascript">';
    echo 'alert("Insert successfully ")';
    echo '</script>';
}
?>
<div class="grid_10">

    <div class="box round first grid">
        <h2>Add New Manu</h2>
        <div class="block copyblock"> 
           <form action="" method="POST">
            <table class="form">    
               <tr>
                <td>
                    <label>Category</label>

                </td>
                <td>
                    <select id="select" name="cat">
                        <span class="error"><?= show_error($error,"gategery"); ?></span>

                        <?php 

                        $get_catetgery=mysqli_query($con,"SELECT * FROM `tbl_cat` ");
                        while ($row=mysqli_fetch_array($get_catetgery)) {


                            ?>
                            <option value="<?php echo $row['cat_id']; ?>"><?php echo $row['catname']; ?></option>

                            <?php } ?>
                        </select>
                    </td>
                </tr>           
                <tr>
                   <td>
                    <label>Name</label>

                </td>
                <td>
                    <input type="text" name="manu" placeholder="Enter Category Name..." class="medium" />
                    <span class="error"><?= show_error($error,"manu"); ?></span>
                </td>
            </tr>
            <tr> 
                <td>
                    <input type="submit" name="submit" Value="Save" />
                </td>
            </tr>
        </table>
    </form>
</div>
</div>
</div>
<div class="clear">
</div>
</div>
<div class="clear">
</div>
<div id="site_info">
 <p>
   &copy; Copyright <a href="http://trainingwithliveproject.com">Training with live project</a>. All Rights Reserved.
</p>
</div>
</body>
</html>
