<?php
/**
 * Template Name: Form handler
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

session_start();

//echo $_POST["firstname"];die;
global $wpdb;
if(isset($_POST["firstname"])&&$_POST["firstname"]!='') {
$my_query='INSERT INTO sc78_userinfo (first_name, last_name, publication_name, phone_number, email_id, issue_date, required_date, comment) VALUES ("'.$_POST["firstname"].'","'.$_POST["lastname"].'","'.$_POST["publication"].'","'.$_POST["phone"].'","'.$_POST["email"].'"," '.$_POST["issue_date"].'"," '.$_POST["required_date"].'","'.$_POST["my_comment"].'")';

			$results = $wpdb->query($my_query);
			$email=$_POST["email"];
			$personal_info='<strong>Personal Info</strong><table><tr>
			<td>Name</td>
			<td>'.$_POST["firstname"].'   '.$_POST["lastname"].'</td>
			</tr>
			<tr>
			<td>Publication</td>
			<td>'.$_POST["publication"].'</td>
			</tr>
			<tr>
			<td>Phone</td>
			<td>'.$_POST["phone"].'</td>
			</tr>
			<tr>
			<td>Email</td>
			<td>'.$_POST["email"].'</td>
			</tr>
			<tr>
			<td>Issue Date</td>
			<td>'.$_POST["issue_date"].'</td>
			</tr>
			<tr>
			<td>Required Date</td>
			<td>'.$_POST["required_date"].'</td>
			</tr>
			</table><br/><br/><strong>Product Detail</strong><br/><table border="1"><th>Product Name</th><th>Sample/Image</th><th>Sample Type</th>';
		$user_id=$wpdb->insert_id;

			foreach($_SESSION['views'] as $my_var)
			{
				$title=get_the_title($my_var);
				$image_type=$_POST["myimage_".$my_var];
				if($image_type=='sample')
				{
					$sample_type=$_POST["pair_".$my_var];
				}
				else{
					$sample_type="none";
				}
				 $personal_info.='<tr><td>'.$title.'</td><td>'.$image_type.'</td><td>'.$sample_type.'</td></tr>';


				$wpdb->query('INSERT INTO sc78_productdetail(user_id, product_number, image_sample,pair_single) VALUES("'.$user_id.'","'.$my_var.'","'.$_POST["myimage_".$my_var].'","'.$_POST["pair_".$my_var].'")');
			//$email_template.='<table><tr><td>'.$my_var.'</td></tr></table>';
			}
$personal_info.='</table>';
		 $headers = 'From: My Name <dark23shadow@gmail.com>' . "\r\n";
		 $headers .= "MIME-Version: 1.0\r\n";
		 $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

		//add_filter( 'wp_mail_content_type', 'set_html_content_type' );


		wp_mail('andy@bythescruff.com', 'This is from schuh',$personal_info,$headers);
		wp_mail($email, 'This is from schuh',$personal_info,$headers);
		//remove_filter( 'wp_mail_content_type', 'set_html_content_type' );

		//function set_html_content_type() {
		//	return 'text/html';
		//}

		session_destroy();
	}

	header('Location: ' . $_SERVER['HTTP_REFERER']);
?>