<?php
require_once '../../../../wp-load.php';
session_start();
$array1=array();

if(isset($_GET['delete_session'])&&$_GET['delete_session']!='') {
	$to_delete=$_GET['delete_session'];
}


if(isset($_POST['delete_session'])&&$_POST['delete_session']!='') {
	$to_delete=$_POST['delete_session'];
}

if(isset($to_delete)&&$to_delete!='') {
	//echo "DELETE: " . $to_delete  . "<br/>";
	//echo $_SESSION['sku'];
	foreach($_SESSION['sku'] as $key => $my_var) {
		//$vars = get_object_vars($my_var);
		if ($my_var->sku == $to_delete) {
			unset($_SESSION['sku'][$key]);
		}
	}
	
	echo json_encode(count($_SESSION['sku']));
	
	//$_SESSION['sku']=array_diff($_SESSION['sku'],array($to_delete));
	//$querr='';
	/*if($_SESSION['sku']){
		foreach($_SESSION['sku'] as $my_var)
		{	$title=get_the_title($my_var);
			$price_in_dollar=get_post_meta($my_var,'price_in_dollar',true);
			$querr.='<img src="'.wp_get_attachment_url( get_post_thumbnail_id($my_var) ).'" width="100px" height="100px"/>'.$title.'<br/>'.$price_in_dollar.'<input type="radio" name="mytype" value="image">Image<br/><input type="radio" name="mytype" value="sample">Sample<br/><a href="#"" onclick = "delete_this('.$my_var.')">Delete</a>';
		}
	}
	else{
	$querr='There is no item in your list';
	}
	$array1[0]=$querr;
	$array1[1]=count($_SESSION['sku']);
	echo json_encode($array1);*/
}
	?>
	

