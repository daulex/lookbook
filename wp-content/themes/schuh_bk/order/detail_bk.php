<?php 
global $wpdb;
$user_id=$_GET['varinfo'];
//echo $user_id;
$product_info= $wpdb->get_results("SELECT * from sc78_productdetail WHERE user_id=$user_id");
$user_info=$wpdb->get_row("SELECT * from sc78_userinfo WHERE user_id=$user_id");
?><br/><h1>Order Details</h1>
<table border="2">
<tr><td>Firstname</td><td><?php echo $user_info->first_name;?></td></tr>
<tr><td>Lastname</td><td><?php echo $user_info->last_name;?></td></tr>
<tr><td>Publication name</td><td><?php echo $user_info->publication_name;?></td></tr>
<tr><td>Phone number</td><td><?php echo $user_info->phone_number;?></td></tr>
<tr><td>Email Id</td><td><?php echo $user_info->email_id;?></td></tr>
<tr><td>Issue Date</td><td><?php echo $user_info->issue_date;?></td></tr>
<tr><td>Required Date</td><td><?php echo $user_info->required_date;?></td></tr>
<tr><td>Comment</td><td><?php echo $user_info->comment;?></td></tr>
</table>

<h3>Product Detail</h3>
<table border="2">
<tr><th>Image Id</th><th>Title</th><th>Image</th><th>Image/Sample</th><th>Single/Pair</th><tr>

<?php
foreach($product_info as $product_detail)
{ 
$title=get_the_title($product_detail->product_number);
$src_of_image=wp_get_attachment_url( get_post_thumbnail_id($product_detail->product_number) );
$image=$product_detail->image_sample;
if($image=='sample'){
$pair=$product_detail->pair_single;
}else
{
$pair='none';
}
?>
<tr><td><?php echo $product_detail->product_number;?></td>
<td><?php echo $title;?></td>
<td><?php echo '<img src="'.$src_of_image.'" width="100px" height="100px"/><br/>';?></td>
<td><?php echo $image;?></td>
<td><?php echo $pair;?></td>
</tr>
<?php
}?>
</table>
