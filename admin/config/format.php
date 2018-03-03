<?php 
/**
* 
*/
class format
{
	// public function formatDate(){
	// 	date('F j,Y,g:i a',strtotime($date));
	// }
 public function formatDat($date){
 		return date('F j,Y',strtotime($date));
 }


  public function formatDat_in_text_file($date){
 		return date('Y-m-d',strtotime($date));
 }


 public function Readmore($text,$limit=90){
 	$text=$text."";
 	$text=substr($text,0,$limit);
 	$text=$text."....";
 	return $text;
 }


  public function title($text,$limit=50){
 	$text=$text."";
 	$text=substr($text,0,$limit);
 	$text=$text."....";
 	return $text;
 }

}

 ?>