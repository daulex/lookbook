<?php
require_once '../../../../wp-load.php';
session_start();
$my_var=$_POST['add_session'];
//echo $my_var;die;
$array1=array();
$querr='';
if(!$_SESSION['views'])
	{$_SESSION['views']=array();}

	if(!in_array($my_var,$_SESSION['views'])){

		if(count($_SESSION['views'])<=7)
		{
		$phone_number=ot_get_option('phone_number');
			$price_in_dollar=get_post_meta($my_var,'price_in_dollar',true);
			$price_in_pound=get_post_meta($my_var,'price_in_pound',true);
			array_push($_SESSION['views'],$my_var);	
			$title=get_the_title($my_var);
			$querr='<div class="list_'.$my_var.'"><div class="item_box"><div class="item_pic"><img src="'.get_template_directory_uri().'/timthumb.php?src='. wp_get_attachment_url( get_post_thumbnail_id($my_var) ).'&amp;w=200&h=200&amp;zc=1&a=tl"/></div><div class="item_content"><h2>'.$title.'</h2><h3>$ '.$price_in_dollar.' / £ '.$price_in_pound.'</h3><div class="radio_button border"><input type="hidden" name="the_id" value="'.$my_var.'"><label>Image</label><input type="radio" name="myimage_'.$my_var.'" value="image" class="images"><label>Sample</label><input type="radio" name="myimage_'.$my_var.'" value="sample" class="newsletter"></div><div class="radio_button"><fieldset id="newsletter_topics_'.$my_var.'"><label>Pair</label><input type="radio" class="topic_marketflash" value="pair" name="pair_'.$my_var.'"/><label>Single</label><input type="radio" class="topic_fuzz" value="fuzz" name="pair_'.$my_var.'"/>
				</fieldset></div><a href="#" onclick = "delete_this('.$my_var.')" class="click_link">X</a></div></div></div>';
			
			if(count($_SESSION['views'])==1)
				{
					$querr='<div class="callback_inner">'.$querr.'</div><div class="contact">
                        <div class="form_content">
                            <h1>Call-in form</h1>
                            <form action="">
                                <div class="contact_box_inner">
                                    <div class="contact_left">
                                        <input type="text" placeholder="First Name" name="firstname" onfocus="hidethis(this)">
                                        <input type="text" placeholder="Last Name" name="lastname" onfocus="hidethis(this)">
                                        <input type="text" placeholder="Publication Name" name="publication" onfocus="hidethis(this)">
                                        <input type="text" placeholder="Phone number" name="phone" onfocus="hidethis(this)">
                                        <input type="text" placeholder="Your mail" name="email" onfocus="hidethis(this)">
                                        
                                    </div>
                                    <div class="contact_right">
                                        <p><span>Issue date</span><input type="text" id="datepicker" name="issue_date" onfocus="hidethis(this)"></p>
                                        <p><span>When is the product required?</span><input type="text" id="datepicker1"  name="required_date" onfocus="hidethis(this)"></p>
                                        <textarea name="my_comment" id="" ></textarea>
                                        
                                    </div>
                                </div>
                               <div class="border"><span class="form_border "></span></div>
                                <div class="call_button">
                                    <input type="submit" class="request" name="submit" value="Request"/><br/>
                                    <a href="tel:'.$phone_number.'" class="call">Or Call the Press Office:'.$phone_number.'</a>
                                </div>
                            </form>
                        </div>
                    </div><a href="#" class="closebox"></a>';
				}
			$title=get_the_title($my_var);
			$price_in_dollar=get_post_meta($my_var,'price_in_dollar',true);
			$array1[0]=$querr;
			$array1[1]=count($_SESSION['views']);
			$array1[2]='ITEM ADDED TO CALL - IN FORM';;
			
			//echo count($_SESSION['views']);
		}
		else{
		
			$array1[0]=null;
			$array1[1]=count($_SESSION['views']);
			$array1[2]="CANNOT BE ADDED MORE THAN 8 ITEMS";
		}
	}
	
	else{
		$array1[0]=null;
		$array1[1]=count($_SESSION['views']);
		$array1[2]="THE ITEM ALREADY EXIST IN YOUR LIST";
	}
	echo json_encode($array1);
?>