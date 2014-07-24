<?php 
global $wpdb;
$user_id=$_GET['varinfo'];
//echo $user_id;
$product_info= $wpdb->get_results("SELECT * from sc78_productdetail WHERE user_id=$user_id");
$user_info=$wpdb->get_row("SELECT * from sc78_userinfo WHERE user_id=$user_id");
?>
<div class="wrap">
<div id="icon-edit-pages" class="icon32 icon32-posts-page">
<br>
</div>

<br/><h1>Order Details</h1>
<table class="widefat page fixed" cellspacing="0">
<tr><td><strong>Firstname</strong></td><td><?php echo $user_info->first_name;?></td></tr>
<tr><td><strong>Lastname</strong></td><td><?php echo $user_info->last_name;?></td></tr>
<tr><td><strong>Publication name</strong></td><td><?php echo $user_info->publication_name;?></td></tr>
<tr><td><strong>Phone number</strong></td><td><?php echo $user_info->phone_number;?></td></tr>
<tr><td><strong>Email Id</strong></td><td><?php echo $user_info->email_id;?></td></tr>
<tr><td><strong>Issue Date</strong></td><td><?php echo $user_info->issue_date;?></td></tr>
<tr><td><strong>Required Date</strong></td><td><?php echo $user_info->required_date;?></td></tr>
<tr><td><strong>Comment</strong></td><td><?php echo $user_info->comment;?></td></tr>
</table>

<h3>Product Detail</h3>
<table class="widefat page fixed" cellspacing="0"><thead>
<tr><th>Image Id</th><th>Title</th><th>Image</th><th>Image/Sample</th><th>Single/Pair</th><th>Link</th><tr></thead>

<?php
foreach($product_info as $product_detail)
{ 
$title=get_the_title($product_detail->product_number);
$src_of_image=wp_get_attachment_url( get_post_thumbnail_id($product_detail->product_number) );
$image=$product_detail->image_sample;
$the_link=get_permalink($product_detail->product_number);
if($image=='sample'){
$pair=$product_detail->pair_single;
}else
{
$pair='-';
}
?><tbody>
<tr><td><?php echo $product_detail->product_number;?></td>
<td><?php echo $title;?></td>
<td><?php echo '<img src="'.$src_of_image.'" width="100px" height="100px"/><br/>';?></td>
<td><?php echo $image;?></td>
<td><?php echo $pair;?></td>
<td><?php echo $the_link;?></td>
</tr></tbody>
<?php
}?>
</table></div>
