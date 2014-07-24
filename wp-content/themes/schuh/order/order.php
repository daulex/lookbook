<?php
global $wpdb;
if(isset($_GET['varinfo']) && is_numeric($_GET['varinfo']))
{
include_once('detail.php');
}
else{
include_once('listing.php');
}
?>