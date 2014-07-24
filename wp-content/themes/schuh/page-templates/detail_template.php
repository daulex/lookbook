<?php
/**
 * Template Name: Contact Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
include_once("D:/wamp/www/schuh/wp-content/themes/schuh/page-templates/custom_function.php");
get_header(); ?>
<style>
form.cmxform .gray * { color: gray; }
</style>

<script type="text/javascript">
(function() {
    var sirv = document.createElement('script'); sirv.type = 'text/javascript';
sirv.async = true;
    sirv.src = document.location.protocol.replace('file:', 'http:') +
'//scripts.sirv.com/sirv.js';
    document.getElementsByTagName('script')[0].parentNode.appendChild(sirv);
})();
</script>

<script>
jQuery(document).ready(function() {
  jQuery("#no_id").validate({
    rules: {
      firstname: "required",
      lastname: "required",
      publication:"required",
      email: {
        required: true,
        email: true
      },
      phone:"required",
    },
    messages: {
      firstname: "Please enter your firstname",
      lastname: "Please enter your lastname",
      publication:"Please enter your publication",
      email: "Please enter a valid email address",
      phone:"Please enter a phone number",
    }
  });

//code to hide topic selection, disable for demo
  var newsletter = jQuery(".newsletter");
  var newone=newsletter.attr("name");
  alert(newone);
    var newsletter123 = jQuery("#images");
  // newsletter topics are optional, hide at first
  var inital = newsletter.is(":checked");
  var topics = jQuery("#newsletter_topics")[inital ? "removeClass" : "addClass"]("gray");
  var topicInputs = topics.find("input").attr("disabled", !inital);
  // show when newsletter is checked
  newsletter.click(function() {
    alert(this.name);
    topics[this.checked ? "removeClass" : "addClass"]("gray");
    topicInputs.attr("disabled", !this.checked);
  });

newsletter123.click(function() {
    topics[this.checked ? "addClass" : "removeClass"]("gray");
    topicInputs.attr("disabled", this.checked);
  });
});
</script>
<div class="Sirv" data-effect="spin"
data-src="http://schuh.sirv.com/lookbook/1125514150/1125514150.spin"></div>

<form action="" class="cmxform" method="POST" id="no_id">
<div class="fieldset1">
<?php 
$my_counter=1;
if($_SESSION['views']){
foreach($_SESSION['views'] as $my_var)
{?>
	
<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($my_var) )?>" width="100px" height="100px"/>
<?php echo get_the_title($my_var);

echo '$'.get_post_meta($my_var,'price_in_dollar',true).'/';
echo '£'.get_post_meta($my_var,'price_in_pound',true);
?>
<input type="radio" name="mytype_<?php echo $my_counter;?>" value="image" class="images">Image<br/>
<input type="radio" name="mytype_<?php echo $my_counter;?>" value="sample" class="newsletter">Sample
<a href='#' onclick = "delete_this(<?php echo $my_var;?>)">Delete</a>

<fieldset id="newsletter_topics">
        <input type="radio" id="topic_marketflash" value="marketflash" name="topic[]" />
        Pair
        <input type="radio" id="topic_fuzz" value="fuzz" name="topic[]" />
        Single
</fieldset>
<?php
} ?>
<input type="text" id="firstname" name="firstname" placeholder="First name"><br/>
<input type="text" name="lastname" placeholder="Last name" required><br/>
<input type="text" name="publication" placeholder="Publication name" required><br/>
<input type="text" name="phone" placeholder="Phone number" required><br/>
<input type="email" name="email" placeholder="Your email" required><br/>
<input type="text" name="issue_date" >
<input type="text" name="required_date" >
<input type="textarea" name="comment" >
<input type="submit" value="Submit">
<?php 
$my_counter++;
}
else {
  echo 'There are no items in your list';
}
?></div>
</form>
<?php
var_dump($_SESSION['views']);

get_footer(); ?>
<script>
function delete_this(image_id)
{ 
jQuery.ajax({
           type: "POST",
           url: "<?php echo get_template_directory_uri();?>/page-templates/load2.php",
           data: {'delete_session':image_id},
		   error: function(xhr, status, error) {
			},
           success: function(result){
            var obj = jQuery.parseJSON(result);
            console.log(obj[0]);
           	   jQuery(".fieldset1").fadeIn().html(obj[0]);
               jQuery(".no").html(obj[1]);
           },
      }); 
}
</script>
