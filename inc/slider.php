
<?php 

if(  !class_exists('Database') ) {
    require('lib/Database.php');
}
?>
<?php 
$dbs= new Database(); 
?>

<div class="slidersection templete clear">
    <div id="slider">
       <?php 



       $query="select * from tbl_slide";
       $slider=$dbs->select($query);
       if ($slider) {
         while ($result=$slider->fetch_assoc()) {

          ?>

          <a href="index.php"><img src="images/slideshow/<?php echo $result['picture']; ?>" alt="<?php echo $result['slide_name'] ;?>" title="<?php echo $result['alt']; ?> " /></a>
          <?php } ?>
          <?php }else{
           echo "slide Not found";
       } ?>
   </div>

</div>