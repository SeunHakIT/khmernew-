<?php 
		$con=mysqli_connect('localhost','root','','khmerelearn')or die("can not connect");
		function mres($con,$text)
		{
			$text= rtrim(ltrim($text));
			return mysqli_real_escape_string($con,$text);
		}

 ?>