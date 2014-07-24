<?php 
global $wpdb;

if(isset($_GET['deleteit']))
{
  if(!empty($_GET['members']))
  {
  foreach($_GET['members'] as $members_row)
  {
		$wpdb->query("DELETE FROM sc78_userinfo WHERE user_id = $members_row");
		$wpdb->query("DELETE FROM sc78_productdetail WHERE user_id =$members_row");

  }
   wp_redirect( get_option('siteurl') . '/wp-admin/admin.php?page=orders', 302 );
  }

 }
$members= $wpdb->get_results("SELECT * from sc78_userinfo ORDER BY user_id DESC");
?>
<div class="wrap">
<div id="icon-edit-pages" class="icon32 icon32-posts-page">
<br>
</div>
<h2>Orders</h2>

<form id="frmMembers" name="frmMembers" method="get" action="<?php echo get_option('siteurl') . '/wp-admin/admin.php?page=orders'; ?>">

<ul class="subsubsub">
    <li><input type="submit" value="<?php _e('Delete'); ?>" name="deleteit" class="button-secondary action"  onclick="return ValDel();"/>
   (Select data you want to delete and then click delete)</li>
</ul>


<input type="hidden" name="page" value="orders" />



<table class="widefat page fixed" cellspacing="0">
  <thead>
   <tr>
	<th class="manage-column column-cb check-column" scope="col"><input type="checkbox" /></th>
    <th>No.</th>
    <th>Name</th>     
	      <th>Phone</th>
    <th>Email</th>	
     <th>Issue Date</th>
      <th>Required Date</th>
	   <th>View detail</th>
   </tr>
  </thead>
  <tbody>
  <?php
  if($members)
  {
	  $k=0;
	  foreach($members as $members_row)
	  {
		  ++$k;
	  ?>
	   <tr>
		 <th class="check-column" scope="row">
		 <input  name="members[]" type="checkbox" id="members[]" value="<?php echo $members_row->user_id; ?>">
		 </th>
         <td><?php echo $k;?></td>
		 <td><?php echo $members_row->first_name.'  '.$members_row->last_name;?></td>
		 <td><?php echo $members_row->phone_number;?></td>
		 <td><?php echo $members_row->email_id;?></td>
		 <td><?php echo $members_row->issue_date;?></td>
		 <td><?php echo $members_row->required_date;?></td>
		 <td class="post-title page-title column-title"><strong><a class="row-title" href="<?php echo get_option('siteurl') . '/wp-admin/admin.php?page=orders&varinfo='.$members_row->user_id.''; ?>">View Detail</a></strong></td>
         
        
     
		 
	   </tr>
	   <?php
	   }
   }
   else
   {
   ?>
       <tr>
	     <th></th>
	     <td colspan="2">No results found </td>
	   </tr>
   <?php
   }
   ?>
  </tbody>
</table>
</form>
</div>
<script type="text/javascript" >
function ValDel(){
	if(confirm("Are you sure to delete the selected rows?")){
		return true;
	}else{
		return false;
	}
}
</script>