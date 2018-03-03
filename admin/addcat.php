
     <?php ob_start(); ?>
   
     <?php include_once 'header.php'; ?>
     <?php include 'config/config.php';?>
     <?php include 'config/format.php';?>

     <div class="container_12">
         <?php include 'user_profile.php'; ?>
         <?php include 'manu.php'; ?>


         <?php 
        # insert Categery
         if (isset($_POST['submit'])) {        
            $cat_name=$_POST['cat_name'];
            $in_cat=mysqli_query($con,"INSERT INTO `tbl_cat`(`catname`) VALUES ('".$cat_name."')");

            echo '<script language="javascript">';
            echo 'alert("Insert successfully ")';
            echo '</script>';
        }
        ?>
        <div class="grid_10">

            <div class="box round first grid">
                <h2>Add New Category</h2>
                <div class="block copyblock"> 
                   <form action="" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="cat_name" placeholder="Enter Category Name..." class="medium" />
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
