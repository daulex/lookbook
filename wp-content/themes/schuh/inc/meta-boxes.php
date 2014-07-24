<?php
/**
 * Initialize the custom Meta Boxes. 
 */
 
 
 
  // check for a template type
  
 
add_action( 'admin_init', 'custom_meta_boxes' );

/**
 * Meta Boxes demo code.
 *
 * You can find all the available option types in demo-theme-options.php.
 *
 * @return    void
 * @since     2.0
 */
function custom_meta_boxes() {
  
  /**
   * Create a custom meta boxes array that we pass to 
   * the OptionTree Meta Box API Class.
   */
  $my_meta_box = array(
    'id'          => 'testimonilas',
    'title'       => __( 'For images', 'twentfourteen' ),
    'desc'        => '',
    'pages'       => array( 'heels','sports','flats','boots' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
      
						  array(
							
							'id'          => 'logo_list',
							'label'       => 'Slider Content',
							'type'        => 'list-item',
							'std'         => '',
							'settings'=>array(
												array(
												'label'=>'SKU',
												'id'=>'sku',
												'type'=>'text',
												'std'=>''
												),
												array(
												'label'=>'Slider Image',
												'id'=>'logos_items',
												'type'=>'upload',
												'std'=>''
												),
												array(
												'label'=>'choose header background',
												'id'=>'header_backend',
												'type'=>'select',
												'choices'     => array( 
												  array(
													'value'       => 'dark',
													'label'       => __( 'Dark', 'theme-text-domain' ),
													'src'         => ''
												  ),
												  array(
													'value'       => 'light',
													'label'       => __( 'Light', 'theme-text-domain' ),
													'src'         => ''
												  )
												)
												),
												array(
												'label'=>'choose background type',
												'id'=>'background_type',
												'type'=>'radio',
												'choices'     => array( 
												  array(
													'value'       => 'image',
													'label'       => __( 'Image', 'theme-text-domain' ),
													'src'         => ''
												  ),
												  array(
													'value'       => 'color',
													'label'       => __( 'Color', 'theme-text-domain' ),
													'src'         => ''
												  )
												)
												),
												array(
												'label'=>'Background Image',
												'id'=>'background',
												'type'=>'upload',
												'std'=>''
												),
												array(
												'label'=>'Color Picker',
												'id'=>'color_picker',
												'type'=>'colorpicker',
												'std'=>''
												),
										)
						  ),
						  
						  
     
      
      
					)
  );
  
  
  
  /**
   * Register our meta boxes using the 
   * ot_register_meta_box() function.
   */
  if ( function_exists( 'ot_register_meta_box' ) )
    ot_register_meta_box( $my_meta_box );

}

