<?php 
		include 'config.php';

		$query=mysqli_query($con,'SELECT * FROM tbl_post');
		if($query){
			while ($result=mysqli_fetch_array($query)) {
				echo $result['id']."<br>";
			}
		}
 ?>