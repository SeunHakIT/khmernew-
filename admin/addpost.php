
<?php ob_start(); ?>
<?php include 'header.php'; ?>
<?php include 'config/config.php';?>
<?php include 'config/format.php';?>
<?php include 'config/helper.php';?>

<?php $fm=new format(); ?>
<?php
#function for random name images;
function generateFileName()
{
$chars = "12345";
$name = "";
for($i=0; $i<12; $i++)
$name.= $chars[rand(0,strlen($chars))];
return $name;
}
?>
<?php 
$cat="";
$title="";
$date="";
$file="";
$contant="";
$error=[];
$user_name="";


#insert Data

if(isset($_POST['submit'])){
    $cat=$_POST['gategery'];
    $title=$_POST['title'];
    $date=$_POST['date'];
    $file=$_FILES["file"];
    $user_name=$_SESSION['login_user'];
    $contant=$_POST['contant'];
    if(empty($cat)){
        $error["gategery"]='categery required';
    }elseif (empty($title)) {
      $error['title']='title required';

  }elseif (empty($date)) {
     $error['date']='date required';
 }
 elseif (empty($contant)) {
    $error['contant']='contant required';
}

if (count($error)==0) {
     $file=$_FILES['file']['name'];
     $file=generateFileName();
    move_uploaded_file($_FILES['file']['tmp_name'],"../images/".$file);

   $insert=mysqli_query($con,"INSERT INTO `tbl_post`(`title`, `body`, `picture`, `cat`,`auther`, `date`) VALUES ('".$title."','".$contant."','".$file."','".$cat."','".$_SESSION['login_user']."','".$fm->formatDat_in_text_file($date)."')");

   echo '<script language="javascript">';
   echo 'alert("Insert successfully ")';
   echo "<font color='green'>Data added successfully.";
   echo '</script>';

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

                    <tr>
                        <td>
                            <label>Category</label>

                        </td>
                        <td>
                            <select id="select" name="gategery">
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
                                <input type="hidden"  placeholder="Enter Post Title..." class="medium" name="id" value="<?php echo($title); ?>" ​/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text"  placeholder="Enter Post Title..." class="medium" name="title" value="<?php echo($title); ?>" ​/>
                                <span class="error"><?= show_error($error,"title"); ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Date Picker</label>
                            </td>
                            <td>
                                <input type="text" id="date-picker" name="date" value="<?php echo($date); ?>"  />
                                <span class="error"><?= show_error($error,"date"); ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <input type="file" name="file" value="<?php echo($file); ?>" />
                                <span class="error"><?= show_error($error,"file"); ?></span>

                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="contant" value="<?php echo($contant); ?>"></textarea>
                                <span class="error"><?= show_error($error,"contant"); ?></span>

                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>

                    </table>
                </form>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>