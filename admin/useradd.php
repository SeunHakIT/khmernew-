
<?php ob_start(); ?>
<?php include_once 'header.php'; ?>
<?php include 'config/config.php';?>
<?php include 'config/format.php';?>
<?php include 'config/helper.php'; ?>

<div class="container_12">
 <?php include 'user_profile.php'; ?>
 <?php include 'manu.php'; ?>


 <?php 

 $username="";
 $Password="";
 $con_password="";
 $error="";
# insert Categery
 if (isset($_POST['submit'])) {        
    $username=$_POST['username'];
    $Password=$_POST['pass'];
    $con_password=$_POST['con_firmpassword'];
    if(empty($username)){
       $error['username']="*";
    }if (empty($Password)) {
        $error['password']="*";
    }elseif ($Password!=$con_password) {
       $error['con_firmpassword']="incurrect password";
    }
    elseif (count($error==0)) {
        $adduser=mysqli_query($con,"INSERT INTO tbl_user (username,password)VALUES('$username','$Password')");
    }

   

    echo '<script language="javascript">';
    echo 'alert("Insert successfully ")';
    echo '</script>';
}
?>
<div class="grid_10">

    <div class="box round first grid">
        <h2>Add New User</h2>
        <div class="block copyblock"> 
           <form action="" method="POST">
            <table class="form">                    
                <tr>
                    <td>
                        <input type="text" name="username" placeholder="Enter username..." value="<?php echo $username ?>" class="medium" />
                         <span class="error"><?= show_error($error,"username"); ?></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="password" name="pass" placeholder="Enter password..." class="medium" />
                         <span class="error"><?= show_error($error,"password"); ?></span>
                    </td>
                </tr>
                  <tr>
                    <td>
                        <input type="password" name="con_firmpassword" placeholder="Enter confirm password..." class="medium" />
                         <span class="error"><?= show_error($error,"con_firmpassword"); ?></span>
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
<?php include_once 'footer.php'; ?>