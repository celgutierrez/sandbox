<?php

/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'bio-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'bio';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and adding defaults.
$bio_content = get_field('bio_content') ?: 'Add content here...';
$bio_button = get_field('bio_button') ?: 'Browse Options';
$image = get_field('bio_image');

?> 
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
	<div class="bio-image">
    	<?php echo wp_get_attachment_image( $image['ID'], 'full' ); ?>
    </div>
    <div class="bio-content">
        <span class="bio-text"><?php echo $bio_content; ?></span>
        <?php if($bio_button): 
        	$button_link = $bio_button['url'];
        	$button_title = $bio_button['title'];
        	?>
        	<a class="bio-button" href="<?php echo esc_url( $button_link ); ?>"><?php echo esc_html( $button_title ); ?></a>
    	<?php endif;?>
    </div>
    <style type="text/css">
         .bio {
         	border: 1px solid black;
         	border-radius: 2px;
         	display: flex;
         	flex-direction: row;
         	padding: 1em;
         }

         .bio .bio-image img {
         	border-radius: 150px;
         }

         .bio-content {
         	width: 75%;
         	margin-left: 1.25em;
         }

         .bio-button {
         	background-color: darkcyan;
         	padding: .5em;
         	border-radius: 5px;
         }

         .bio-content a.bio-button {
         	text-decoration: none;
         	color: #FFF;
         }

    </style>
</div>
