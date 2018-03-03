<?php ob_start(); ?>

<?php include 'header.php'; ?>
<?php include 'config/config.php'; ?>
<?php include('config/format.php'); ?>


<?php 
# using for delect data form databse;
if (isset($_GET['delect'])) {

    $id=$_GET['delect'];
    $delect=mysqli_query($con,"DELETE FROM `tbl_user` WHERE id=$id ");

}
?>


<?php 

#using update


if (isset($_GET['edit'])) {
    $edit=$_GET['edit'];
    echo "ID:".$edit;
    
}
?>

<div class="container_12">
    <?php include 'user_profile.php'; ?>
    <?php include 'manu.php';?>
    <div class="grid_10">
        <div class="box round first grid">
            <h2>Post List</h2>
            <div class="block">  
                <table class="data display datatable" id="example">
                    <thead>
                        <tr>
                            <th class="num">No</th>
                            <th class="action">Category Name</th>
                             <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                                $i=0;
                                $list_gategery=mysqli_query($con,"SELECT * from tbl_user Order by id DESC ");
                                while ($row=mysqli_fetch_array($list_gategery)) {
                                    $i++;
                              
                               
                         ?>
                        <tr class="even gradeC">
                             <td><?php echo $i; ?></td>
                            <td><?php echo $row['username']; ?></td>


                            <td>
                                <a onclick="return confirm('You want to Update: <?php echo $row['username']; ?>?')" href="edit_user.php?edit=<?php echo $row['id']; ?>" >Edit</a>||
                                <a onclick="return confirm('You want to delect: <?php echo $row['username']; ?>?')" href="userlist.php?delect=<?php echo $row['id']; ?>">Delect</a>

                            </td>

                        </tr>
                        <?php  } ?>



                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <div class="clear">
    </div>
</div>

