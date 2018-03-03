<?php 
include_once 'config.php';


?>
<?php 
function log($user,$pass){
	$login=mysqli_query("select * from tbl_user where username='".$user."' AND password='".$pass."' ");
	$row=mysqli_fetch_array($login);
	
}

?>