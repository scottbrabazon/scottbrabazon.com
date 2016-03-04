<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php
/*
Template Name: Menu List
*/
?>
<?php get_header(); ?>

<!-- BEGIN #content -->
<section id="content" class="<?php echo $post->post_name; ?>">

<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

            	<header>
	            	<h1 class="entry-title"><?php the_title(); ?></h1>
	            </header>

                <div class="entry">
                	<?php the_content( __( 'Continue reading', 'nicethemes' ) . ' &raquo;' ); ?>
               	</div>

               	<div class="menu-card">
				<?php

				$currency = get_option('nice_currency_symbol');
				if ( empty ( $currency ) ) $currency = '$';

				$categories = get_categories( array( 'taxonomy'=>'menu-category', 'orderby' => 'id', 'hierarchical' => 0, 'parent' => 0, 'hide_empty' => 0 ) );

				if ( !empty ( $categories ) ) :

					$left_menu = '<ul>';

					foreach( $categories as $category ){

						$left_menu .= '<li class="category-item"><a href="#category-item-' . $category->term_id . '">' . $category->cat_name . '</a>';

						echo '<div class="menu-box">' . "\n";

						echo '<h2 class="menu-category"><a name="category-item-' . $category->term_id . '">' . $category->cat_name . '</a></h2>' . "\n";

						echo '<p>' . $category->description .'</p>' . "\n";


							$menus = get_posts(	array (	'post_type' => 'menu',
														'order' => 'ASC',
														'orderby' => 'menu_order',
														'posts_per_page' => -1,
														'numberposts' => -1,
														'tax_query' => array(
																	array(
																		'taxonomy' => 'menu-category',
																		'field' => 'slug',
																		'terms' =>  $category->category_nicename,
																		'include_children' => false
																	)
																)
														)

												);

							if ( !empty($menus) ) :

								echo '<ul>' . "\n";

							    foreach ( $menus as $post ) :

							        setup_postdata( $post );

							        echo '<li><div class="title clearfix"><span><a name="menu-item-' . $post->ID . '" href="' . get_permalink( $post->ID ) . '">' . get_the_title() . '</a></span>' . "\n";

							        if ( $price = get_post_meta( $post->ID, 'price', true ) )
							        	echo '<span class="price">' . $currency . $price . '</span>' . "\n";

							        echo '</div><div class="description clearfix">' . "\n";

							        if ( has_post_thumbnail() && nice_bool( get_post_meta( $post->ID, 'display_image_menu_list', true ) ) ) { ?>

						            	<figure class="featured-image fl">
						            		<a href="<?php the_permalink(); ?>" title="<?php printf( __( 'Permanent Link to %s', 'nicethemes' ), get_the_title() ); ?>">
												<?php nice_image( 'width=120&height=80&class=menu-image fl' ); ?>
						            		</a>
						                </figure>

									<?php }
									if ( get_the_excerpt() <> '' )
							        	echo '' . get_the_excerpt() . '' . "\n";

							        echo '</div></li>' . "\n";

							    endforeach; // END foreach ($menus as $post)

							    echo '</ul>' . "\n";

							 endif;

						$subcategories =  get_categories( array( 'taxonomy'=>'menu-category', 'child_of' => $category->term_id ) );

						if ( !empty( $subcategories ) ) :

							foreach  ( $subcategories as $subcategory ) :

							    echo '<h3 class="menu-subcategory"><a name="subcategory-item-' . $subcategory->term_id . '"">' . $subcategory->name.  '</a></h3>' . "\n";

							    if (  $subcategory->description <> '' )
							    	echo '<p>' . $subcategory->description .'</p>' . "\n";


							    $sub_menus = get_posts( array ('post_type' => 'menu', 'menu-category' => $subcategory->category_nicename, 'order' => 'ASC', 'orderby' => 'menu_order', 'posts_per_page' => -1, 'numberposts' => -1 ) );

							    if ( !empty( $sub_menus ) ) :

							    	echo '<ul>' . "\n";

								    foreach ( $sub_menus as $post) {

								        setup_postdata( $post );

								        echo '<li>' . "\n";

								        echo '<div class="title clearfix"><span><a name="menu-item-' . $post->ID . '" href="' . get_permalink( $post->ID ) . '">' . get_the_title() . '</a></span>' . "\n";
								        if ( $price = get_post_meta( $post->ID, 'price', true ) )
							        		echo '<span class="price">' . $currency . $price . '</span>' . "\n";

								        echo '</div><div class="description clearfix">' . "\n";

								        if ( has_post_thumbnail() && nice_bool( get_post_meta( $post->ID, 'display_image_menu_list', true ) ) ) { ?>

							            	<figure class="featured-image fl">
							            		<a href="<?php the_permalink(); ?>" title="<?php printf( __( 'Permanent Link to %s', 'nicethemes' ), get_the_title() ); ?>">
													<?php nice_image( 'width=120&height=80&class=menu-image fl' ); ?>
							            		</a>
							                </figure>

										<?php }
								         if ( get_the_excerpt() <> '' ) echo '' . get_the_excerpt() . '' . "\n";

								        echo '</div></li>' . "\n";
								    }

								    echo '</ul>' . "\n";


							    endif;

							endforeach;

						endif;

						echo '</div>' . "\n";

						wp_reset_query();

					}

				endif;
				?>
               	</div>



		<?php endwhile; ?>

<?php else : ?>

		<header>
			<h2><?php _e( 'Not Found', 'nicethemes' ); ?></h2>
		</header>
		<p><?php _e( 'Sorry, but you are looking for something that isn\'t here.', 'nicethemes' ); ?></p>

		<?php get_search_form(); ?>

<?php endif; ?>

<!-- END #content -->
</section>

<aside id="sidebar">
	<?php echo $left_menu; ?>
</aside>

<?php get_footer(); ?>